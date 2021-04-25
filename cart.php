<?php
ob_start();
//cookie
if (isset($_COOKIE['Auth'])):
  require_once("header.php");
  if (isset($_COOKIE['Auth'])) {
  $Auth =  $_COOKIE['Auth'];
  $curCookie = $Login->checkCookie($Auth);
  $currentId= array_map(function($user){return $user['user_id'];}, $curCookie);
  }else{ $currentId=null; }// end cookie

  if ($_SERVER['REQUEST_METHOD']=='POST') {
    //Delete product in cart
  if (isset($_POST['delete_submit'])) {
  $Cart->deleteCartItem($_POST['user_id'], $_POST['item_id']);
  }
    //Add product in wishlist or Save as later
  if (isset($_POST['save_later_submit'])) {
    $cartArray = array('user_id' => $_POST['user_id'], 'item_id' =>$_POST['item_id'] );
    $delItem = $_POST['delCart'];
  $Cart->insertIntoCart($cartArray, $delItem, "wishlist");
  }
  }//end delete cart item

  $cartPros = $Cart->GetCartData($currentId[0]);
  // print_r($cartPros);exit();
  $item_id = array_map(function($item){return $item['item_id']; }, $cartPros);
  // print_r($item_id);
  ?>
  <!-- Shopping cart section  -->
  
  <section id="cart" class="py-3">
    <div class="container-fluid w-75">
      <h5 class="font-baloo font-size-20">Shopping Cart</h5>
      <!--  shopping cart items   -->
      <div class="row">
        <div class="col-sm-9">
          <p class="text-center <?php echo isset($_SESSION["msg"])? "alert ":"";  echo isset($_SESSION["msg"])? "alert":"";
   ?>-primary"><?php echo isset($_SESSION["msg"])? $_SESSION["msg"]:"";unset($_SESSION["msg"]);
   ?></p>
          <!-- cart item -->
          <?php

          foreach ($cartPros as $item):
          $cart = $Product->GetProduct($item['item_id']);
          $subTotal[] = array_map(function($item) use($currentId){?>
          <div class="row border-top py-3 mt-3">
            <div class="col-sm-2">
              <img src="<?php echo $item['item_image']??"./assets/products/1.png"; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
            </div>
            <div class="col-sm-8">
              <h5 class="font-baloo font-size-20"><?php echo $item['item_name']??"Unknown"; ?></h5>
              <small>by <?php echo $item['item_brand']??"Brand"; ?></small>
              <!-- product rating -->
              <div class="d-flex">
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
              </div>
              <!--  !product rating-->
              product qty
              <div class="qty d-flex pt-2">
                <div class="d-flex font-rale w-25">
                  <button class="qty-up border bg-light" data-id="<?php echo $item['item_id']??0;?>"><i class="fas fa-angle-up"></i></button>

                  <input type="text" data-id="<?php echo $item['item_id']??0;?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">

                  <button data-id="<?php echo $item['item_id']??0;?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                </div>
                <form method="POST">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $currentId[0]??0; ?>">
                  <button onclick="return confirm('Are You Sure?')" type="submit" name="delete_submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                </form>
                <form method="POST">
                  <input type="hidden" name="delCart" value="delCart">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $currentId[0]??0; ?>">
                  <button type="submit" name="save_later_submit" class="btn font-baloo text-danger">Save for Later</button>
                </form>
                
                
              </div>
              <!-- !product qty -->
            </div>
            <div class="col-sm-2 text-right">
              <div class="font-size-20 text-danger font-baloo">
                $<span class="product_price" data-id="<?php echo $item['item_id']??0;?>" ><?php echo $item['item_price']??0;?></span>
              </div>
            </div>
          </div>
          <?php
          return $item['item_price'];
          }, $cart);
          // print_r($subTotal);
          endforeach;
          ?>
        </div>
          <!-- subtotal section-->
          <div class="col-sm-3">
            <div class="sub-total border text-center mt-2">
              <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
               <div class="border-top py-4">
                <h5 class="font-baloo font-size-20">Subtotal (<?php echo isset($subTotal) ? count($subTotal):0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal)?$Cart->getSum($subTotal):0; ?></span> </span> </h5>
                <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
              </div>
            </div>
          </div>
          <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
      </div>
    </section>
    
    <!-- !Shopping cart section  -->

    <!-- Wishlist cart section  -->

  <section id="cart" class="py-3" >
    <div class="container py-3" style="background:#009dea20;">
      <h5 class="font-baloo font-size-20">Wish List</h5>
      <!--  Wishlist cart items   -->
      <div class="row">
        <div class="col-sm-12">
          <!-- cart item -->
          <?php
          //add to cart
            if ($_SERVER['REQUEST_METHOD']=="POST") {
            if (isset($_POST['add_to_cart_from_wishlist'])) {
            $cartArray = array(
            'user_id' => $_POST['user_id'],
            'item_id' => $_POST['item_id'],
            );
            $delItem = $_POST['delWishlist'];

            $Cart->insertIntoCart($cartArray, $delItem);
            }}//add to cart end

          //delete from Wishlist
            if ($_SERVER['REQUEST_METHOD']=="POST") {
            if (isset($_POST['delete_wishlist_submit'])) {
            $Cart->deleteCartItem($_POST['user_id'], $_POST['item_id'], "wishlist");
            }}//delete from Wishlist end

          $wishlistProducts = $Cart->GetCartData($currentId[0],"wishlist");
          foreach ($wishlistProducts as $item):
          $cart = $Product->GetProduct($item['item_id']);
          $subTotal[] = array_map(function($item) use($currentId){?>
          <div class="row border-top py-3 mt-3">
            <div class="col-sm-2">
              <img src="<?php echo $item['item_image']??"./assets/products/1.png"; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
            </div>
            <div class="col-sm-8">
              <h5 class="font-baloo font-size-20"><?php echo $item['item_name']??"Unknown"; ?></h5>
              <small>by <?php echo $item['item_brand']??"Brand"; ?></small>
              <!-- product rating -->
              <div class="d-flex">
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
              </div>
              <!--  !product rating-->
              <div class="qty d-flex pt-2">
                <form method="POST">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $currentId[0]??0; ?>">
                  <button onclick="return confirm('Are You Sure?')" type="submit" name="delete_wishlist_submit" class="btn font-baloo text-danger px-3 border-right">Delete form Wishlist</button>
                </form>
                <form method="POST">
                  <input type="hidden" name="delWishlist" value="delWishlist">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $currentId[0]??0; ?>">
                  <button type="submit" name="add_to_cart_from_wishlist" class="btn font-baloo text-danger">Add to Cart</button>
                </form>
                
                
              </div>
              <!-- !product qty -->
            </div>
            <div class="col-sm-2 text-right">
              <div class="font-size-20 text-danger font-baloo">
                $<span class="product_price" data-id="<?php echo $item['item_id']??0;?>" ><?php echo $item['item_price']??0;?></span>
              </div>
            </div>
          </div>
          <?php
          return $item['item_price'];
          }, $cart);
          // print_r($subTotal);
          endforeach;
          ?>
        </div>
        </div>
        <!--  !Wishlist cart items   -->
      </div>
    </section>

    <!-- !Wishlist cart section  -->
    <!-- New Phones -->
    <?php include_once "Template/_new_phone.php"; ?>
    <!-- !New Phones -->
    <?php require_once("footer.php");
    else: header("Location:login.php");
  unset($_SESSION["msg"]);
  endif;

  ?>