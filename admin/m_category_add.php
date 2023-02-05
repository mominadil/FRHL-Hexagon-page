<?php
include "db_connection.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location:../login/login.php");
}

$allowTypes = ["pdf"];

$m_category_name = $_POST["m_category_name"];
$type = $_POST["type"];
// $single_pdf_name = $_POST["single_pdf_name"];
// $single_year_name = $_POST["single_year_name"];
// $double_notice_name = $_POST["double_notice_name"];
// $double_year_name = $_POST["double_year_name"];
// $double_pdf_name = $_POST["double_pdf_name"];
$status = 1;
// $target_dir = "../doc/";
// $target_file = $target_dir . basename($_FILES["single_year_pdf"]["name"]);
// $target_file1 = $target_dir . basename($_FILES["double_year_pdf"]["name"]);
// $uploadOK = 1;
// $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

if (isset($_POST["type"])) {
    if ($m_category_name != "" && $type != "") {
        // if ($type == 0) {
        //     if ($single_pdf_name != "" && $single_year_name != "") {
        //         // $response['tnsert'] = "INSERT";
        //         if ($imageFileType != "pdf") {
        //             $response["message"] = "invalid extension";
        //             $uploadOK = 0;
        //         } elseif ($uploadOK == 0) {
        //             $response["message"] = "file not uploded";
        //         }
        //         if ($uploadOK == 1) {
        //             if (move_uploaded_file($_FILES["single_year_pdf"]["tmp_name"],$target_file)) {
        //                 $response["message"] ="the file " .htmlspecialchars(basename($_FILES["single_year_pdf"]["name"])) ." uploaded";

        //                 // echo "the file " .htmlspecialchars(basename($_FILES["single_year_pdf"]["name"])) ." uploaded";
        //                 move_uploaded_file(
        //                     $_FILES["single_year_pdf"]["tmp_name"],
        //                     $target_file
        //                 );

        //                 $filename = basename(
        //                     $_FILES["single_year_pdf"]["name"]
        //                 );

        //                 // master category Store

        //                 $m_query = "INSERT INTO m_category (name, type, status) VALUES ('$m_category_name', '$type', '$status')";
        //                 $m_query_insert = mysqli_query($connect, $m_query);

        //                 $m_last_id = mysqli_insert_id($connect);

        //                 // year details Store


        //                 $year_details_query = "INSERT INTO year_details (year_details, notice_id, m_category_id, status) VALUES ('$single_year_name', '0', '$m_last_id', '$status')";

        //                 $year_detail_query_insert = mysqli_query($connect, $year_details_query);

        //                 $year_details_last_id = mysqli_insert_id($connect);

        //                 // Pdf details Store

        //                 $single_sql = "INSERT INTO category_details (name, m_category_id , status, file_name, year_details_id) VALUES ('$single_pdf_name', '$m_last_id','$status','$filename', '$year_details_last_id')";

        //                 mysqli_query($connect, $single_sql);

        //                 // $response["single_sql"] = $single_sql;

        //                 $response['message'] = 'Master category and details is Added successfully';
        //                 $response['status'] = '1';
        //             }
        //         }
        //     } else {
        //         $response["message"] = "Please fill all the mandatory fields";
        //     }
        // } elseif ($type == 1) {
        //     if (
        //         $double_notice_name != "" &&
        //         $double_year_name != "" &&
        //         $double_pdf_name != ""
        //     ) {
        //         if ($imageFileType1 != "pdf") {
        //             $response["message"] = "invalid extension";
        //             $uploadOK = 0;
        //         } elseif ($uploadOK == 0) {
        //             $response["message"] = "file not uploded";
        //         }
        //         if ($uploadOK == 1) {
        //             if (move_uploaded_file($_FILES["double_year_pdf"]["tmp_name"],$target_file1)) {
        //                 $response["message"] =
        //                     "the file " .
        //                     htmlspecialchars(
        //                         basename($_FILES["double_year_pdf"]["name"])
        //                     ) .
        //                     " uploaded";

        //                 // echo "the file " .htmlspecialchars(basename($_FILES["double_year_pdf"]["name"])) ." uploaded";
        //                 move_uploaded_file(
        //                     $_FILES["double_year_pdf"]["tmp_name"],
        //                     $target_file
        //                 );

        //                 $filename = basename(
        //                     $_FILES["double_year_pdf"]["name"]
        //                 );


        //                 // master category Store

        //                 $m_query = "INSERT INTO m_category (name, type, status) VALUES ('$m_category_name', '$type', '$status')";
        //                 $m_query_insert = mysqli_query($connect, $m_query);

        //                 // echo $m_query_insert;

        //                 // $response["m_query_insert"] = $m_query;
        //                 $m_last_id = mysqli_insert_id($connect);

        //                 // notice add store

        //                 $notice_query = "INSERT INTO notice (notice_name, m_category_id, status) VALUES ('$double_notice_name', '$m_last_id', '$status')";
        //                 $m_query_insert = mysqli_query($connect, $notice_query);

        //                 $notice_last_id = mysqli_insert_id($connect);


        //                 // year details Store


        //                 $year_details_query = "INSERT INTO year_details (year_details, notice_id, m_category_id, status) VALUES ('$double_year_name', '$notice_last_id', '$m_last_id', '$status')";

        //                 $year_detail_query_insert = mysqli_query($connect, $year_details_query);

        //                 $year_details_last_id = mysqli_insert_id($connect);


        //                 // Pdf details Store


        //                 $single_sql = "INSERT INTO category_details (name, m_category_id  , status, file_name, notice_id) VALUES ('$double_pdf_name', '$m_last_id','$status','$filename', '$notice_last_id')";

        //                 mysqli_query($connect, $single_sql);

        //                 // $response["single_sql"] = $single_sql;
        //                 $response['message'] = 'Master category and details is Added successfully';
        //                 $response['status'] = '1';
        //             } else {

        //                 $response["message"] = "Please reupload the file";
        //             }
        //         }
        //     } else {
        //         $response["message"] = "Please fill all the mandatory fields";
        //     }
        // }
        $m_query = "INSERT INTO m_category (name, type, status) VALUES ('$m_category_name', '$type', '$status')";
        $m_query_insert = mysqli_query($connect, $m_query);
        $m_last_id = mysqli_insert_id($connect);
        $response['message'] = 'Master category and details is Added successfully';
        $response['status'] = '1';
    } else {
        // code...
        $response["m_category_name"] = $m_category_name;
        $response["type"] = $type;
        $response["message"] = "Please fill all the mandatory fields";
    }
} else {
    $response["message"] = "Sorry, there was an error uploading your file.";
}

$response["post"] = $_POST;
$response["file"] = $_FILES;
// Return response
echo json_encode($response);
