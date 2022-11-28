<?php 
$conn = new mysqli('db', 'root', 'test', "GALLERY2");

/* comprobar la conexión */
if ($conn->connect_errno) {
    echo "<br>";
    printf("Falló la conexión: %s\n", $conn->connect_error);
    exit();
}
?>