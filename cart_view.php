<?php
  include "commanpages/session.php";
  include "commanpages/connection.php";

?>

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/viho/theme/datatable-advance.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Nov 2021 08:24:29 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/helping.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/helping.png" type="image/x-icon">
    <title>Cart Details</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>
  <body>
    <!-- Loader starts-->
    <?php  include "commanpages/loader.php"; ?>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <?php  include "commanpages/header.php"; ?>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <?php  include "commanpages/sidemenu.php"; ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Cart Management</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item">Products Details</li>
                    <li class="breadcrumb-item active">Cart Management</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="advance-1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Product </th>
                            <th>User name</th>
                            <th>Quantity</th>
                            <th>Date & time</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count=0;
                                $sql="select * from tbl_cart inner join tbl_products on tbl_cart.product_id=tbl_products.product_id
                                inner join tbl_user on tbl_cart.user_id=tbl_user.user_id;";
                                $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                 while($row = mysqli_fetch_assoc($result))
                                 {
                                     $count++;
                                    $id=$row["cart_id"];
                                    $name=$row["name"];
                                    $qty=$row["qty"];
                                    $dt=$row["added_datetime"];
                                   
                                    ?>
                                     <tr>
                                      <td><?php echo $count ?> </td>
                                      <td><?php echo $row["tittle"]?></td>
                                      <td><?php echo $row["name"]?></td>
                                      <td><?php echo $row["qty"]?></td>
                                      <td><?php echo $row["added_datetime"]?></td>
                                    </tr>
                          <?php 
                                }
                             ?>
                          
                         
                         
                        </tbody>
                        <tfoot>
                          <tr>
                          <th>#</th>
                            <th>Product </th>
                            <th>User name</th>
                            <th>Quantity</th>
                            <th>Date & time</th>
    
                          </tr>
                        </tfoot>
                        <?php 
                      
                      if(isset($_POST["deletebtnM"]))
                      {
                        $delid=$_POST['deleteid'];
                        $result = mysqli_query($conn,"select * from tbl_volunteers WHERE vol_id=$delid;")or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($result))
                        {
                          unlink("uploads/vol_img/".$row['vol_img']);
                        }

                        mysqli_query($conn,"DELETE FROM tbl_volunteers WHERE vol_id=$delid;") or die(mysqli_error($conn));
                        
                        echo "<script>window.location='vol_view.php'; </script>";
                      }
                      ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
        <!-- footer start-->
        <?php include "commanpages/footer.php"; ?>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/config.js"></script>
    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Plugins JS start-->
    <script src="assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="assets/js/script.js"></script>
    
    <!-- login js-->
    <!-- Plugin used-->
  </body>
<!-- Mirrored from admin.pixelstrap.com/viho/theme/datatable-advance.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Nov 2021 08:24:30 GMT -->
</html>