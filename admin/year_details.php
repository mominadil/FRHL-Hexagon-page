<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(!isset($_SESSION["login"]))

  header("location:login/login.php"); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Year Details</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/font-awesome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
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
                            <h1>Year Details</h1>
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
            <style>
                .modal{
                    position: relative !important;
                    padding: 15px 20px !important;
                    max-width: 100% !important;
                    width: 40% !important;
                    overflow: auto !important;
                    height: 90% !important;
                }
                .blocker{
                    padding: 60px 0 5px  !important;
                    max-width: -webkit-fill-available !important;
                }
                .modal a.close-modal[class*="icon-"] {
                  top: -10px;
                  right: -10px;
                  width: 20px;
                  height: 20px;
                  color: #fff;
                  line-height: 1.25;
                  text-align: center;
                  text-decoration: none;
                  text-indent: 0;
                  background: #900;
                  border: 2px solid #fff;
                  -webkit-border-radius:  26px;
                  -moz-border-radius:     26px;
                  -o-border-radius:       26px;
                  -ms-border-radius:      26px;
                  -moz-box-shadow:    1px 1px 5px rgba(0,0,0,0.5);
                  -webkit-box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
                  box-shadow:         1px 1px 5px rgba(0,0,0,0.5);
              }
          </style>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-start align-items-center">
                                    <h3 class="card-title">Years details</h3>&nbsp;
                                    <a name="add_years" class="btn btn-info btn-sm" href="create_year_details.php">
                                        <i class="fas fa-plus"></i>&nbsp; Add Years
                                    </a>
                                    <a href="sort_year.php" rel="modal:open" class="btn btn-primary ml-2 btn-sm" name="reg_link">
                                        <i class="fa fa-arrows"></i>&nbsp; Sort Years
                                    </a> 
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Master Category</th>
                                                <th width="25%">Notice Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include "db_connection.php" ;
                                             $query = "SELECT * FROM year_details ORDER BY id ASC";
                                             $result = mysqli_query($connect, $query);
                                             if(mysqli_num_rows($result) > 0)
                                             {
                                                $i = 1;
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['year_details']; ?>
                                                </td>
                                                <?php
                                                $m_category_id = $row['m_category_id'];
                                                $query1 = "SELECT * FROM m_category WHERE id = $m_category_id";
                                                $result1 = mysqli_query($connect, $query1);
                                                if(mysqli_num_rows($result1) > 0)
                                                {
                                                    while($row1 = mysqli_fetch_assoc($result1))
                                                    {
                                                        ?>
                                                        <td><?php echo $row1['name']; ?></td>
                                                    <?php }
                                                }
                                                $notice_id  = $row['notice_id'];
                                                if ($notice_id > 0) {
                                                    $query1 = "SELECT * FROM notice WHERE id = $notice_id";
                                                    $result1 = mysqli_query($connect, $query1);
                                                    if (mysqli_num_rows($result1) > 0) {
                                                        while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                                            <td><?php echo $row1['notice_name']; ?></td>
                                                            <?php 
                                                        }
                                                    }
                                                } else {
                                                    echo "<td></td>";
                                                }
                                                ?>

                                                <td class="project-actions text-left">
                                                    <a name="update" class="btn btn-info btn-sm" href="update_year_details.php?id=<?php echo $row['id']; ?>">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    <a name="delete" data-id="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </a>
                                                    <?php if ($row['status']==0){ ?>
                                                    <!-- <a class="status"> href="m_category_status.php?id=<?php echo $row['id']; ?>&type=1">
                                                        <button type="button" class="btn btn-sm btn-primary">Active</button>
                                                    </a> -->
                                                    <a name="status" data-id="<?php echo $row['id']; ?>" data-type="1" class="status btn btn-sm btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                        Active
                                                    </a>    
                                                    <?php } elseif ($row['status']==1) { ?>
                                                    <!-- <a href="m_category_status.php?id=<?php echo $row['id']; ?>&type=0">
                                                        <button type="button" class="btn btn-sm btn-primary">Deactive</button>
                                                    </a> -->
                                                    <a name="status" data-id="<?php echo $row['id']; ?>" data-type="0" class="status btn btn-sm btn-primary">
                                                        <i class="fa fa-eye-slash"></i>
                                                        Deactive
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php $i++;
                                             }
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Master Category</th>
                                                <th>Notice Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
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
    <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
    
    <!-- Bootstra../p 4 -->
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
                ],
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,

            });
        });
    </script>
    <script>

        $(document).on("click", ".delete", function() {
            var r = confirm("Are you sure");
            if (r == true) {
                var $ele = $(this).parent().parent();
                $.ajax({
                    url: "year_details_delete.php",
                    type: "POST",
                    cache: false,
                    data: {
                        id: $(this).attr("data-id")
                    },
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            $ele.fadeOut(500).remove();
                            alert("Record deleted");
                            console.log(dataResult);
                        }
                    }
                });
            }
        });

        $(document).on("click", ".status", function() {
                // confirm("Press a button!");
                var $ele = $(this).parent().parent();
                $.ajax({
                    url: "year_details_status.php",
                    type: "POST",
                    cache: false,
                    data: {
                        type: $(this).attr("data-type"),
                        id: $(this).attr("data-id")
                    },
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            // $ele.fadeOut(500).remove();
                            // alert("Record active");
                            location.reload();
                        }
                    }
                });
            });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script>
        $("#custom-close").modal({
            closeClass: 'icon-remove',
            closeText: '!'
        });
    </script>
</body>

</html>