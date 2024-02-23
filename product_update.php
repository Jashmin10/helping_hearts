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
  <title>Product Update</title>
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
                <h3>Update Product</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Products</li>
                  <li class="breadcrumb-item active">Edit Products</li>
                </ol>
              </div>
              <div class="col-sm-6 text-end">
                <a href="product_view.php"><button class="btn btn-outline-primary btn-sm" type="button">Back</button></a>
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
                      
                    </div>
                    <div class="card-body">
                      <form class="theme-form" method="post" id="_frm" enctype="multipart/form-data">
                      <?php
                        if (isset($_GET["selectid"])) {
                          $id = $_GET["selectid"];
                          $sql = "select * from tbl_products where product_id = $id ;";
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                          while ($row = mysqli_fetch_assoc($result)) {
                            $tit = $row["tittle"];
                            $subcat = $row["subcat_id"];
                            $desc=$row["description"];
                            $image1= $row["img1"];
                            $image2=$row["img2"];
                            $image3=$row["img3"];
                            $sel =$row["subcat_id"];
                            $vu=$row["video_url"];
                            $price =$row["price"];
                            $_radioSelect = $row["is_active"];

                           // $myimg = $row["vol_img"];

                        ?>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Tittle</label>
                          <input class="form-control" name="tittle" type="text" placeholder="Enter Tittle" value="<?php echo $tit; ?>">
                        </div>
                        <div class="mb-3 row">
                                  <label class="col-sm-6 col-form-label" for="inputEmail3">Select Sub Category</label>
                                  <div class="col-sm-12">
                                    <select class="form-control" name="subcat_id">
                                      <?php
                                      $sql = "select * from tbl_subcategory;";
                                      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                      while ($row = mysqli_fetch_assoc($result)) {
                                        $nm = $row['name'];
                                        $subcat_id = $row['subcat_id'];
                                        $select = ($subcat_id==$sel)?"selected":"";
                                        echo "<option value=$subcat_id $select> $nm </option>";
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Price</label>
                          <input class="form-control" name="price" type="number" placeholder="Enter Price" value="<?php echo $price; ?>">
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Description</label>
                          <input class="form-control" name="description" type="text" placeholder="Enter Description" value="<?php echo $desc; ?>">
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Video Url</label>
                          <input class="form-control" name="video_url" type="text" placeholder="Enter Video Url" value="<?php echo $vu; ?>">
                        </div>
                        <div class="mb-3 ">
                                  <label class="col-sm-3 col-form-label" for="inputName3"> Image 1</label>
                                  <div class="col-sm-9">
                                    <input class="form-control"  type="file" name="img1"  id="img1"/>
                                    <br />
                                    <img src="<?php echo 'uploads/product_img/' . $image1; ?>" id="ig1" width="100" height="100" />
                                    <input type="hidden" name="oldimg1" value="<?php echo $image1; ?>">
                                  </div>
                                </div>

                                <div class="mb-3 ">
                                  <label class="col-sm-3 col-form-label" for="inputName3"> Image 2</label>
                                  <div class="col-sm-9">
                                    <input class="form-control"  type="file" name="img2"  id="img2"/>
                                    <br />
                                    <img src="<?php echo 'uploads/product_img/' . $image2; ?>" id="ig2" width="100" height="100" />
                                    <input type="hidden" name="oldimg2" value="<?php echo $image2; ?>">
                                  </div>
                                </div>

                                <div class="mb-3 ">
                                  <label class="col-sm-3 col-form-label" for="inputName3"> Image 3</label>
                                  <div class="col-sm-9">
                                    <input class="form-control"  type="file" name="img3"  id="img3"/>
                                    <br />
                                    <img src="<?php echo 'uploads/product_img/' . $image3; ?>" id="ig3" width="100" height="100" />
                                    <input type="hidden" name="oldimg3" value="<?php echo $image3; ?>">
                                  </div>
                                </div>
                                <div class="form-group m-t-15">
                        <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label" for="inputName3">Is_Active</label>
                          <?php
                        if($_radioSelect=="yes")
                        {
                          ?>
                          <div class="radio-primary">
                           
                           <input type="radio" name="is_active" value="yes" checked >
                           <label>Yes</label>
                         </div>
                         <div class="radio-primary">
                           <input type="radio" name="is_active" value="no"  >
                           <label>No</label>
                         </div>
                    <?php    }
                        else{
                          ?>
                          <div class="radio-primary">
                           
                           <input type="radio" name="is_active" value="yes"  >
                           <label>Yes</label>
                         </div>
                         <div class="radio-primary">
                           <input type="radio" name="is_active" value="no"  checked>
                           <label>No</label>
                         </div>
                     <?php   } ?>
                        </div>
                    </div>
                        <?php
                          ?>
                           <?php
                            }
                          }

                          if (isset($_POST["btn_update"]))
                           {
                            $tit = $_POST["tittle"];
                            $subcat = $_POST["subcat_id"];
                            $desc=$_POST["description"];
                            $old1= $_POST["oldimg1"];
                            $old2=$_POST["oldimg2"];
                            $old3=$_POST["oldimg3"];
                            $vu=$_POST["video_url"];
                            $price =$_POST["price"];
                            $newimg="";
                            $newimg2="";
                            $newimg3="";

                            if(empty($_FILES["img1"]["name"]))
                            {
                             
                                $newimg = $old1;
                              } 
                              else
                               {
                                $ext = pathinfo($_FILES["img1"]["name"], PATHINFO_EXTENSION);
                                $imgname = time() . '.' . $ext;
                                $uploadDirectory = "uploads/product_img/";
                                unlink($uploadDirectory . $old1);//delete
                                move_uploaded_file($_FILES["img1"]["tmp_name"], $uploadDirectory.$imgname);
                                $newimg = $imgname;
                               
                               }

                               if(empty($_FILES["img2"]["name"]))
                            {
                             
                                $newimg2 = $old2;
                              } 
                              else
                               {
                                $ext1 = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
                                $imgname2 = time() . time() . '.' . $ext;
                                $uploadDirectory = "uploads/product_img/";
                                unlink($uploadDirectory . $old2);//delete

                                move_uploaded_file($_FILES["img2"]["tmp_name"], $uploadDirectory.$imgname2);
                                $newimg2 = $imgname2;
                               }

                              if(empty($_FILES["img3"]["name"]))
                              {
                             
                                $newimg3 = $old3;
                              } 
                              else
                               {
                                $ext2 = pathinfo($_FILES["img3"]["name"], PATHINFO_EXTENSION);
                                $imgname3 = time() . time() . time() .'.' . $ext;
                                $uploadDirectory = "uploads/product_img/";
                                unlink($uploadDirectory . $old3);//delete
                               move_uploaded_file($_FILES["img3"]["tmp_name"], $uploadDirectory.$imgname3);

                                $newimg3 = $imgname3;
                              }
                              $sql = "update tbl_products set tittle='$tit',subcat_id='$subcat', description='$desc', price='$price',video_url='$vu', img1='$newimg',img2='$newimg2',img3='$newimg3' where product_id='$id'  ;";
                              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                              echo "<script> window.location='product_view.php'; </script>";
                           
                          }
                            ?>
                    </div>
                    <div class="card-footer">

                      <button type="submit" class="btn btn-primary" name="btn_update">Done</button>
                      <button class="btn btn-secondary" type="reset">Clear</button>
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
</body>


</html>