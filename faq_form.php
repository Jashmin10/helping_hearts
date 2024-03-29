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
  <title>FAQ Form</title>
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
                <h3>FAQ Form</h3>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">FAQ</li>
                  <li class="breadcrumb-item active">Add FAQ</li>
                </ol>
              </div>
              <div class="col-sm-6 text-end">
              <a href="faq_view.php"><button class="btn btn-outline-primary btn-sm" type="button">Back</button></a>
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
                      <label class="col-form-label pt-0" for="exampleInputState">FAQ Category</label>
                        <select class="form-control" name="faqcat_id">
                        <?php 
                         $sql = "select * from tbl_faqcat;";
                         $result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
                         while($row = mysqli_fetch_assoc($result))
                         {
                          $nm= $row['type'];
                          $id=$row['faqcat_id'];
                           echo "<option value=$id> $nm </option>";
                         }
                        ?>
                      </select>
                        </div>
                      
                
                     
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Question</label>
                          <input class="form-control" name="question" type="text" placeholder="Enter Question">
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Answer</label>
                          <input class="form-control" name="answer" type="text" placeholder="Enter Answer">
                        </div>
                        <?php 
                      If(isset($_POST["btn_add"]))
                      {
                        //$nm = $_POST["type"];
                        $id = $_POST["faqcat_id"];
                        $que=$_POST["question"];
                        $ans=$_POST["answer"];
                        $sql= "select * from tbl_faq where faqcat_id='$id';";
                        $r = mysqli_query($conn, $sql);
                        if(!empty($nm) && !empty($id) && mysqli_num_rows($r)==0){
                          $sql = "insert into tbl_faq(faqcat_id,question,answer) values('$id','$que','$ans');";
                          $result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
                          ?>
                          <div class="alert alert-success inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-up alert-center"></i>
                        <p><b> Well done! </b>You successfully insert.</p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      <?php
                        }
                        else
                        {
                          ?>
                          <div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down"></i>
                      <p> already Exist</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                        }
                      }
                      ?> 
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="btn_add">Done</button>
                      <button class="btn btn-secondary " type="reset">Clear</button>
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

jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");

      $("#_frm").validate({
        rules: {
          question:{
            required:true,
            minlength:3, 
            noSpace:true
          },
          answer:{
            required:true,
            minlength:3, 
            noSpace:true
          }
        },
        messages: {
            question:{
            required:"Blank is not allowed.",
            minlength:"atleast 3 letter is required.",  
            noSpace:"Space is not allowed"

          },
          answer:{
            required:"Blank is not allowed.",
            minlength:"atleast 3 letter is required.",  
            noSpace:"Space is not allowed"

          }

        }

      });

    });
    </script>

</html>