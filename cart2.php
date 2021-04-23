<div class="col-sm-9">
  <!-- cart item -->
  <?php
  foreach ($cartPros as $item):
  $cart = $Product->GetProduct($item['item_id']);
  $subTotal[] = array_map(function($item){?>
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
          <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
          <input type="text" data-id="pro1" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
          <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
        </div>
        <form method="POST">
          <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
          <input type="hidden" name="user_id" value="<?php echo 1; ?>">
          <button type="submit" name="delete_submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
        </form>
        <button type="submit" name="save_later_submit" class="btn font-baloo text-danger">Save for Later</button>
        
      </div>
      <!-- !product qty -->
    </div>
    <div class="col-sm-2 text-right">
      <div class="font-size-20 text-danger font-baloo">
        $<span class="product_price"><?php echo $item['item_price']??0;?></span>
      </div>
    </div>
  </div>
  <?php
  return $item['item_price'];
  }, $cart);
  // print_r($subTotal);
  endforeach;
  ?>



  <div class="col-sm-9">
        <!-- cart item -->

        <?php 

       $total[] = array_map(function($itemid) use($Product){
          // print_r($itemid); exit();
        $cart = $Product->GetProduct($itemid['item_id']);
        // foreach ( as $item):
          // $cart = $Product->GetProduct($item['item_id']);
          $subTotal[] = array_map(function($item){?>
          
              
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
                <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                <input type="text" data-id="pro1" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
              </div>
              <form method="POST">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <button type="submit" name="delete_submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
              </form>
                <button type="submit" name="save_later_submit" class="btn font-baloo text-danger">Save for Later</button>
              
            </div>
            <!-- !product qty -->
          </div>
          <div class="col-sm-2 text-right">
            <div class="font-size-20 text-danger font-baloo">
              $<span class="product_price"><?php echo $item['item_price']??0;?></span>
            </div>
          </div>
        </div>
         <?php 
         return $item['item_price'];
       }, $cart);
// print_r($subTotal);
        // endforeach;
        }, $cartPros);
         ?> 
        <!-- !cart item -->
      </div>