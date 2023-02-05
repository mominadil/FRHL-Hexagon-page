<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(!isset($_SESSION["login"]))

    header("location:../login/login.php"); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lead details</title>
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
        $selected = "m_category";
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
                            <h1>Leads</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
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
                                    <h3 class="card-title">Add new category</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <!-- <form class="form-horizontal" method="post" action="m_category_add.php" enctype="multipart/form-data"> -->
                                    <form class="form-horizontal" id="fupForm"  enctype="multipart/form-data">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="m_category_name" class="form-control" id="file" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="content_type" class="col-sm-2">Content Type</label>
                                                <div class="custom-control custom-radio row col-sm-3">
                                                    <input class="custom-control-input" type="radio" id="customRadio2" checked name="type" value="0" required>
                                                    <label for="customRadio2" class="custom-control-label">Single - Parent/Year/All PDF's</label>
                                                </div>
                                                <div class="custom-control custom-radio row col-sm-3">
                                                    <input class="custom-control-input" type="radio" id="customRadio1" name="type" value="1" required>
                                                    <label for="customRadio1" class="custom-control-label">Double - Parent/Notice/Year/All PDF's</label>
                                                </div>
                                            </div>

                                        </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="submit" value="Add category" id="submit" name='create' class="btn btn-info" />
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


//         $(function(){
// $("#custom_content").hide(); // 1st hide the open end
// $("#tab-content").hide(); // 1st hide the open end
// $("#customRadio1").change(function(){ // on change event show and hide openend
//     if ($("#customRadio1").is(":checked"))
//     { 
//         $("#custom_content").show(); 
//         $("#tab-content").hide(); 
//         $('#tab-content:hidden').find('input').prop("required", false);
//     }
//     else
//     { 
//         $("#custom_content").hide(); 
//         $("#custom_content").val("") 
//     }
// });
// $("#customRadio2").change(function(){ // on change event show and hide openend
//     if ($("#customRadio2").is(":checked"))
//     { 
//         $("#tab-content").show(); 
//         $("#custom_content").hide(); 
//         $('#custom_content:hidden').find('input').prop("required", false);

//     }
//     else
//     { 
//         $("#tab-content").hide();
//     }
// });
// });

</script>
<script>
    $(document).ready(function(e){
        $("#tab-content").show();
        $('#custom_content:hidden').find('input').prop("required", false);
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'm_category_add.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
                // $('.statusMsg').html('');
                if(response.status == 1){
                    alert(response.message);
                    window.location.href = "m_category.php";
                }else{
                    alert(response.message);
                    
                }
                // console.log(response);
                // $('#fupForm').css("opacity","");
                // $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});
</script>
</body>

</html>