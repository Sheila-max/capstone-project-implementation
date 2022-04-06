<?php
session_start();
//check if a user is logged in
if(isset($_SESSION['user_id'])){
  //if user is not admin redirect to home page
  if($_SESSION['user_role']==1){
    header("Location:../index.php");
  }
}
else{
  //login first to access admin page
  header("Location:../login/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Compass</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link">Home</a>
      </li>
     
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-lightgreen bg-lightgreen my-1 mx-1 mb-1 rounded elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link border-bottom-0 mt-3" style="text-align:left;">
      <img  src="../assets/images/landing/logo.png" width="100px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-lightgreen">
  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="./index.php" class="nav-link ">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./customizedorders.php" class="nav-link ">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>Customized Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./payments.php" class="nav-link active">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./category.php" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./brand.php" class="nav-link ">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./products.php" class="nav-link">
                  <i class="fas fa-warehouse nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./customers.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../login/logout.php" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper px-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Payments</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">

          <div class="col-12">
           <div class="card text-center">
             
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th> Customer ID</th>
                    <th> Invoice no</th>
                    <th> Order date</th>
                    <th> Order status</th>  
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  require('../controllers/cart_controller.php');
                    $payments=select_payments_controller();
                    if(!empty($payments)){
                        foreach($payments as $payment){
                            echo 
                            "
                            <tr>
                                <td>{$payment['customer_id']}</td>
                                <td>{$payment['order_id']}</td>
                                <td>{$payment['amt']}</td>
                                <td>{$payment['payment_date']}</td>
                            </tr>
                            ";
                        }
                    }
                    else{
                        echo 
                        "

                        <tr>
                        <td>No Payments Received yet</td>
                        
                        </tr>

                        ";
                    }
                
                ?> 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Compass</strong>
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

</body>
<?php
    if(isset($_SESSION["error_message"])){
        $message = $_SESSION["error_message"];
        echo "<script>
            swal('Error!', '".$message."', 'error');
            </script>";
        unset($_SESSION["error_message"]);  
    } 
    
    if(isset($_SESSION["success_message"])){
        $message = $_SESSION["success_message"];
        echo "<script>
            swal('Done!', '".$message."', 'success');
            </script>";
        unset($_SESSION["success_message"]);
      }  
?>
</html>
