<?php 
include "commanpages/session.php";
include "commanpages/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from admin.pixelstrap.com/viho/theme/login_two.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Nov 2021 07:52:33 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/helping.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/helping.png" type="image/x-icon">
    <title>Change Password</title>
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
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-5"><img class="bg-img-cover bg-center" src="assets/images/login/3.jpg" alt="looginpage"></div>
          <div class="col-xl-7 p-0">    
            <div class="login-card">
              <form class="theme-form login-form" method="post" id="_frm">
                <h4>Change Password</h4>
                <br>
                


                <div class="form-group">
                  <label>Current Password</label>
                  <div class="input-group" ><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input name="cpassword" class="form-control" type="password" placeholder="Current Password">
                    <div class="show-hide">
                      <span class="show">                         
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>New Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="npassword" required="required" placeholder="New Password">
                    <div class="show-hide">
                      <span class="show">                         
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="repassword" required="required" placeholder="Confirm Password">
                    <div class="show-hide"><span class="show">                         </span></div>
                  </div>
                </div>
                <br>

              <?php 
              if(isset($_POST["btn_sub"]))
              {
                $curpass = $_POST['cpassword'];
                $newpass = $_POST['npassword'];
                $repassword = $_POST['repassword'];
                $id=$_SESSION["Userid"];
                $sql="select * from tbl_admin where admin_id=$id;";
                $res=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($res))
                {
                  if($row["admin_password"] == $curpass)
                  {
                    if($newpass==$repassword)
                    {
                      $update="UPDATE tbl_admin SET admin_password = '$newpass'  WHERE admin_id='$id' ;";
                       mysqli_query($conn, $update);
                       echo "<script> window.location='index.php'; </script>";
 
                    }
                    else
                    {
                      ?>
                      <div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down"></i>
                      <p>New Password and Confirm Password does not match </p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }


                  }
                  else{
                    ?>
                    <div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down"></i>
                      <p>Current Password is not valid</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                  }
                }

              }
              ?>

                <div class="form-group"><Button name="btn_sub" class="btn btn-primary btn-block" type="submit">Change Password</Button></div>
                
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end-->
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
     <!-- Plugins JS start-->
     <script src="assets/jquery.validate.min.js"></script>
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
    

        errorPlacement: function (error, element) {
      if (element.attr("name") == "cpassword") {
        error.insertAfter(element.parent()); // Show error after Current Password input group
      }
      if (element.attr("name") == "npassword") {
        error.insertAfter(element.parent()); // Show error after New Password input group
      }
      if (element.attr("name") == "repassword") {
        error.insertAfter(element.parent()); // Show error after Confirm Password input group
      }
    },
    
        rules: {
          cpassword: {
					required: true,
					minlength: 3
				},
          npassword: {
					required: true,
					minlength: 3,
          noSpace:true,
				},
				repassword: {
					required: true,
					minlength: 3,
				},
        },
        messages: {
          cpassword: {
					required: "Please provide a Current password",
					minlength: "Your password must be at least 3 characters long"
				},
          npassword: {
					required: "Please provide a New password",
					minlength: "Your password must be at least 3 characters long",
          noSpace : "Space is not allowed",
				},
				repassword: {
					required: "Please provide a Confirm password",
					minlength: "Your password must be at least 3 characters long",
					
				},
        }

      });

    });
    </script>
<!-- Mirrored from admin.pixelstrap.com/viho/theme/login_two.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Nov 2021 07:52:59 GMT -->
</html>