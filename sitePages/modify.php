<?php
  include('../includes/include-connection.php');

  $idImage=isset($_GET['id_image'])?$_GET['id_image']:"";
  $sql="SELECT * FROM images WHERE id=$idImage";
  $result=$conn->query($sql);
  
  if(isset($_POST['btnModify']) || !empty($_FILES['file']['name'])){

    $id=$_POST['authors'];
    $name=$_POST['name'];
    $file=$_FILES['file']['name'];
    $size=$_FILES['file']['size'];
    $text=$_POST['text'];
    $enabled=isset($_POST['enabled'])?"1":"0";

    $sql="UPDATE images SET author_id=$id,name='$name',file='$file',size=$size,text='$text',enabled=$enabled WHERE id=$idImage";

    if (!$conn->query($sql)) {
      $error=true;
    }

  }

  if(isset($_POST['btnDelete']) && $idImage>0){

    $sql="DELETE FROM images WHERE id=$idImage";

    if (!$conn->query($sql)) {
      $error=true;
    }
    
  }
  
  if ($result) {
    $row=$result->fetch_array();

    //Guardar variables antiguas
    $idAuthor=$row['author_id'];
    $imgname=$row['name'];
    $imgfile=$row['file'];
    $imgtext=$row['text'];
    $imgdate=$row['created'];
    $checked = $row['enabled'] > 0 ? " checked " : "";

    //Guardar y buscar name del autor
    $sql="SELECT name FROM authors WHERE id=$idAuthor";
    $result=$conn->query($sql);
    $row=$result->fetch_array();
    $authorName=$row['name'];
  }else{
    $error=true;
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
  <?php
  if(isset($error)){
  echo "<div class='alert alert-error'>Se ha producido un error grave</div>";
  die();
  }
  ?>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Datos Imagen</h2>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                      <div>
                      <?php
                      if(isset($_POST['btnModify']) || !empty($_FILES['file']['name'])){
                        if (isset($error)) {
                          echo "<div class='alert alert-error'>Error en la modificación</div>";
                          $error=false;
                        }else{
                          echo "<div class='alert alert-success'>Modificado correctamente</div>";
                        }
                        echo "<br>";
                      }
                      if(isset($_POST['btnDelete']) && $idImage>0){
                        if (isset($error)) {
                          echo "<div class='alert alert-error'>Error al eliminar</div>";
                          $error=false;
                        }else{
                          echo "<div class='alert alert-success'>Eliminado correctamente</div>";
                        }
                        echo "<br>";
                      }
                      ?>
                      </div>
                        <div class="form-row">
                            <div class="name">Autor</div>
                            <div class="value">
                                <div class="input-group-desc">
                                    <select class="input--style-5" name="authors" id="authors">
                                      <?php
                                          echo "<option value='$idAuthor' selected>" . $authorName ."</option>";
                                          $sql="SELECT * FROM authors order by name";
                                          $result=$conn->query($sql);
                                          $row= $result->fetch_array();
                                          while($row != null){
                                            if($row[1]!=$authorName){
                                            echo "<option value='$row[0]'>" . $row[1] ."</option>";
                                            }
                                            $row= $result->fetch_array();
                                            
                                          }
                                      ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nombre</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name" value="<?=$imgname?>" >
                                    <input type="hidden" name="imgid" value="<?=$idImage?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Fichero</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="file" name="file" accept="image/*" ><?=$imgfile?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Texto</div>
                            <div class="value">
                                <div class="input-group">
                                  <textarea class="input--style-5" name="text" cols="43" rows="2"><?=$imgtext?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Activado</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="checkbox" name="enabled" <?=$checked?> >
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Fecha de modificación</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="date" readonly value="<?=$imgdate?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                          <div class="botones">
                              <button class="btn btn--radius-2 btn--green" type="submit" name="btnModify">Modificar</button>
                              <button class="btn btn--radius-2 btn--red" type="submit" name="btnDelete">Eliminar</button>
                          </div>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->