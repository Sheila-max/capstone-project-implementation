<?php

require('../controllers/product_controller.php'); 
include('../views/menu.php');?>
      <div class="main">
        <section class="module bg-dark-30" data-background="../assets/images/Landing/background.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Register</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row-center">
    
              <div class="col-sm-5">
                <h4 class="font-alt">Register</h4>
                <hr class="divider-w mb-10">
                <form class="form" method="post" name="Formregister"  action="registerprocess.php">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" type="text" name="email" placeholder="Email" required/>
                  </div>
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input class="form-control" id="name" type="text" name="name" placeholder="Full Name" required/>
                  </div>
                  <div class="form-group">
				    <label for="contact">Phone number</label>
				    <input class="form-control" type="number" placeholder="Contact Number" name="contact" id="contact">
				   
			    </div>
                  <div class="form-group">
                    <label for="pass">Password</label>
                    <input class="form-control" id="pass" type="password" name="pass" placeholder="Password" required/>
                  </div>
                  <div class="form-group">
                    <label for="cpass">Confirm Password</label>
                    <input class="form-control" id="cpass" type="password" name="cpass" placeholder="Re-enter Password" required/>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-block btn-round btn-b" type="submit" id="button" name="register">Register</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
    <?php include('../views/footer.php')?>
  </body>
</html>