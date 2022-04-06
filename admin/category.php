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
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
        <a href="index.html" class="nav-link">Category</a>
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
      <!-- Sidebar user panel (optional) -->
      
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
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./payments.php" class="nav-link ">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>Payments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./category.php" class="nav-link active">
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
            <h1 class="m-0">Categories</h1>
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
          
            <div class="ml-2" >
            <button type="button" class="btn btn-primary btn-round"  data-toggle="modal" data-target="#addcategory">Add new Category</button>
           
            </div>

          <!-- Modal -->
          <div id="addcategory" class="modal fade" role="dialog">
            <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Add Category</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
          </div>
          <div class="modal-body" >
              <form id="form" method="post" action="../actions/category_process.php">
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="Category Name" name="catname" id="catname" required>
                </div>

                <div class="form-submit">
                 <button type="submit" class="btn btn-primary" name="addcat" id="addcat"> Add Category </button>
                 <input class="form-control" type="hidden" name="id" value="<?php echo $category['cat_id'] ?>">
                </div>
              </form>
          
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
          </div>
          </div>
      </div>
    </div>
    
    <div class="col-12">
      <div class="card text-center">
        <div class="card-header">
          

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
              <th> Category ID</th>
              <th> Category Name</th>
              <th> </th>
              <th> </th>
              
              
                
              </tr>
            </thead>
            <tbody>

            <?php
              require('../controllers/product_controller.php');
              $categories = displaycategories_controller();
              if(!empty($categories)){
                foreach($categories as $x){?>
                      <tr>
                        <td><?=$x['cat_id']?></td>
                        <td><?=$x['cat_name']?></td>
                        <td><button type='button' name='edit' class='fas fa-edit  mr-1 editbtn'></button></td>               
                        
                        <td><a style= 'color: red' href='../actions/category_process.php?deletecatID=<?=$x['cat_id']?>'><i class='fa fa-trash'></i></a></td>
                      </tr>
                      
                  <?php }
                    }
                    else{ ?>
                      
                        <tr>
                        <td>No Category Inserted Yet</td>
                        
                   </tr>
        
                        
                   <?php  }?>
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

  <!-- Modal to update the brand -->
                      
  <div id="updatecat" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
        </div>
        <div class="modal-body">
        <form id="form" method="post" action="../actions/category_process.php">
            <div class="form-group">
            <input class="form-control" type="text" placeholder="Category name" name="catname" id="catname"  >
            <input class="form-control" type="hidden" name="catid" id="catid" required>
            </div>

            <div class="form-submit">
            <button type="submit" class="btn btn-primary" name="updatecat" >Update</button>
            </div>
        </form>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
    </div>
 <!-- JQUERY to trigger when update button is clicked -->
    <script>

    $(document).ready(function(){
        $('.editbtn').on('click',function(){
            $('#updatecat').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            
            $('input[name="catid"]').val(data[0]);
            $('input[name="catname"]').val(data[1]);
            

        });
    });

    </script>
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

<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

</body>

</html>