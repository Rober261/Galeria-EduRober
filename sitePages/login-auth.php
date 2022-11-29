<?php
include("../includes/include-connection.php");
$aux=true;
if (isset($_POST['btn-login'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$sql = "SELECT * FROM authors WHERE email = '$email' and password= '$pass'";
	$result = $conn->query($sql);
	$row = $result->fetch_array();
	if ($row) {
		header('Location: ./gallery.php');
	} else {
		$aux = false;
	}
}
$aux = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../templatesStyles/login/form/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templatesStyles/login/form/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templatesStyles/login/form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templatesStyles/login/form/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templatesStyles/login/form/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templatesStyles/login/form/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templatesStyles/login/form/css/util.css">
	<link rel="stylesheet" type="text/css" href="../templatesStyles/login/form/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../templatesStyles/login/form/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn-login">
							Login
						</button>
					</div>
					<div>
						<?php
						if (isset($_POST['btn-login'])) {
							echo "<br>";
							if (!$aux) {
								echo "<div class='alert alert-error'>Credenciales incorrectas</div>";
							}
						}
						?>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="createUser.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
						<br>
						<a class="txt2" href="../index.php">
							Gallery
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="../templatesStyles/login/form/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../templatesStyles/login/form/vendor/bootstrap/js/popper.js"></script>
	<script src="../templatesStyles/login/form/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../templatesStyles/login/form/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../templatesStyles/login/form/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="../templatesStyles/login/form/js/main.js"></script>

</body>

</html>