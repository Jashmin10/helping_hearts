<?php  
session_start();
if(!isset($_SESSION["isLogin"]))
{
echo "<script> window.location='index.php'; </script>";
}
?>