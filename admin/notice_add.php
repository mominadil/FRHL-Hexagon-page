<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");


// $id = $_POST['id'];

$name=$_POST['name'];

$m_category_id = $_POST['m_category_id'];

$status = 1;

if ($name != "" && $m_category_id != "") {
  
  $notice_query = "INSERT INTO notice (notice_name, m_category_id, status) VALUES ('$name', '$m_category_id', '$status')";
  $notice_query_insert = mysqli_query($connect, $notice_query);
  $response['status'] = '1';
  $response['message'] = 'Notice details is Added successfully';

} else {
  $response['message'] = 'Please fill all the fields';
}


// $edit = mysqli_query($connect,"update m_category set name='$name' where id='$id'");
    // echo $select_data;
// echo "<script>alert('Record Updated Succesfully'); window.location.href = 'm_category.php';</script>";



$response["post"] = $_POST;
// $response["file"] = $_FILES;
// Return response
echo json_encode($response);



?>