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
  <title>Article Update</title>
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
                <h3>Update Artical</h3>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item">Utilities</li>
                  <li class="breadcrumb-item active"> Add Artical</li>
                </ol>
              </div>
              <div class="col-sm-6 text-end">
                <a href="artical_view.php"><button class="btn btn-outline-primary btn-sm" type="button">Back</button></a>
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
                      <form method="post" id="_frm" enctype="multipart/form-data">
                      <?php
                        if (isset($_GET["selectid"])) {
                          $id = $_GET["selectid"];
                          $sql = "select * from tbl_article where article_id = $id ;";
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                          while ($row = mysqli_fetch_assoc($result)) {
                            $tit = $row["tittle"];
                            $desc=$row["description"];
                            $image1= $row["img1"];
                            $image2=$row["img2"];
                            $vu=$row["video_url"];
                            $rl =$row["ref_link"];
                            $_radioSelect = $row["is_active"];
                           // echo "radio : " .$_radioSelect 
                         

                        ?>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Tittle</label>
                          <input class="form-control" name="tittle" type="text" placeholder="Enter Tittle" value="<?php echo $tit; ?>">
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Description</label>
                          <input class="form-control" name="description" type="text" placeholder="Enter Description" value="<?php echo $desc; ?>">
                        </div>
                        <div class="mb-3 ">
                                  <label class="col-sm-3 col-form-label" for="inputName3"> Image 1</label>
                                  <div class="col-sm-9">
                                    <input class="form-control"  type="file" name="img1"  id="img1"/>
                                    <br />
                                    <img src="<?php echo 'uploads/artical_img/' . $image1; ?>" id="ig1" width="100" height="100" />
                                    <input type="hidden" name="oldimg1" value="<?php echo $image1; ?>">
                                  </div>
                                </div>

                                <div class="mb-3 ">
                                  <label class="col-sm-3 col-form-label" for="inputName3"> Image 2</label>
                                  <div class="col-sm-9">
                                    <input class="form-control"  type="file" name="img2"  id="img2"/>
                                    <br />
                                    <img src="<?php echo 'uploads/artical_img/' . $image2; ?>" id="ig2" width="100" height="100" />
                                    <input type="hidden" name="oldimg2" value="<?php echo $image2; ?>">
                                  </div>
                                </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Video Url</label>
                          <input class="form-control" name="video_url" type="text" placeholder="Enter Video Url" value="<?php echo $vu; ?>">
                        </div>
                        <div class="mb-3">
                          <label class="col-form-label pt-0" for="exampleInputState">Reference Link</label>
                          <input class="form-control" name="ref_link" type="text" placeholder="Enter Reference Link" value="<?php echo $rl; ?>">
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
                            $desc=$_POST["description"];
                            $oldimg1= $_POST["oldimg1"];
                            $oldimg2=$_POST["oldimg2"];
                            $vu=$_POST["video_url"];
                            $rl =$_POST["ref_link"];
                            $newimg="";
                            $newimg2="";

                            if(empty($_FILES["img1"]["name"]))
                            {
                             
                                $newimg = $oldimg1;
                              } 
                              else
                               {
                                $ext = pathinfo($_FILES["img1"]["name"], PATHINFO_EXTENSION);
                                $imgname = time() . '.' . $ext;
                                $uploadDirectory = "uploads/artical_img/";
                                unlink($uploadDirectory . $oldimg1);//delete
                                move_uploaded_file($_FILES["img1"]["tmp_name"], $uploadDirectory.$imgname);
                                $newimg = $imgname;
                              }

                              if(empty($_FILES["img2"]["name"]))
                            {
                             
                                $newimg2 = $oldimg2;
                              } 
                              else
                               {
                                $ext = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
                                $imgname2 = time() . time() . '.' . $ext;
                                $uploadDirectory = "uploads/artical_img/";
                                unlink($uploadDirectory . $oldimg2);//delete
                                move_uploaded_file($_FILES["img2"]["tmp_name"], $uploadDirectory.$imgname2);
                                $newimg2 = $imgname2;
                              }
                              $sql = "update tbl_article set tittle='$tit', description='$desc', img1='$newimg', img2='$newimg2', video_url='$vu', ref_link='$rl' where article_id='$id'  ;";
                              $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                              echo "<script> window.location='artical_view.php'; </script>";
                           
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
      jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");      

      $("#_frm").validate({
        rules: {
          tittle: {
            required: true,
            minlength: 3,
            noSpace :true,

          },
          description:{
            required: true,
            minlength: 3,
           

          },
          img1:{
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
          },
          img2:{
            required: true,
            extension: "jpg|jpeg|png|ico|bmp"
          },
          video_url:{
            required: true,
            minlength: 3,
          },
          ref_link:{
            required: true,
            minlength: 3,
          }
        },
        messages: {
          tittle: {
            required: "Blank is not allowed.",
            minlength: "atleast 3 letter is required.",
            noSpace : "Space is not alloewd"

          },
          description: {
            required: "Blank is not allowed.",
            minlength: "atleast 3 letter is required.", 
            

          },
          img1:{
            required: "Please upload file.",
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
          },
          img2:{
            required: "Please upload file.",
            extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp)."
          },
          video_url: {
            required: "Blank is not allowed.",
            minlength: "atleast 3 letter is required.", 
          },
          ref_link: {
            required: "Blank is not allowed.",
            minlength: "atleast 3 letter is required.", 
          },
        }

      });

    });
  </script>
</body>


</html>