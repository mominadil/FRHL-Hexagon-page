<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");

$id = $_POST['id'];

$name=$_POST['name'];

$edit = mysqli_query($connect,"update m_category set name='$name' where id='$id'");
    // echo $select_data;
echo "<script>alert('Record Updated Succesfully'); window.location.href = 'm_category.php';</script>";


?>