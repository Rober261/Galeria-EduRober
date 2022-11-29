<?php
include("./includes/include-connection.php"); 
  $sql = "SELECT file FROM images";
	$result = $conn->query($sql);
	$row = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeria de prueba</title>
  <link rel="stylesheet" href="./templatesStyles/gallery/bootstrap.min.css">
  <script src="./templatesStyles/gallery/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php include("./includes/navbar.php");?>
<!-- Gallery list -->
<div class="container">

<h1 class="fw-light text-center text-lg-start mt-4 mb-0">Thumbnail Gallery</h1>

<hr class="mt-2 mb-5">

  <div class="row text-center text-lg-start">
    <?php 
    while($row!= null){ 
      echo   "<div class='col-lg-3 col-md-4 col-6'>";
      echo   "<img class='img-fluid img-thumbnail' src='images/$row[file]'>";
      echo   "</div>";
    $row = $result->fetch_array();
    }
    ?>
  </div>
</div>

</body>
</html>