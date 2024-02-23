<?php
include "commanpages/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include library files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
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
  <title>Forget Password</title>
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
            <form class=" login-form" method="post" id="_frm">
              <h4>Forget Password</h4>
              <br>



              <div class="form-group">
                <label>E-mail</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                  <input name="mail" class="form-control" type="email" placeholder="Enter E-mail">
                </div>
              </div>


              <br />
              <?php
              if (isset($_POST["btn_sub"])) {

                $_email = $_POST["mail"];


                $sql = "select * from tbl_admin where email = '$_email';";
                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $row = mysqli_num_rows($query);
                if ($row <= 0) {
                  echo "Email is not valid";
                } else {


                  while ($res = mysqli_fetch_assoc($query)) 
                  {
                    $_pass = $res["admin_password"];
                    // Create an instance; Pass `true` to enable exceptions 
                    $mail = new PHPMailer;

                    // Server settings 
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
                    $mail->isSMTP();                            // Set mailer to use SMTP 
                    $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
                    $mail->SMTPAuth = true;                     // Enable SMTP authentication 
                    $mail->Username = 'mahendra.patel9824039954';       // SMTP username 
                    $mail->Password = 'fhqrctsrpbqtxmts';         // SMTP password 
                    $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
                    $mail->Port = 465;                          // TCP port to connect to 

                    // Sender info 
                    $mail->setFrom('mahendra.patel9824039954@gmail.com', 'HelpingHearts');
                    $mail->addReplyTo('mahendra.patel9824039954@gmail.com', 'HelpingHearts');

                    // Add a recipient 
                    $mail->addAddress($_email);

                    //$mail->addCC('cc@example.com'); 
                    //$mail->addBCC('bcc@example.com'); 

                    // Set email format to HTML 
                    $mail->isHTML(true);

                    // Mail subject 
                    $mail->Subject = 'Email from HelpingHearts';

                    // Mail body content 
                    $bodyContent = '<h1>How to Send Email from Localhost using PHP by CodexWorld</h1>';
                    $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>';
                    $bodyContent .= '<h2>Your Password is :'.$_pass.' </h2>';
                    $mail->Body    = $bodyContent;

                    // Send email 
                    if (!$mail->send()) {
                      echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                      echo 'Message has been sent.';
                    }
                  }
                }
              }


              ?>
              <div class="form-group">
                <Button name="btn_sub" class="btn btn-primary btn-block" type="submit">Done</Button>
              </div>

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
  <script src="assets/jquery.validate.min.js"></script>

  <!-- Plugins JS start-->
  <script src="assets/jquery.validate.min.js"></script>
  <!-- Theme js-->
  <script src="assets/js/script.js"></script>
  <!-- login js-->
  <!-- Plugin used-->
</body>
<script>
  $(document).ready(function() {

    $("#_frm").validate({


      errorPlacement: function(error, element) {
        if (element.attr("name") == "mail") {
          error.insertAfter(element.parent()); // Show error after Current Password input group
        }

      },


      rules: {
        mail: {
          required: true,
          email: true,

        }
      },
      messages: {
        mail: {
          required: "Blank is not allowed.",
          email: "e.g Test@gmail.com",
        }
      }

    });
  });
</script>

</html>