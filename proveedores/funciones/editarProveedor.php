<?php
  
  include 'db.php';
  $con = mysqli_connect($host,$user,$pass,$db);

  if(isset($_GET['id']))
  {
      $id= $_GET['id'];
      $query = "SELECT * FROM proveedor WHERE rut= '$id' ";
      $result =$con->query($query);

      //si almenos tengo un resultado
      if(mysqli_num_rows($result)>0)
     {
       $row = mysqli_fetch_array($result);
       $rut=$row['rut'];
       $nombre=$row['nombre'];
       $email= $row['email'];
     }
    
  }

  if(isset($_POST['editarProveedor']))
  {
      $id=$_GET['id'];
      $rut = $_POST['rut'];
      $nombre=$_POST['nombreProveedor'];
      $email= $_POST['emailProveedor'];

      $query = "UPDATE proveedor set rut = '$rut', nombre = '$nombre', email = '$email' WHERE rut='$id'";

      mysqli_query($con, $query);

      header("Location: ../vistas/vistaProveedores.php");
      
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Proveedor</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/small-buSsiness.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/99f017d6bc.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../../aplicacion.php">Distri-Grajales</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <br><br><br><br>
  <!-- Page Content -->
  <div class="container">
  
  <form id="registEmpleado-form" class="form" action="editarProveedor.php?id=<?php echo $_GET['id'];?>" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre Empresa</label>
      <input type="text" value="<?php echo $nombre; ?>" name="nombreProveedor" class="form-control" id="nombreProvee" placeholder="Proveedor">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" value="<?php echo $email; ?>" name="emailProveedor" class="form-control" id="emailProvee" placeholder="email">
    </div>

    
    <div class="form-group col-md-4">
      <label for="inputCity">rut</label>
      <input type="text" value="<?php echo $rut; ?>" name="rut" class="form-control" id="rutProvee">
    </div>
    </div>

    <button type="submit" name="editarProveedor" class="btn btn-primary">Guardar</button>

   </form>
</div>


  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

