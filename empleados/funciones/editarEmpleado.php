<?php
  
  include 'db.php';
  $con = mysqli_connect($host,$user,$pass,$db);

  if(isset($_GET['id']))
  {
      $id= $_GET['id'];
      $query = "SELECT * FROM empleado WHERE cedula= '$id' ";
      $result =$con->query($query);

      //si almenos tengo un resultado
      if(mysqli_num_rows($result)>0)
     {
       $row = mysqli_fetch_array($result);
       
       $cedula=$row['cedula'];
       $nombre=$row['nombre'];
       $apellido= $row['apellido'];
       $direccion= $row['direccion'];
       $correo= $row['correo'];
       $password=$row['password'];
       $cargo_codigo=$row['cargo_codigo'];
       $bodega_numero=$row['bodega_numero'];
       
     }
    
  }

  if(isset($_POST['editarEmpleado']))
  {
      $id= $_GET['id'];
      $cedula =$_POST['cedula'];
      $nombre=$_POST['nombre'];
      $apellido= $_POST['apellido'];
      $direccion= $_POST['direccion'];
      $correo= $_POST['correo'];
      $password=$_POST['password'];
      $cargo_codigo=$_POST['codigoCargo'];
      $bodega_numero=$_POST['numBodega'];

      if($bodega_numero=='seleccione')
      {
        $bodega_numero=NULL;
      }

      $query = "UPDATE empleado set cedula = '$cedula', nombre = '$nombre', apellido = '$apellido',
                direccion = '$direccion', correo= '$correo', password='$password', cargo_codigo= '$cargo_codigo',
                bodega_numero = " . (isset($bodega_numero) ? "'$bodega_numero'" : "NULL") . "
                 WHERE cedula = '$id'";

      mysqli_query($con, $query);

      header("Location: ../vistas/vistaEmpleados.php");
      
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../form.css">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg  nav fixed-top">
    <div class="container">
      <a class="navbar-brand logoNav" href="../../aplicacion.php">
        <img src="../../imagenes/logoNoBg.svg" alt="" class="logo d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../aplicacion.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../reportes/vistas/reportes.php">Reportes</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>





<div class="container registro" >
  <h2>Editar Empleado</h2>
<form id="registEmpleado-form" class="form" action="editarEmpleado.php?id=<?php echo $_GET['id'];?>" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4" >Correo</label>
      <input type="email" name="correo" value="<?php echo $correo; ?>" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" >Contraseña</label>
      <input type="password" name="password" value="<?php echo $password;?>" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputCity" >Cedula</label>
      <input type="text" name="cedula" value="<?php echo $cedula; ?>" class="form-control" id="inputCity">
    </div>

    <div class="form-group col-md-4">
      <label for="inputCity" >Nombre</label>
      <input type="text" name="nombre" value="<?php echo $nombre ;?>" class="form-control" id="inputCity">
    </div>
 
    <div class="form-group col-md-6">
      <label for="inputCity" >Apellido</label>
      <input type="text" name="apellido" value="<?php echo $apellido; ?>" class="form-control" id="inputCity">
    </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputCity" >Dirección</label>
      <input type="text" name="direccion" value="<?php echo $direccion;?>" class="form-control" id="inputCity">
    </div>
    
    <input type="hidden" id="cargoOculto" name="codigoCargo">


    <div class="form-group col-md-3">
      <label for="inputState" >Cargo</label>
      <select id="inputCargo" name="cargo" value="<?php $cargo_codigo; ?>" class="form-control">
      <option >Seleccione</option>
        <?php 
                   $query = "SELECT * FROM cargo";
                   $result_cargo = mysqli_query($con, $query);
                   
                    while($row = mysqli_fetch_array($result_cargo)) { ?>
                           
                           <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre'] ?></option>
                           
                   <?php } ?>

      </select>
    </div>
 
    <div class="form-group col-md-3" id="divBodega" style="display:none;">
      <label for="inputState" >Numero Bodega</label>
      <select id="inputState" name="numBodega" value="<?php echo $bodega_numero;?>" class="form-control"  >
        <option selected>seleccione</option>
        <option>1</option>
        <option>2</option>
      </select>
    </div>
  </div>
  
  <button type="submit" name="editarEmpleado" class="btn btnForm btnSubmit">Editar</button>
</form>
</div>

<script>
const selectElement = document.getElementById('inputCargo');

selectElement.addEventListener('change', (event) => {
  document.getElementById('cargoOculto').value= document.getElementById('inputCargo').value;
  if(document.getElementById('cargoOculto').value==2)
  {
    document.getElementById('divBodega').style.display='block';
  }
});

</script>

</body>
</html>