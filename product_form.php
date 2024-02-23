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
  <title>Product Form</title>
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
                <h3>Product Form</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Products</li>
                  <li class="breadcrumb-item active">Add Products</li>
                </ol>
              </div>
              <div class="col-sm-6 text-end">
                <a href="product_view.php"><button class="btn btn-outline-primary btn-sm" type="button">Back</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="col-sm-12">
          <div class="card">
           
            <div class="card-body">
              <form class="theme-form" id="_frm" method="post" enctype="multipart/form-data">
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputName3">Product Tittle</label>
                  <div class="col-sm-9">
                    <input class="form-control" id="inputName3" name="tittle" type="text" placeholder="Product Tittle">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputSubcat">Sub Category</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="subcat_id">
                      <?php
                      $sql = "select * from tbl_subcategory;";
                      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                      while ($row = mysqli_fetch_assoc($result)) {
                        $nm = $row['name'];
                        $id = $row['subcat_id'];
                        echo "<option value=$id> $nm </option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputPrice3">Price</label>
                  <div class="col-sm-9">
                    <input class="form-control" id="inputnumber" name="price" type="number" placeholder="Price">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputAddress3">Description</label>
                  <div class="col-sm-9">
                    <input class="form-control" id="inputAddress3" name="description" type="text" placeholder="Enter Description">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputAddress3">Video Url</label>
                  <div class="col-sm-9">
                    <input class="form-control" id="inputAddress3" name="video_url" type="text" placeholder="Enter Video Url">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputName3">Image 1</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="img1" type="file">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputName3">Image 2</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="img2" type="file">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputName3">Image 3</label>
                  <div class="col-sm-9">
                    <input class="form-control"name="img3" type="file">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputName3">Is_Active</label>
                 
                  <div class="form-group m-t-15">
                          <div class="radio-primary">
                            <input type="radio" name="is_active" value="yes">
                            <label>Yes</label>
                          </div>
                          <div class="radio-primary">
                            <input type="radio" name="is_active" value="no">
                            <label>No</label>
                          </div>
                    </div>
                    <div>
                      

                    </div>
             
                </div>
                
                <?php

if (isset($_POST["btn_sub"])) {
  
  $tt = $_POST["tittle"];
  $subcat = $_POST["subcat_id"];
  $price = $_POST["price"];
  $description = $_POST["description"];
  $video_url = $_POST["video_url"];
  $_radioSelect = $_POST["is_active"];

  
  $ext = pathinfo($_FILES["img1"]["name"], PATHINFO_EXTENSION);
  $imgname1 = time() . '.' . $ext;
  $uploadDirectory = "uploads/product_img/";

  $ext1 = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
  $imgname2 = time() . time() . '.' . $ext;
  $uploadDirectory = "uploads/product_img/";

  $ext2 = pathinfo($_FILES["img3"]["name"], PATHINFO_EXTENSION);
  $imgname3 = time() . time() . time() . '.' . $ext;
  $uploadDirectory = "uploads/product_img/";

  $sql = "select * from tbl_products where tittle = '$tt';";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $row = mysqli_num_rows($result);
  if ($row == 0) {
    move_uploaded_file($_FILES["img1"]["tmp_name"], $uploadDirectory . $imgname1);
    move_uploaded_file($_FILES["img2"]["tmp_name"], $uploadDirectory . $imgname2);
    move_uploaded_file($_FILES["img3"]["tmp_name"], $uploadDirectory . $imgname3);

    $sql = "insert into tbl_products(tittle, subcat_id, price, description, video_url, img1, img2, img3,is_active) values('$tt', '$subcat', '$price', '$description', '$video_url', '$imgname1', '$imgname2', '$imgname3','$_radioSelect');";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>
    echo "<script>
      window.location = 'product_view.php';
    </script>";
  <?php
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
              <button class="btn btn-primary" type="submit" name="btn_sub">Add Product</button>
              <button class="btn btn-secondary " type="reset">Clear</button>
            </div>
            </form>

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
  <script src="assets/jquery.validate.min.js"></script>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="assets/js/script.js"></script>
  <!-- login js-->
  <!-- Plugin used-->
</body>
<script>
  $(document).ready(function() {
    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please");

    jQuery.validator.addMethod("noSpace", function(value, element) {
  // Regular expression to check if the value has leading or trailing spaces
  var leadingTrailingSpaceRegex = /^\s+|\s+$/g;
  return !leadingTrailingSpaceRegex.test(value);
}, "No space please and don't leave it empty");

    $("#_frm").validate({
      rules: {
        tittle: {
          required: true,
          minlength:3,
          noSpace :true,

        },
        subcat_id: {
          required: true,
        },
        price: {
          required: true,
          minlength: 1,
          maxlength:5,
          noSpace :true,

        },
        description: {
          required: true,
          noSpace :true,
        },
        video_url: {
          required: true,
          noSpace :true,
        },
        img1: {
          required: true,
        },
        img2: {
          required: true,
        },
        img3: {
          required: true,
        }

      },
      messages: {
        tittle: {
          required: "Blank is not allowed.",
          minlength: "atleast 3 letter is required.",
          noSpace : "Space is not alloewd"

        },
        subcat_id: {
          required: "Blank is not allowed.",
        },
        price: {
          required: "Blank is not allowed.",
          minlength: "atleast 3 letter is required.",
          maxlength:"Only enter 5 digits",
          noSpace : "Space is not alloewd"

        },
        description: {
          required: "Blank is not allowed.",
          noSpace : "Space is not alloewd"

        },
        video_url: {
          required: "Blank is not allowed",
          noSpace : "Space is not alloewd"

        },
        img1: {
          required: "Please select Image",
        },
        img2: {
          required: "Please select Image",
        },
        img3: {
          required: "Please select Image",
        }
      }

    });

  });
</script>

</html>