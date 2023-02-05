<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");



$year_name=$_POST['year_name'];
$m_category_id=$_POST['m_category_id'];
$notice_id=$_POST['notice_id'];


$status=1;


if ($year_name != "" && $m_category_id != "" ) {
  if ($notice_id != "") {
    $sql = "INSERT INTO year_details (year_details, m_category_id  , status, notice_id) VALUES ('$year_name', '$m_category_id','$status','$notice_id')";
    mysqli_query($connect, $sql);
    $response['message'] = 'Master category and details is Added successfully';
    $response['status'] = '1';
    

  } elseif ($notice_id == "") {
    $sql = "INSERT INTO year_details (year_details, m_category_id  , status, notice_id) VALUES ('$year_name', '$m_category_id','$status','0')";
    mysqli_query($connect, $sql);
    $response['message'] = 'Master category and details is Added successfully';
    $response['status'] = '1';
    
  }
} else {
  $response["message"] = "Please fill all the mandatory fields";
  
}



// $select_data=mysqli_query($connect,"INSERT INTO category (name, m_category_id, status, file_name) VALUES ('$name', '$m_category_id','$status','$filename')");

//     // echo $select_data;
// echo "<script>alert('Record added');
// window.location.href = 'category.php';</script>";


// if ($name != ''){
//   $target_dir = "../doc/";
//  $target_file = $target_dir . basename($_FILES["file"]["name"]);
//  $uploadOK = 1;
//  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//  if($imageFileType != "pdf"){
//    echo " invalid extension";
//    $uploadOK = 0;
//  }
//  elseif ($uploadOK == 0){
//    echo "file not uploded";
//  }
//  if($uploadOK == 1){
//    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
//      echo "the file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " uploaded <br>";
//      move_uploaded_file($_FILES['file']['tmp_name'],$target_file);

//      $filename = basename($_FILES["file"]["name"]);

//      $sql = "INSERT INTO category_details (name, m_category_id  , status, file_name) VALUES ('$name', '$m_category_id','$status','$filename')";
//                                 mysqli_query($connect,$sql); 
//         // echo $sql;
//      echo "<script>alert('Record added');
//      window.location.href = 'category.php';</script>";
//                                 // header("location:category.php");
//    }
//    else{
//      echo "sorry error while uploading";
//    }

//  }

// }

$response["post"] = $_POST;
$response["file"] = $_FILES;
// Return response
echo json_encode($response);


?>