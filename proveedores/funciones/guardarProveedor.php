<?php

include 'db.php';
$con = mysqli_connect($host,$user,$pass,$db);


if(isset($_POST['guardarProveedor']))
{
    $rut = $_POST['rut'];
    $nombre=$_POST['nombreProveedor'];
    $email= $_POST['emailProveedor'];

    $sql = "INSERT INTO proveedor(rut,nombre,email)
              VALUES ('$rut','$nombre','$email')";

    //almacenarlos
    if ($con->query($sql) === TRUE) {
        header("Location: ../vistas/vistaProveedores.php");
     //   "<div class='alert alert-primary' role='alert'>Tarea ingresada correctamente </div>"
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
      
}

mysqli_close($con);

?>