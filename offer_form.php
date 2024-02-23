<?php
include "commanpages/session.php";
include "commanpages/connection.php";
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="assets/images/helping.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/images/helping.png" type="image/x-icon">
  <title>Offer Form</title>
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
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="assets/custome.css">

</head>

<body>
  <!-- Loader starts-->
  <?php include "commanpages/loader.php"; ?>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->
  <div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <?php include "commanpages/header.php"; ?>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
      <!-- Page Sidebar Start-->
      <?php include "commanpages/sidemenu.php"; ?>
      <!-- Page Sidebar Ends-->
      <div class="page-body">
        <div class="container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-sm-6">
                <h3>Offer Form</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Products</li>
                  <li class="breadcrumb-item active">Add Offers</li>
                </ol>
              </div>
              <div class="col-sm-6 text-end">
              <a href="offer_view.php"><button class="btn btn-outline-primary btn-sm" type="button">Back</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 col-xl-12">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                  
                    <div class="card-body">
                      <form class="theme-form" method="post" id="_frm">
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Tittle</label>
                          <input class="form-control" name="tittle" type="text" placeholder="Enter Tittle">
                        </div>
                      
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Minimum</label>
                          <input class="form-control" name="min" type="number" placeholder="Enter Minimum">
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Maximum</label>
                          <input class="form-control" name="max" type="number" placeholder="Enter Maximum">
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Discount</label>
                          <input class="form-control" name="discount" type="number" placeholder="Enter Discount">
                        </div>
                        
                  <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputName3">Is_Active</label>
                  <div class="form-group m-t-15">
                          <div class="radio-primary">
                            <input type="radio" name="is_display" value="yes">
                            <label>Yes</label>
                          </div>
                          <div class="radio-primary">
                            <input type="radio" name="is_display" value="no">
                            <label>No</label>
                          </div>
                    </div>                
                </div>
                        <?php 
                      if (isset($_POST["btn_add"])) {
  
                        $tt = $_POST["tittle"];
                        $min = $_POST["min"];
                        $max = $_POST["max"];
                        $dis = $_POST["discount"];
                        $_radioSelect = $_POST["is_display"];
                        
                      
                        $sql = "select * from tbl_offers where tittle = '$tt';";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $row = mysqli_num_rows($result);
                        if ($row == 0) {
                          $sql = "insert into tbl_offers(tittle, min, max, discount,is_display) values('$tt', '$min', '$max', '$dis', '$_radioSelect');";
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                      
                      
                          echo "<script>
                            window.location = 'offer_view.php';
                          </script>";
                        
                        } else {
                        ?>
                          <div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down"></i>
                            <p>Already Exist</p>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      
                      <?php
                        }
                      }
                      ?>
                     
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="btn_add">Add Offer</button>
                      <button class="btn btn-secondary">Clear</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid Ends-->
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
  <script src="assets/jquery.validate.min.js"></script>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="assets/js/script.js"></script>
  <!-- login js-->
  <!-- Plugin used-->
</body>
<script>
    $(document).ready(function(){
      jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please"); 


      $("#_frm").validate({
        rules: {
          tittle:{
            required:true,
            minlength:3,
          },
          min:{
            required:true,
            minlength:1,
            maxlength:4,
          },
          max:{
            required:true,
            minlength:1,
            maxlength:4,
          },
          discount:{
            required:true,
            minlength:1,
            maxlength:2,
          }
        },
        messages: {
          tittle:{
            required:"Blank is not allowed.",
            minlength:"atleast 3 letter is required.",
          },
          min:{
            required:"Blank is not allowed.",
            minlength:"atleast 3 letter is required.",
          },
          max:{
            required:"Blank is not allowed.",
            minlength:"atleast 3 letter is required.",
          },
          discount:{
            required:"Blank is not allowed.",
            minlength:"atleast 3 letter is required.",
          }
        }

      });

    });
    </script>

</html>