<?php $productShuffle = $Product->GetData();
shuffle($productShuffle);
//add to cart
if ($_SERVER['REQUEST_METHOD']=="POST") {
  if (isset($_POST['_top_sale'])) {
    $cartArray = array( 
      'user_id' => $_POST['user_id'],
      'item_id' => $_POST['item_id'],
       );
    $Cart->insertIntoCart($cartArray);

  }
}
//add to cart
?>
<section id="top-sale">
  <div class="container py-5">
    <h4 class="font-rubik font-size-20">Top Sale</h4>
    <hr>
    <!-- owl carousel -->
    <div class="owl-carousel owl-theme">
      <?php array_map(function($item){?>
      
      <div class="item py-2">
        <div class="product font-rale">
          <a href="<?php printf("%s?item_id=%s",'product.php',$item['item_id']); ?>"><img src="<?php echo $item['item_image'];?>" alt="product1" class="img-fluid"></a>
          <div class="text-center">
            <h6><?php echo $item['item_name']??"Unknown";?></h6>
            <div class="rating text-warning font-size-12">
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="far fa-star"></i></span>
            </div>
            <div class="price py-2">
              <span><?php echo $item['item_price']??0;?></span>
            </div>
            <form method="post">
              <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
              <input type="hidden" name="user_id" value="<?php echo 1; ?>">
              <button  type="submit" name="_top_sale" class="btn btn-warning font-size-12">Add to Cart</button>
            </form>
          </div>
        </div>
      </div>
      <?php }, $productShuffle);  ?>
    </div>
    <!-- !owl carousel -->
  </div>
</section>