<?php

require('../controllers/product_controller.php');
require('../controllers/cart_controller.php');
session_start();
include('menu.php');
?>

<div class="main">       
  <section class="module">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h1 class="module-title font-alt">Checkout</h1>
        </div>
      </div>
          
      <hr class="divider-w pt-20">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped table-border checkout-table">
            <tr>
              <th class="hidden-xs">Item</th>
              <th>Description</th>
              <th class="hidden-xs">Quantity</th>
              <th>Total Amount</th>
              <th>Status</th>
              <th></th>
            </tr>
            <?php
              // getting the details of the cart
              
              $cid = $_SESSION['user_id'];
              $orders = customized_orders_controller($cid);           
              if(!empty($orders)){
                foreach($orders as $order){
                  $product=select_one_product_controller($order['product_id']);
                  if($order['order_status']=="confirmed"){?>  
                  <tr>        
                    <td class="hidden-xs"><a href="single_product.php"><img src=<?= $product['product_image'];?> alt="Accessories Pack"/></a></td>
                    <td>
                      <h5 class="product-title font-alt"><?=$product['product_title'];?></h5>
                    </td>
                    <td class="hidden-xs">
                      <h5 class="product-title font-alt"><?=$order['product_qty'];?></h5>
                    </td>
                    <td class="hidden-xs">
                      <h5 class="product-title font-alt"><?=$order['amount'];?></h5>
                    </td>
                    <td class="hidden-xs">
                      <h5 class="product-title font-alt" style="color:green"><?=$order['order_status'];?></h5>
                    </td>
                    <td><a class="btn btn-lg btn-block btn-round btn-d" href="<?php echo 'confirm_customized_order.php?order_id='.$order['order_id'].'&amount= '.$order['amount']; ?>" type="submit" name="checkout" >Proceed to Checkout</a></td>
                  </tr>
                  <?php }if($order['order_status']=="unconfirmed"){?>
                    <tr>        
                    <td class="hidden-xs"><a href="single_product.php"><img src=<?= $product['product_image'];?> alt="Accessories Pack"/></a></td>
                    <td>
                      <h5 class="product-title font-alt"><?=$product['product_title'];?></h5>
                    </td>
                    <td class="hidden-xs">
                      <h5 class="product-title font-alt"><?=$order['product_qty'];?></h5>
                    </td>
                    <td class="hidden-xs">
                      <h5 class="product-title font-alt"><?=$order['amount'];?></h5>
                    </td>
                    <td class="hidden-xs">
                      <h5 class="product-title font-alt" >your order is being Processed</h5>
                    </td>
            
                  </tr>
               <?php }
                    }}?>
                      
                                            
                  </tbody>
          </table>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-sm-3 ">
          <div class="form-group">
            <a class="btn btn-lg btn-block btn-round btn-d" href="<?php echo 'confirm_customized_order.php?order_id='.$order['order_id'].'&amount= '.$order['amount']; ?>" type="submit" name="checkout" >Proceed to Checkout</a>
          </div>
        </div>
      </div> -->
      </div>
    </section>
  </div>
<?php include_once('footer.php');?>
    
  
 