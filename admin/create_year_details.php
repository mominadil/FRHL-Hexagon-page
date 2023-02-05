<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION["login"]))

  header("location:../login/login.php");
include "db_connection.php"; // Using database connection file here

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Year details</title>
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
        $selected = "year_details";
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
                                    <h3 class="card-title">Add Year details</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <!-- <form class="form-horizontal" id="myform" method="post" action="year_details_add.php" enctype="multipart/form-data"> -->
                                <form class="form-horizontal" id="fupForm"  enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Add image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file" class="form-control" id="file" style="border: none;">
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Year Details</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="year_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="m_category_id" class="col-sm-2 col-form-label">Select Master Category</label>
                                            <div class="col-sm-10">
                                                <select name="m_category_id" class=" form-control select2" style="width: 100%;" id="m_category_id">
                                                    </option>
                                                    <option value="" select="selected">--select--</option>

                                                    <?php
                                                    $sql=mysqli_query($connect, "SELECT * FROM m_category ");

                                                    if(mysqli_num_rows($sql)>0){
                                                        while($result = mysqli_fetch_array($sql)){
                                                            // print_r($result);

                                                            ?>
                                                    <option class='<?php echo $result['type']; ?> <?php echo $result['id']; ?>' value="<?php echo $result['id']; ?>">
                                                        <?php echo $result['name']; ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    }


                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="notice_id" class="col-sm-2 col-form-label">Select Notice</label>
                                            <div class="col-sm-10">
                                                <select name="notice_id" class=" form-control select2" style="width: 100%;" id="notice_id">
                                                    </option>
                                                    <option value="" select="selected">--select--</option>

                                                    <?php
                                                    $sql=mysqli_query($connect, "SELECT * FROM notice ");

                                                    if(mysqli_num_rows($sql)>0){
                                                        while($result = mysqli_fetch_array($sql)){
                                                            // print_r($result);

                                                            ?>
                                                    <option class="<?php echo $result['m_category_id']; ?>" value="<?php echo $result['id']; ?>">
                                                        <?php echo $result['notice_name']; ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    }


                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input type="hidden" value="<?php echo $id; ?>"  name='id'  /> -->
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="submit" value="Add year details" id="submit" name='create' class="btn btn-info" />
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
        $("#fupForm").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'year_details_add.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                // $('.statusMsg').html('');
                if(response.status == 1){
                    alert(response.message);
                    window.location.href = "year_details.php";
                }else{
                    alert(response.message);
                    
                }
                // console.log(response);
                // $('#fupForm').css("opacity","");
                // $(".submitBtn").removeAttr("disabled");
            }
        });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#m_category_id").change(function(){
                var service_id = $(this).find('option:selected').attr("class").split(' ')[1];

                // console.log(service_id);

                $("#notice_id option").each(function(){
                    var thisOptionValue=$(this).attr('class');

                    console.log(thisOptionValue);
                    if (service_id !== thisOptionValue) {

                        $($(this) ,"." + thisOptionValue).hide();
                        $($(this), "option:selected").prop("selected", false);

                    }
                    else {
                        $($(this) ,"." + thisOptionValue).show();
                        $($(this), "option:selected").prop("selected", true);

                    }
                });

            });
        });
    </script>
</body>

</html>