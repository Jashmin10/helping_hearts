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
  <title>Category Update</title>
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
                <h3>Category Update</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                  <li class="breadcrumb-item">Products</li>
                  <li class="breadcrumb-item">Edit Category </li>

                </ol>
              </div>
              <div class="col-sm-6 text-end">
                <a href="category_view.php"><button class="btn btn-outline-primary btn-sm" type="button">Back</button></a>
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
                      <form class="theme-form" method="post" id="_frm" enctype="multipart/form-data">
                        <?php
                        if (isset($_GET["selectid"])) {
                          $id = $_GET["selectid"];
                          $sql = "select * from tbl_category where cat_id = $id ;";
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                          while ($row = mysqli_fetch_assoc($result)) {
                            $name = $row["cat_name"];
                            $myimg = $row["cat_img"];

                        ?>
                            
                              <div class="mb-3 row">
                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="inputName3">Category Name</label>
                                  <div class="col-sm-9">
                                    <input class="form-control" name = "cat_name" type="text" placeholder="Category Name" value="<?php echo $name; ?>">
                                  </div>
                                </div>
                                <div class="mb-3 row">
                                  <label class="col-sm-3 col-form-label" for="inputName3">Category Image</label>
                                  <div class="col-sm-9">
                                    <input class="form-control"  type="file" name="myfile"  id="myfile"/>
                                    <br />
                                    <img src="<?php echo 'uploads/category_img/' . $myimg; ?>" id="img" width="100" height="100" />
                                    <input type="hidden" name="oldimg" value="<?php echo $myimg; ?>">
                                  </div>
                                </div>
                              <?php
                            }
                          }

                          if (isset($_POST["btn_update"]))
                           {
                            $cname = $_POST["cat_name"];
                            $oldimg = $_POST["oldimg"];
                            $newimg="";

                            if(empty($_FILES["myfile"]["name"]))
                            {
                             
                                $newimg = $oldimg;
                              } 
                              else
                               {
                                unlink($uploadDirectory . $oldimg); //delete old images
                                $ext = pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);
                                $imgname = time() . '.' . $ext;
                                $uploadDirectory = "uploads/category_img/";
                                move_uploaded_file($_FILES["myfile"]["tmp_name"], $uploadDirectory.$imgname);
                                $newimg = $imgname;
                              }
                              $sql = "update tbl_category set cat_name='$cname', cat_img='$newimg' where cat_id='$id'  ;";
                              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            
                              echo "<script> window.location='category_view.php'; </script>";
                             
                          {
                           ?>
                            <div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i class="icon-thumb-down"></i>
                      <p>already exist</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                           <?php
                          }
                          }
                            ?>


                              </div>
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="btn_update">Update Category</button>
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

    
  <script>
    $(document).ready(function(){
      jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please"); 

      $("#_frm").validate({
        rules: {
          cat_name:{
            required:true,
            minlength:3,
            lettersonly:true,
          },
          myfile: {
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
        }
        },
        messages: {
          cat_name:{
            required:"Blank is not allowed.",
            minlength:"atleast 3 letter is required.",
            lettersonly:"Numbers and spacialcharecter are not allow."
          },
          myfile: {
            required: "Please upload file.",
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
        }
        }

      });

    });
  </script>
</body>
</html>