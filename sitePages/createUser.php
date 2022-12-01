<?php
include("../includes/include-connection.php");
$aux = false;
if (isset($_POST['btn-register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $sql = "INSERT INTO `authors` (`id`, `name`, `email`, `password`, `created`) VALUES (null, '$name', '$email', '$pass', CURRENT_TIMESTAMP)";
    if ($conn->query($sql)) {
        $aux = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registration Form</title>

    <!-- Icons font CSS-->
    <link href="../templatesStyles/createuser/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../templatesStyles/createuser/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../templatesStyles/createuser/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../templatesStyles/createuser/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../templatesStyles/createuser/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group-desc">
                                    <input class="input--style-5" type="text" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <button class="btn btn--radius-2 btn--red" type="submit" name="btn-register">Register</button>
                            <div class="division-margin">
                                <a class="txt2" href="login-auth.php">
                                    Login ?<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                                <span> &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <a class="txt2" href="../index.php">
                                    Gallery
                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                </a>
                             </div>
                        </div>
                        <div>
                            <?php
                            if (isset($_POST['btn-register'])) {
                                echo "<br>";
                                if ($aux) {
                                    echo "<div class='alert alert-success'>Se ha creado el usuario correctamente</div>";
                                } else {
                                    echo "<div class='alert alert-error'>Error al crear usuario</div>";
                                }
                            }
                            ?>
                        </div>
                        <div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="../templatesStyles/createuser/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../templatesStyles/createuser/vendor/select2/select2.min.js"></script>
    <script src="../templatesStyles/createuser/vendor/datepicker/moment.min.js"></script>
    <script src="../templatesStyles/createuser/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="../templatesStyles/createuser/js/global.js"></script>
    <?php include("../includes/footer.php");?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->