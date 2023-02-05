<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");

// $id = $_GET['id'];

// // $name=$_POST['name'];
// // $status=1;
// $select_data=mysqli_query($connect,"DELETE from category_details where id = '$id'");

//     // echo $select_data;
// echo "<script>alert('Record Deleted'); window.location.href = 'category_details.php';</script>";

  $id=$_POST['id'];
  $sql = "DELETE FROM `category_details` WHERE id=$id";
  if (mysqli_query($connect, $sql)) {
    echo json_encode(array("statusCode"=>200));
  } 
  else {
    echo json_encode(array("statusCode"=>201));
  }



?>
