<?php

include 'db.php';
$con = mysqli_connect($host,$user,$pass,$db);


if(isset($_POST['guardarTienda']))
{
    $rut= $_POST['rutT'];
    $nombre= $_POST['nombreT'];
    $direcccion= $_POST['direccion'];
    $municipio= $_POST['municipio'];
 
    $sql = "INSERT INTO tienda(rut,nombre,direccion,municipio_codigo)
              VALUES ('$rut','$nombre','$direcccion','$municipio')";

    //almacenarlos
    if ($con->query($sql) === TRUE) {
        header("Location: ../vistas/vistaTiendas.php");
     //   "<div class='alert alert-primary' role='alert'>Tarea ingresada correctamente </div>"
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
      
}

mysqli_close($con);

?>