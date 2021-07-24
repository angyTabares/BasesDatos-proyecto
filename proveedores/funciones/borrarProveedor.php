<?php

include 'db.php';
$con = mysqli_connect($host,$user,$pass,$db);

  if(isset($_GET['id']))
  {
      $id = $_GET['id'];
      $query ="DELETE FROM proveedor WHERE rut= '$id'";
      $result= $con->query($query);

      if(!$result)
      {
          die("Query Failed");
         
      }
      
      header("Location: ../vistas/vistaProveedores.php");
      
  }

?>