<?php

include 'db.php';
$con = mysqli_connect($host,$user,$pass,$db);


if(isset($_POST['guardarEmpleado']))
{
    $correo= $_POST['correo'];
    $password= $_POST['password'];
    $cedula= $_POST['cedula'];
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $direccion= $_POST['direccion'];
    $codigoCargo= $_POST['cargo'];
    $bodega= $_POST['numBodega'];

    if($bodega=='seleccione')
    {
      $bodega=NULL;
    }

    $sql = "INSERT INTO empleado(cedula,nombre,apellido,direccion,correo,password,cargo_codigo,bodega_numero)
              VALUES ('$cedula','$nombre','$apellido','$direccion','$correo','$password','$codigoCargo'," . (isset($bodega) ? "'$bodega'" : "NULL") . ")";

    //almacenarlos
    if ($con->query($sql) === TRUE) {
        header("Location: ../../login.php");
     //   "<div class='alert alert-primary' role='alert'>Tarea ingresada correctamente </div>"
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }
      
}

mysqli_close($con);

?>