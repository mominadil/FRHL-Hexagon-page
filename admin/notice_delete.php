<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");

// $id = $_GET['id'];

// // $name=$_POST['name'];
// // $status=1;
// $select_data=mysqli_query($connect,"DELETE from m_category where id = '$id'");

//     // echo $select_data;
// echo "<script>alert('Record Deleted'); window.location.href = 'm_category.php';</script>";

  $id=$_POST['id'];
  $sql = "DELETE FROM `notice` WHERE id=$id";
  if (mysqli_query($connect, $sql)) {
    echo json_encode(array("statusCode"=>200));
  } 
  else {
    echo json_encode(array("statusCode"=>201));
  }



?>
