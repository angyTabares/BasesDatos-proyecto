<?php

include 'db.php';
$con = mysqli_connect($host,$user,$pass,$db);

  if(isset($_GET['id']))
  {
     // echo $_GET['cedula'];
      $id = $_GET['id'];
      $query ="DELETE FROM empleado WHERE cedula= '$id'";
      $result= $con->query($query);

      if(!$result)
      {
          die("Query Failed");
         
      }
      
      header("Location: ../vistas/vistaEmpleados.php");
      
  }

?>