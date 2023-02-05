<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");


$id = $_POST['id'];
$year_name = $_POST['year_name'];
$notice_id = $_POST['notice_id'];
$m_category_id = $_POST['m_category_id'];


if ($m_category_id != '' && $year_name != '' && $id != '') {
    
  if ($notice_id != "") {
    $sql = "UPDATE year_details SET year_details='$year_name', m_category_id = '$m_category_id', notice_id = '$notice_id'  WHERE id= $id";
    $sql1 = "UPDATE m_category SET type ='1' WHERE id= $m_category_id";

    // $sql = "INSERT INTO year_details (year_details, m_category_id  , status, notice_id) VALUES ('$year_name', '$m_category_id','$status','$notice_id')";
    mysqli_query($connect, $sql);
    mysqli_query($connect, $sql1);
    $response['message'] = 'Year details Update successfully';
    $response['status'] = '1';
    

  } elseif ($notice_id == "") {

    $sql = "UPDATE year_details SET year_details='$year_name', m_category_id = '$m_category_id', notice_id = '0'  WHERE id= $id";
    $sql1 = "UPDATE m_category SET type ='0' WHERE id= $m_category_id";

    // $sql = "INSERT INTO year_details (year_details, m_category_id  , status, notice_id) VALUES ('$year_name', '$m_category_id','$status','0')";
    mysqli_query($connect, $sql);
    mysqli_query($connect, $sql1);
    $response['message'] = 'Year details Update successfully';

    $response['status'] = '1';
    
  }




} else {
  $response["message"] = "Please fill all the mandatory fields";
}



// $name=$_POST['name'];
// 
// $m_category_id = $_POST['m_category_id'];



// if ($name != "" && $m_category_id != "") {
  
//   $notice_query = "UPDATE notice set notice_name='$name', m_category_id = '$m_category_id' where id='$id'";
//   $notice_query_insert = mysqli_query($connect, $notice_query);
//   $response['status'] = '1';
//   $response['message'] = 'Notice details is updated successfully';

// } else {
//   $response['message'] = 'Please fill all the fields';
// }


// $edit = mysqli_query($connect,"update m_category set name='$name' where id='$id'");
    // echo $select_data;
// echo "<script>alert('Record Updated Succesfully'); window.location.href = 'm_category.php';</script>";



// $response["post"] = $_POST;
// $response["file"] = $_FILES;
// Return response
echo json_encode($response);


?>