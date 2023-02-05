<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");



$name=$_POST['name'];
$m_category_id=$_POST['m_category_id'];
$notice_id=$_POST['notice_id'];
$year_details_id=$_POST['year_details_id'];
$target_dir = "../doc/";
$target_file1 = $target_dir . basename($_FILES["pdf_file"]["name"]);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

$status=1;


if ($name != '' && $m_category_id !='' && $year_details_id !='') {

  if ($imageFileType != "pdf") {
    $response["message"] = "invalid extension";
    $uploadOK = 0;
  } elseif ($uploadOK == 0) {
    $response["message"] = "file not uploded";
  }
  if ($uploadOK == 1) {
    if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"],$target_file1)) {
      $response["message"] ="the file " .htmlspecialchars(basename($_FILES["pdf_file"]["name"])) ." uploaded";

      // echo "the file " .htmlspecialchars(basename($_FILES["pdf_file"]["name"])) ." uploaded";
      move_uploaded_file(
        $_FILES["pdf_file"]["tmp_name"],
        $target_file1
      );

      $filename = basename(
        $_FILES["pdf_file"]["name"]
      );



      // Pdf details Store
      if ($notice_id == '') {
        // code...
        $single_sql = "INSERT INTO category_details (name, m_category_id  , status, file_name, year_details_id) VALUES ('$name', '$m_category_id','$status','$filename', '$year_details_id')";

        $single_query = mysqli_query($connect, $single_sql);

        // echo $single_sql;

        if ($single_query) {
          $response['message'] = 'Master category and details is Added successfully';
          $response['status'] = '1';
        } else {

          $response["message"] = "Please reupload the file";
        }
        

      } elseif ($notice_id != "") {
        $single_sql = "INSERT INTO category_details (name, m_category_id  , status, file_name, notice_id, year_details_id) VALUES ('$name', '$m_category_id','$status','$filename', '$notice_id', '$year_details_id')";
        $single_query = mysqli_query($connect, $single_sql);
        // echo $single_sql;

        if ($single_query) {
          $response['message'] = 'Master category and details is Added successfully';
          $response['status'] = '1';
        } else {

          $response["message"] = "Please reupload the file";
        }
      }
      


      // $response["single_sql"] = $single_sql;

      $response['message'] = 'Master category and details is Added successfully';
      $response['status'] = '1';
    }
  }






} else {
  $response["message"] = "Please fill all the mandatory fields";
  
}










// // $select_data=mysqli_query($connect,"INSERT INTO category (name, m_category_id, status, file_name) VALUES ('$name', '$m_category_id','$status','$filename')");

// //     // echo $select_data;
// // echo "<script>alert('Record added');
// // window.location.href = 'category.php';</script>";


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