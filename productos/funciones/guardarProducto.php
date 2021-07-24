<?php

include 'db.php';
$con = mysqli_connect($host,$user,$pass,$db);


if(isset($_POST['guardarProducto']))
{
    $codigoP= $_POST['codigoP'];
    $nombreP= $_POST['nombreP'];
    $precioP= $_POST['precioP'];
    $marca= $_POST['marca'];
 
    $sql = "INSERT INTO producto(codigo,nombre,precio,marca_codigo)
              VALUES ('$codigoP','$nombreP','$precioP','$marca')";

    //almacenarlos
    if ($con->query($sql) === TRUE) {
        header("Location: ../vistas/vistaProductos.php");
     //   "<div class='alert alert-primary' role='alert'>Tarea ingresada correctamente </div>"
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
      
}

mysqli_close($con);

?>