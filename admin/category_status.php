<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");

$id = $_POST['id'];
$type = $_POST['type'];

// $name=$_POST['name'];
// $status=1;


$sql = "Update category_details SET status = '$type' where id = '$id'";


// $select_data=mysqli_query($connect,);

    // echo $select_data;
// echo "<script>alert('status updated'); window.location.href = 'category.php';</script>";


  if (mysqli_query($connect, $sql)) {
    echo json_encode(array("statusCode"=>200));
  } 
  else {
    echo json_encode(array("statusCode"=>201));
  }


?>