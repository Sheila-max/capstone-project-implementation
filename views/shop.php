
<?php 
require('../controllers/product_controller.php');
require('../controllers/cart_controller.php');
session_start();
//including menu
include('menu.php');
?>

<section class="home-section home-fade home-full-height" id="home">
  <div class="hero-slider">
    <ul class="slides">
      <li class="bg-dark-30 bg-dark shop-page-header" style="background-image:url(&quot;../assets/images/landing/bg.png&quot;);">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">We are COMPASS</div>
            <div class="font-alt mb-30 titan-title-size-3">ONCE YOU HAVE IT, YOU LOVE IT</div>
            <div class="font-alt mb-40 titan-title-size-1">Local Rwandan shops</div><a class="section-scroll btn btn-border-w btn-round" href="#latest">Learn More</a>
          </div>
        </div>
      </li>
      <li class="bg-dark-30 bg-dark shop-page-header" style="background-image:url(&quot;../assets/images/landing/jw.png&quot;);">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1"> Compass</div>
            <div class="font-alt mb-40 titan-title-size-3">Exclusive products</div><a class="section-scroll btn btn-border-w btn-round" href="#latest">Learn More</a>
          </div>
        </div>
      </li>
      <li class="bg-dark-30 bg-dark shop-page-header" style="background-image:url(&quot;../assets/images/landing/bg1.png&quot;);">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">Compass</div>
            <div class="font-alt mb-40 titan-title-size-3">Directing you to your local businesses</div><a class="section-scroll btn btn-border-w btn-round" href="#latest">Learn More</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</section>

<div class="main">
          
  <section class="module-small" id="products">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Our Products</h2>
        </div>

        <form class="form-inline" method="get" action="../actions/search.php">
          <input class="form-control" type="search" placeholder="Search"  name="searchTerm">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search"><i class ="fa fa-search"></i></button>
        </form>
      </div>
      
      <div class="row multi-columns-row">
        
        <?php
          //SELECT ALL PRPDUCT TO VIEW
          $products=select_all_products_controller();
          
          //GENERATE IP ADDRESS OF THE USER
          $ipadd=getRealIpAddr();
          //CHECK IF USER IS LOGGED IN
          if(isset($_SESSION['user_id'])) {
            $cid=$_SESSION['user_id'];
          }
          else{$cid=null;}
          
          $qty=1;

          $limit = 16;
          $num_products=count($products);
          $pages=ceil($num_products/$limit);
          //LOOP THROUGH ALL PRODUCTS FOR DISPLAY
          foreach ($products as $product){
            $id=$product['product_id'];

        ?>
        

        <div class="col-sm-6 col-md-4 col-lg-4">
          <div class="shop-item">
            <div class="shop-item-image"><img src=<?php echo $product['product_image'];?> />
              <div class="shop-item-detail">
                <?php if($product['stock'] > 0 ) {?>
                <a class="btn btn-round btn-b" href="<?php echo '../actions/add_to_cart.php?pid='.$id.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><span class="icon-basket"></span></a>
                <a class="btn btn-round btn-b" href="single_product.php?id=<?= $id;?>" ><i class="far fa-eye"></i></a>
                <?php } else{?>
                  <a class="btn btn-round btn-b" href="single_product.php?id=<?= $id;?>" ><i class="far fa-eye"></i></a>
                <?php } ?>
              </div>   
            </div>
            <!-- DISPLAY THAT A PRODUCT IS OUT OF STOCK -->
            <?php if($product['stock'] > 0 ) {?>
            <div class="cart" style="padding-top:5%">
              <a class="btn btn-round btn-b" href="<?php echo '../actions/add_to_cart.php?pid='.$id.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>"><span class="icon-basket">Add To Cart</span></a>
            </div>
            <!-- ADD TO CART -->
            <?php }else{?>
            <div class="cart" style="padding-top:5%; color:red">
                <a class="btn btn-danger btn-round" href="">Out of Stock</a>
            </div>
            <?php }?>
              <h4 class="shop-item-title font-alt"><a href="single_product.php?id=<?= $id;?>" ><?= $product['product_title']?></a></h4> <?= $product['product_price']?>
            </div>
        </div>
          
          <?php }; ?>
      </div> 
      
      <!-- pagination -->
      
      <div class="row">
        <div class="col-sm-12">
          <div class="pagination font-alt"><a href="shop.php#products"><i class="fa fa-angle-left"></i></a><a class="active" href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#"><i class="fa fa-angle-right"></i></a></div>
        </div>
      </div>
    </div>
  </section>
        
  <section class="module module-video bg-dark-30" data-background="">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt mb-0">Compass, satisfies the need. Create your own style!</h2>
        </div>
      </div>
    </div>
    <div class="video-player" data-property="{videoURL:'https://www.youtube.com/watch?v=JNap0OR9UEg', containment:'.module-video', startAt:104, stopAt:107, mute:true, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
  </section>
        
  <hr class="divider-w">
  <section class="module" id="news">
    <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <h2 class="module-title font-alt">About Compass</h2>
          </div>
        </div>
        <div class="row multi-columns-row post-columns wo-border">
          <div class="col-sm-6 col-md-4 col-lg-12">
            <div class="post mb-40">
              <div class="post-header font-alt"> </div>
            <div class="post-entry">
                <p>
                On realizing that a significant number of people in Rwanda are unable to find certain products online
                because many online platforms don't sell them, we created Compass. The Compass online platform helps to 
                direct people the small and local businesses in Rwanda as well as their products. SEE THE WORLD WITH SMALL BUSINESSES! 
                </p>
            </div>   
            </div>
          </div>  
        </div>
    </div>
  </section>
</div>
<hr class="divider-w">
<!-- including a staple footer -->
<?php include('../views/footer.php');?>
 
