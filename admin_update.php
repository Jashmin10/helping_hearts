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
  <title>Admin Details</title>
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
    <!-- Page Header Ends  -->
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
                <h3>Change Details</h3>
               
              </div>
              <div class="col-sm-6 text-end">
              <a href="dashboard.php"><button class="btn btn-outline-primary btn-sm" type="button">Back</button></a>
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
                    <div class="card-header pb-0">
                      <!-- <h5>State Form</h5> -->
                    </div>
                    <div class="card-body">
                      <form class="theme-form" method="post" id="_frm" enctype="multipart/form-data">
                      <?php
                        if (isset($_SESSION["Userid"])) {
                          $id = $_SESSION["Userid"];
                          $sql = "select * from tbl_admin where admin_id = $id ;";
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                          while ($row = mysqli_fetch_assoc($result)) {
                            $nm=$row["name"];  
                            $mail = $row["email"];
                         
                            $con=$row["contact"]; 
                            $image1 = $row["admin_img"];
                          
                        ?>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState ">Name</label>
                          <input class="form-control" name="name" type="text" placeholder="Enter Name"  value="<?php echo $nm; ?>">
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">E-mail</label>
                          <input class="form-control" name="email" type="email" placeholder="Enter E-mail"  value="<?php echo $mail; ?>">
                          </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Contact</label>
                          <input class="form-control" name="contact" type="number" placeholder="Enter Contact Number"  value="<?php echo $con; ?>">
                        </div>
                        <div class="mb-3 ">
                                  <label class="col-sm-3 col-form-label" for="inputName3"> Admin Image</label>
                                  <div class="col-sm-9">
                                    <input class="form-control"  type="file" name="admin_img"  id="img1"/>
                                    <br />
                                    <img src="<?php echo 'uploads/admin_img/' . $image1; ?>" id="ig1" width="100" height="100" />
                                    <input type="hidden" name="oldimg1" value="<?php echo $image1; ?>">
                                  </div>
                                </div>
                </div>
                <?php
                          ?>
                           <?php
                            }
                          }

                          if (isset($_POST["btn_add"]))
                           {
                            $nm = $_POST["name"];
                            $mail=$_POST["email"];
                            
                            $con=$_POST["contact"];
                           // $image1=$_POST["admin_img"];
                           $oldimg =  $_POST["oldimg1"];

                            $newimg="";
                           

                            if(empty($_FILES["admin_img"]["name"]))
                            {
                             
                                $newimg = $oldimg;
                              } 
                              else
                               {
                                $ext = pathinfo($_FILES["admin_img"]["name"], PATHINFO_EXTENSION);
                                $imgname = time() . '.' . $ext;
                                $uploadDirectory = "uploads/admin_img/";
                               unlink($uploadDirectory . $oldimg);//delete

                                move_uploaded_file($_FILES["admin_img"]["tmp_name"], $uploadDirectory.$imgname);
                                $newimg = $imgname;
                              }
                              $sql = "update tbl_admin set name='$nm', email='$mail', contact='$con', admin_img='$newimg' where admin_id='$id'  ;";
                              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                              $_SESSION["Username"]= $nm;
                              $_SESSION["Useremail"]=$mail;
                              $_SESSION["Userimg"]=$newimg;
                              echo "<script> window.location='dashboard.php'; </script>";
                           
                          }
                            ?>
 <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="btn_add">Done</button>
                      <button class="btn btn-secondary" type="reset">Clear</button>
                    </div>
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
  <script>
    $(document).ready(function(){
      jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please"); 

      $("#_frm").validate({
        rules: {
          name:{
            required:true,
            minlength:3,
            lettersonly:true,
            
          },
          mail: {
          required: true,
          email: true
        },
        pass: {
          required: true,
          minlength: 3,
          maxlength:10
        },
        contact: {
          required: true,
          minlength: 10,
          maxlength: 10
        },
        },
        messages: {
          name:{
            required:"Blank is not allowed.",
            minlength:"atleast 3 letter is required.",
            lettersonly:"Numbers and spacialcharecter are not allow."
          },
          mail: {
          required: "Please enter proper E-mail.",
          email: "Please enter a valid email address",
        },
        pass: {
          required: "Please provide a password",
          minlength: "Your password must be at least 3 characters long",
          maxlength:"This password field has a maximum lenght of 10 characters"
        },
        contact: {
          required: "Please provide a contact number",
          minlength: "Enter a 10 digit contact number",
          maxlength: "Contact number must be contain 10 digits"
        },
        }

      });

    });
    </script>
</body>


</html>