<?php
session_start();
$user = $_SESSION["userId"];
$nombreEmpleado = $_SESSION["nombreEmpleado"];
$nombreEmpleado = $_SESSION["nombreEmpleado"];
if ($user == null) {
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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="form.css">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/small-business.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg  nav fixed-top">
    <div class="container">
      <a class="navbar-brand logoNav" href="./aplicacion.php">
        <img src="./imagenes/logoNoBg.svg" alt="" class="logo d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./aplicacion.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reportes/vistas/reportes.php">Reportes</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container">



    <!-- Call to Action Well -->
    <div class=" my-5 py-4 text-center">
      <div class="">
        <p class="mainBannerEmpleado m-0"> <?php echo $nombreEmpleado ?> !</p>
        <p class=""> Bienvenido/a a Distir-Grajales </p>
      </div>
    </div>

    <hr class="divider">
    <!-- Content Row -->
    <div class="row">

      <div class="col-sm-6 col-md-3 module text-center p-2">
        <a href="empleados/vistas/vistaEmpleados.php">
          <div class="moduleImg"><img src="imagenes/customer.svg" card-img-top" alt="..."></div>
          <div class="mt-5">
            <h5 class="card-title">Empleados</h5>
          </div>
        </a>
      </div>

      <div class="col-sm-6 col-md-3 module text-center p-2">
        <a href="proveedores/vistas/vistaProveedores.php">
          <div class="moduleImg"><img src="imagenes/truck.svg" card-img-top" alt="..."></div>
          <div class="mt-5">
            <h5 class="card-title">Proveedores</h5>
          </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-3 module text-center p-2">
        <a href="productos/vistas/vistaProductos.php">
          <div class="moduleImg"><img src="imagenes/groceries.svg" card-img-top" alt="..."></div>
          <div class="mt-5">
            <h5 class="card-title">Productos</h5>
          </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-3 module text-center p-2">
        <a href="tiendas/vistas/vistaTiendas.php">
          <div class="moduleImg"><img src="imagenes/supermarket.svg" alt="..."></div>
          <div class="mt-5">
            <h5 class="card-title">Clientes</h5>
          </div>
        </a>
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
  <footer class="py-5 footer">
    <div class="container">
      <p class="m-0 text-center">Copyright &copy; Distri-Grajales</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>