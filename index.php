<?php
include("./includes/include-connection.php"); 
  $sql = "SELECT * FROM images";
	$result = $conn->query($sql);
	$row = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Gallery</title>
  <link rel="stylesheet" href="./templatesStyles/gallery/bootstrap.min.css">
  <script src="./templatesStyles/gallery/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php include("./includes/navbar.php");?>
<!-- Gallery list -->
<div class="container">

<h1 class="fw-light text-center text-lg-start mt-4 mb-0">Main Gallery</h1>

<hr class="mt-2 mb-5">

  <div class="row text-center text-lg-start">
  <?php
    if (!$row) {
      ?>
      <div class="sinImagen">
        <br><br><br>
        <span>NO EXISTEN IMAGENES ASOCIADAS A LA BASE DE DATOS</span>
        <br><br><br>
        <span>INICIE SESIÓN PARA SUBIR NUEVAS IMÁGENES</span>

      </div>
      <?php
    }
    while($row!= null){ 
      echo   "<div class='col-lg-3 col-md-4 col-6'>";
      echo   "<img class='img-style img-fluid img-thumbnail' src='images/$row[file]' alt='$row[text]'>";
      echo   "</div>";
    $row = $result->fetch_array();
    }
    ?>
  </div>
</div>

</body>
<?php 
  include("./includes/footer.php");
?>
</html>