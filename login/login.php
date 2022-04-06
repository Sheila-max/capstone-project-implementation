<?php

require('../controllers/product_controller.php'); 
include('../views/menu.php');?>
      <div class="main">
        <section class="module bg-dark-30" data-background="../assets/images/landing/background.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Login</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row-center">
              <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                <h4 class="font-alt">Login</h4>
                <hr class="divider-w mb-10">
                <form class="form" method="post" id='form' action="loginprocess.php" >
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" name="email"  placeholder="email" required/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="pass" type="password" name="pass" placeholder="Password"/>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-round btn-b" type="submit" id="button" name="login">Login</button>
                  </div>
                  <div class="form-group"><a href="">Forgot Password?</a></div>
                </form>
              </div>
    
            </div>
          </div>
        </section>
    <?php include('../views/footer.php')?>
  </body>
</html>