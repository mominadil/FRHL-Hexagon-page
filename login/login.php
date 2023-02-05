<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Validation Form</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <style>
                        .form-box {
                            width: 360px;
                            margin: 35px auto 0 auto;
                        }
                        </style>
                        <div class="col-md-2   login_logo" style="margin:auto; margin-top: 50px; ">
                            <img src="../images/logo.png">
                        </div>
                        <style>
                        .card-header {
                            background-color: #21bfea !important;
                        }
                        </style>
                        <div class="card card-primary form-box">
                            <div class="card-header">
                                <h3 class="card-title">Login</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" method="post" action="login_action.php" onsubmit="return login();">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input name="username" class="form-control" id="username"
                                            placeholder="Enter username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="row justify-content-around">
                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="terms" class="custom-control-input"
                                                    id="exampleCheck1">
                                                <label class="custom-control-label" for="exampleCheck1">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <a style="text-align:right" href="#">Forget password</a>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <style>
                                    button.btn {
                                        width: 100%;
                                        background-color: #21bfea;
                                    }
                                    </style>
                                    <button type="submit" value="login" class="btn">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
        </section>
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
    <!-- jquery-validation -->
    <script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../plugins/jquery-validation/additional-methods.min.js"></script>

    <script>
    function login() {
        var username = $("#username").val();
        var pass = $("#password").val();
        if (username != "" && pass != "") {
            $.ajax({
                type: 'post',
                url: 'login_action.php',
                data: {
                    login: "login",
                    username: username,
                    password: pass
                },
                success: function(response) {
                    if (response == "success") {
                        alert("Thank you for login");
                        window.location.href = "../admin/index.php";
                    } else {
                        alert("Wrong Details");
                    }
                }
            });
        } else {
            alert("Please Fill All The Details");
        }

        return false;
    }
    </script>
</body>

</html>