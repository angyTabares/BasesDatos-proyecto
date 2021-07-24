<?php

include 'db.php';
$con = mysqli_connect($host,$user,$pass,$db);

$correo= $_POST['username'];
$password= $_POST['password'];

$Sql_Query= "SELECT * from empleado where correo= '$correo' and password= '$password'";
$result = $con->query($Sql_Query);

if(mysqli_num_rows($result)>0)
{
  while($row = $result->fetch_assoc()) {
    session_start();
    $_SESSION["userId"]=$row['cedula'];
    $_SESSION["nombreEmpleado"]=$row['nombre'];
 }
  header("Location: aplicacion.php");
}
else
{ 
    header("Location: login.php");
}

mysqli_close($con);

?>




