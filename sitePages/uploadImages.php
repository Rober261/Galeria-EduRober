<?php
include('../includes/include-connection.php');

$error = false;
$types = ["image/jpeg", "image/jpg", "image/jpeg", "image/png", "image/gif"];

if (isset($_POST['btnUpload'])) {

  $authorId = $_POST['authors'];
  $nameImg = $_POST['name'];
  $text = $_POST['text'];
  $enabled = isset($_POST['enabled']) ? "1" : "0";

  if (in_array($_FILES['file']['type'], $types)) {

    move_uploaded_file($_FILES['file']['tmp_name'], "../images/" . $_FILES['file']['name']);
    $imgUrl = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $sql = "INSERT INTO images (author_id, name, file, size, text, enabled) VALUES($authorId, '$nameImg', '$imgUrl', $size, '$text', $enabled)";
    $result = $conn->query($sql);

    if (!$result) {
      $error = true;
    }
  } else {
    $error = true;
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
          <h2 class="title">New Image</h2>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div>
              <?php
              if (isset($_POST['btnUpload'])) {
                if ($error) {
                  echo "<div class='alert alert-error'>File Type Not Allowed</div>";
                } else {
                  echo "<div class='alert alert-success'>Successfully Uploaded</div>";
                }
                echo "<br>";
              }
              ?>
            </div>
            <div class="form-row">
              <div class="name">Author</div>
              <div class="value">
                <div class="input-group-desc">
                  <select class="input--style-5" name="authors" id="authors" required>
                    <option disabled selected>Select User</option>
                    <?php
                    $sql = "SELECT * FROM authors order by name";
                    $result = $conn->query($sql);
                    $row = $result->fetch_array();
                    while ($row != null) {
                      echo "<option value='$row[0]'>" . $row[1] . "</option>";
                      $row = $result->fetch_array();
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="name">Name</div>
              <div class="value">
                <div class="input-group">
                  <input class="input--style-5" type="text" name="name" required>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="name">File</div>
              <div class="value">
                <div class="input-group">
                  <input class="input--style-5" type="file" name="file" accept="image/*" required>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="name">Text</div>
              <div class="value">
                <div class="input-group">
                  <textarea class="input--style-5" name="text" cols="43" rows="2"></textarea>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="name">Enable</div>
              <div class="value">
                <div class="input-group">
                  <input class="input--style-5" type="checkbox" name="enabled">
                </div>
              </div>
            </div>

            <div>
              <button class="btn btn--radius-2 btn--red" type="submit" name="btnUpload">Upload</button>
              <a class="txt2 margin-a-upload" href="./gallery.php">
                Go Back<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
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
<?php
include("../includes/footer.php");
?>

</html>
<!-- end document-->