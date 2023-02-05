<?php
include "db_connection.php";
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");

$id = $_POST['id'];

$name=$_POST['name'];

$m_category_id=$_POST['category'];

$year_details_id=$_POST['year_details_id'];

$notice_id = $_POST['notice_id'];

$target_dir = "../doc/";
$target_file1 = $target_dir . basename($_FILES["pdf_file"]["name"]);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
$status=1;


if ($name != '' && $m_category_id !='' && $year_details_id !='') {

  if ($_FILES["pdf_file"]["name"] != '') {
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
        move_uploaded_file($_FILES["pdf_file"]["tmp_name"],$target_file1);

        $filename = basename($_FILES["pdf_file"]["name"]);



        // Pdf details Store
        if ($notice_id == '') {
          $single_sql = "UPDATE category_details SET year_details_id = '$year_details_id', m_category_id = '$m_category_id', notice_id = NULL, file_name = '$filename'  WHERE id= $id";

          $single_query = mysqli_query($connect, $single_sql);
          if ($single_query) {
            $response['message'] = 'Master category and details is Added successfully';
            $response['status'] = '1';
          } else {

            $response["message"] = "Please reupload the file";
          }


        } elseif ($notice_id != "") {
          $single_sql = "UPDATE category_details SET year_details_id = '$year_details_id', m_category_id = '$m_category_id', notice_id = '$notice_id', file_name = '$filename'  WHERE id= $id";
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

    
  } elseif ($_FILES["pdf_file"]["name"] == '') {
    if ($notice_id == '') {
      $single_sql = "UPDATE category_details SET year_details_id = '$year_details_id', m_category_id = '$m_category_id', notice_id = NULL WHERE id= $id";
      echo $single_sql;
      $single_query = mysqli_query($connect, $single_sql);
      if ($single_query) {
        $response['message'] = 'Master category and details is Added successfully';
        $response['status'] = '1';
      } else {

        $response["message"] = "Please reupload the file";
      }


    } elseif ($notice_id != "") {
      $single_sql = "UPDATE category_details SET year_details_id = '$year_details_id', m_category_id = '$m_category_id', notice_id = '$notice_id'  WHERE id= $id";
      $single_query = mysqli_query($connect, $single_sql);
          // echo $single_sql;

      if ($single_query) {
        $response['message'] = 'Master category and details is Added successfully';
        $response['status'] = '1';
      } else {

        $response["message"] = "Please reupload the file";
      }
    }
  }
  






} else {
  $response["message"] = "Please fill all the mandatory fields";
  
}

// if ($_FILES["file"]["tmp_name"] != ''){
//   $target_dir = "../doc/";
//   $target_file = $target_dir . basename($_FILES["file"]["name"]);
//   $uploadOK = 1;
//   $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//   if($imageFileType != "pdf"){
//    echo " invalid ectension";
//    $uploadOK = 0;
//  }
//  elseif ($uploadOK == 0){
//    echo "file not uploded";
//  }
//  if($uploadOK == 1){
//    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
//      // echo "the file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " uploaded <br>";
//      move_uploaded_file($_FILES['file']['tmp_name'],$target_file);

//      $filename = basename($_FILES["file"]["name"]);

//      $sql = "UPDATE category_details SET name = '$name', m_category_id = '$m_category_id', file_name = '$filename' WHERE id='$id' ";
//      mysqli_query($connect,$sql); 
//         // echo $sql;
//      echo "<script>alert('Record Updated');
//      window.location.href = 'category.php';</script>";
//                                 // header("location:category.php");
//    }

//  }

// } else {

//   $edit = mysqli_query($connect,"UPDATE category_details SET name = '$name', m_category_id = '$m_category_id' WHERE id='$id'");
//   echo "<script>alert('Record Updated');
//   window.location.href = 'category.php';</script>";
// }


    // echo $select_data;
// echo "<script>alert('Record Updated Succesfully'); window.location.href = 'category.php';</script>";



$response["post"] = $_POST;
$response["file"] = $_FILES;
// Return response
echo json_encode($response);




?>