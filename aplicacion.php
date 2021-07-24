<?php
     session_start();
     $user= $_SESSION["userId"];
     $nombreEmpleado= $_SESSION["nombreEmpleado"];
     if($user==null)
     {
        header("Location: login.php");
     }
     
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Distri-grajales distribuidora</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/small-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="aplicacion.php">Distri-Grajales</a>
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

  <!-- Page Content -->
  <div class="container">


    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0"> Bienvenido empleado distrigrajales : <?php echo $nombreEmpleado ?></p>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">

    <div class="col-sm-6 col-md-3">
      <div class="card text-center" >
       <a href="empleados/vistas/vistaEmpleados.php" class="thumbnail">
         <img src="img/empleado-img.png" alt="...">
       </a>
       <h3 >Empleados</h3>
      </div>
    </div>  

    <div class="col-sm-6 col-md-3">
      <div class="card text-center" >
       <a href="proveedores/vistas/vistaProveedores.php" class="thumbnail">
         <img src="img/proveedor-img.png" alt="...">
       </a>
       <h3 >Proveedores</h3>
      </div>
    </div>  

    <div class="col-sm-6 col-md-3">
      <div class="card text-center" >
       <a href="productos/vistas/vistaProductos.php" class="thumbnail">
         <img src="img/producto-img.png" alt="...">
       </a>
       <h3 >Productos</h3>
      </div>
    </div>  

    <div class="col-sm-6 col-md-3">
      <div class="card text-center" >
       <a href="tiendas/vistas/vistaTiendas.php" class="thumbnail">
         <img src="img/tienda-img.png" alt="...">
       </a>
       <h3 >Clientes</h3>
      </div>
    </div>  

  </div>
  <!-- /.container -->

  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
