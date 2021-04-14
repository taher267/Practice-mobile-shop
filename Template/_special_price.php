<?php $productShuffle = $Product->GetData();
shuffle($productShuffle);
$brand = array_map(function($pro){ return $pro['item_brand'];}, $productShuffle);
$unique = array_unique($brand);
sort($unique);
//add To cart
if ($_SERVER['REQUEST_METHOD']=="POST") {
  if (isset($_POST['_special_price'])) {
    $cartArray = array(
      'user_id' => $_POST['user_id'],
      'item_id' => $_POST['item_id'],
    );
    $Cart->insertIntoCart($cartArray);
  }
}
?>
<section id="special-price">
  <div class="container">
    <h4 class="font-rubik font-size-20">Special Price</h4>
    <div id="filters" class="button-group text-right font-baloo font-size-16">
      <button class="btn is-checked" data-filter="*">All Brand</button>
      <?php array_map(function($uniqueBrand){
      printf('<button class="btn" data-filter=".%s">%s</button>',$uniqueBrand, $uniqueBrand );
      }, $unique); ?>
      
      
      <!--  <button class="btn" data-filter=".Samsung">Samsung</button>
      <button class="btn" data-filter=".Redmi">Redmi</button> -->
    </div>
    <div class="grid">
      <?php array_map(function($item){?>
      
      <div class="grid-item border <?php echo $item['item_brand'];?>">
        <div class="item py-2" style="width: 200px;">
          <div class="product font-rale">
            <a href="<?php printf("%s?item_id=%s",'product.php',$item['item_id']); ?>"><img src="<?php echo $item['item_image'];?>" alt="product1" class="img-fluid"></a>
            <div class="text-center">
              <h6><?php echo $item['item_name'];?></h6>
              <div class="rating text-warning font-size-12">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="far fa-star"></i></span>
              </div>
              <div class="price py-2">
                <span><?php echo $item['item_price'];?></span>
              </div>
              <form method="post">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>">
                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <button  type="submit" name="_special_price" class="btn btn-warning font-size-12">Add to Cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php  }, $productShuffle); ?>
    </div>
  </div>
</section>