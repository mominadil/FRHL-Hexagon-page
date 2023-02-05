<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["login"]))

    header("location:../login/login.php");
$id = $_GET['id'];
include "db_connection.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($connect, "select * from category_details where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data


// print_r($data);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category details</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/font-awesome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        $menu_open = "menu-open";
        $selected = "category";
        $current_id = "active";
        include "sidebar.php"
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1>Leads</h1> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Category Form</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- full column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                            </div>
                            <!-- /.card -->
                            <!-- Horizontal Form -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Update category</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <!-- <form class="form-horizontal" id="myform" method="post" action="category_update.php" enctype="multipart/form-data"> -->
                                <form class="form-horizontal" id="fupForm"  enctype="multipart/form-data">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" value="<?php echo $data['name'] ?>" class="form-control" id="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <!-- master selection -->
                                            <label for="name" class="col-sm-2 col-form-label">Master Category Name</label>
                                            <div class="col-sm-10">
                                                <select name="category" id="m_category_id" class="form-control select2" style="width: 100%;">

                                                    <?php
                                                    $sql1 = mysqli_query($connect, "SELECT m_category.*,category_details.* FROM m_category INNER JOIN category_details ON m_category.id = category_details.m_category_id where category_details.id = $id");
                                                    if (mysqli_num_rows($sql1) > 0) {
                                                        while ($result1 = mysqli_fetch_array($sql1)) {
                                                            // print_r($result1);
                                                    ?>
                                                            <option class="<?php echo $result1['0']; ?>" select="selected" value="<?php echo $result1['0']; ?>">
                                                                <?php echo $result1['1']; ?>
                                                            </option>
                                                            </option>
                                                            <?php
                                                            $sql = mysqli_query($connect, "SELECT * FROM m_category");

                                                            if (mysqli_num_rows($sql) > 0) {
                                                                while ($result = mysqli_fetch_array($sql)) {
                                                            ?>
                                                                    <option class="<?php echo $result['id']; ?>" <?php if ($result1['0'] == $result['id'])  echo "disabled";  ?> value="<?php echo $result['id']; ?>">
                                                                        <?php echo $result['name']; ?>
                                                                    </option>
                                                            <?php
                                                                }
                                                            }


                                                            ?>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- notice selection -->
                                        <!--  -->
                                        <div class="form-group row">
                                            <label for="notice_id" class="col-sm-2 col-form-label">Select Notice</label>
                                            <div class="col-sm-10">

                                            <select name="notice_id" class="form-control select2" style="width: 100%;" id="notice_id">
                                                <?php
                                                if ($data['notice_id'] == '') { ?>
                                                    <option value="">--select--</option>

                                                    <?php $sql=mysqli_query($connect, "SELECT * FROM notice");

                                                    if(mysqli_num_rows($sql)>0){
                                                        while($notice_result = mysqli_fetch_array($sql)){
                                                            // print_r($notice_result);

                                                            ?>
                                                    <option class="<?php echo $notice_result['m_category_id']; ?>" value="<?php echo $notice_result['id']; ?>">
                                                        <?php echo $notice_result['notice_name']; ?>
                                                    </option>
                                                    <?php 
                                                        }
                                                    }

                                                } elseif ($data['notice_id'] != '') { ?>
                                                    <option value="">--select--</option>


                                                    <?php $notice_query= "SELECT * FROM notice INNER JOIN category_details ON notice.id = category_details.notice_id where category_details.id = $id";
                                                    // echo $notice_query;
                                                    $notice_sql1 = mysqli_query($connect,$notice_query);


                                                    if(mysqli_num_rows($notice_sql1)>0){
                                                        while($notice_result1 = mysqli_fetch_array($notice_sql1)){ 
                                                            // print_r($notice_result1);
                                                            ?>
                                                            <option  selected value="<?php echo $notice_result1['0']; ?>">
                                                                <?php echo $notice_result1['1']; ?>
                                                            </option>
                                                            <?php
                                                            $notice_sql=mysqli_query($connect, "SELECT * FROM notice");

                                                            if(mysqli_num_rows($notice_sql)>0){
                                                                while($notice_result = mysqli_fetch_array($notice_sql)){
                                                                    print_r($notice_result);

                                                                    ?>
                                                                    <option class="<?php echo $notice_result['m_category_id']; ?>" <?php if($notice_result1['0'] == $notice_result['id'])  echo "disabled";  ?> value="<?php echo $notice_result['id']; ?>">
                                                                        <?php echo $notice_result['notice_name']; ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            }


                                                            ?>
                                                            <?php
                                                        } 
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Year Name/Details</label>
                                            <div class="col-sm-10">
                                                <select name="year_details_id" id="year_details_id" class="form-control select2" style="width: 100%;">
                                                    <option value=""></option>

                                                    <?php
                                                    $year_details_query1= "SELECT * FROM year_details INNER JOIN category_details ON year_details.id = category_details.year_details_id where category_details.id = $id";
                                                    // echo $year_details_query1;
                                                    $year_details_sql1 = mysqli_query($connect, $year_details_query1);
                                                    if (mysqli_num_rows($year_details_sql1) > 0) {
                                                        while ($year_details_result1 = mysqli_fetch_array($year_details_sql1)) {
                                                            print_r($year_details_result1['0']);
                                                            ?>
                                                            <option selected value="<?php echo $year_details_result1['0']; ?>">
                                                                <?php echo $year_details_result1['1']; ?>
                                                            </option>
                                                            
                                                </option>
                                                <?php
                                                $year_details_sql = mysqli_query($connect, "SELECT * FROM year_details" );

                                                if (mysqli_num_rows($year_details_sql) > 0) {
                                                    while ($year_details_result = mysqli_fetch_array($year_details_sql)) {
                                                            // print_r($year_details_result);
                                                        ?>
                                                        <option class="<?php echo $year_details_result['m_category_id']; ?>" <?php if($year_details_result1['0'] == $year_details_result['id'])  echo "disabled";  ?>  value="<?php echo $year_details_result['id']; ?>">
                                                            <?php echo $year_details_result['year_details']; ?>
                                                        </option>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Add Pdf Name/details</label>
                                            <div class="col-sm-10">
                                                <input type="file" accept="application/pdf" name="pdf_file" class="form-control" id="file" style="border: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="form-check">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <input type="hidden" value="<?php echo $id; ?>" name='id' />
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" value="Update category" id="submit" name='create' class="btn btn-info" />
                            </div>
                            <!-- /.card-footer -->
                            <div id="res" class="res"></div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "footer.php" ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->
    <!-- Page specific script -->
    <script>
        $("#fupForm").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'category_update.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    // $('.statusMsg').html('');
                    if (response.status == 1) {
                        alert(response.message);
                        window.location.href = "category.php";
                    } else {
                        alert(response.message);

                    }
                    console.log(response);
                    // $('#fupForm').css("opacity","");
                    // $(".submitBtn").removeAttr("disabled");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#m_category_id").change(function(){
                var service_id = $(this).find('option:selected').attr("class");

                // console.log(service_id);

                $("#notice_id option").each(function(){
                    var thisOptionValue=$(this).attr('class');

                    // console.log(thisOptionValue);
                    if (service_id !== thisOptionValue) {

                        $($(this) ,"." + thisOptionValue).hide();
                        $($(this), "option:selected").prop("selected", false);

                    }
                    else {
                        $($(this) ,"." + thisOptionValue).show();
                        $($(this), "option:selected").prop("selected", true);
                        $($(this), "option:selected").prop("disabled", false);

                    }
                });

            });


            $("#m_category_id").change(function(){
                var service_id = $(this).find('option:selected').attr("class");

                // console.log(service_id);

                $("#year_details_id option").each(function(){
                    var thisOptionValue=$(this).attr('class');

                    // console.log(thisOptionValue);
                    if (service_id !== thisOptionValue) {

                        $($(this) ,"." + thisOptionValue).hide();
                        $($(this), "option:selected").prop("selected", false);

                    }
                    else {
                        $($(this) ,"." + thisOptionValue).show();
                        $($(this), "option:selected").prop("selected", true);
                        $($(this), "option:selected").prop("disabled", false);

                    }
                });

            });
        });
    </script>
    </script>
</body>

</html>