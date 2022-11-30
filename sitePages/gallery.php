<?php 
include("../includes/include-connection.php");
$user_id = $_COOKIE['User_id'];
$user_name = $_COOKIE['User_name'];

$sql = "SELECT * FROM images WHERE author_id = $user_id ";
	$result = $conn->query($sql);
	$row = $result->fetch_array();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../templatesStyles/gallery/bootstrap.min.css">
  <script src="../templatesStyles/gallery/bootstrap.bundle.min.js"></script>
  <title>Gallery</title>
</head>
<body>
  <!-- Page Content -->
<div class="container">

<h1 class="fw-light text-center text-lg-start mt-4 mb-0">Gallery of <?= $user_name ?></h1>

<hr class="mt-2 mb-5">

<div class="row text-center text-lg-start">
  <?php
  while($row != null){
  echo "<div class='col-lg-3 col-md-4 col-6'>";
  echo  "<a href='./modify.php?id_image=$row[id]' class='d-block mb-4 h-100'>";
  echo    "<img class='img-fluid img-thumbnail' src='../images/$row[file]' alt='aire'>";
  $row = $result->fetch_array();
  }
  ?>
    </a>
  </div>
</div>

</div>
</body>
</html>