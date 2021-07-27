<?php
include 'db.php';
$con = mysqli_connect($host, $user, $pass, $db);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Empleados</title>
  <link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../form.css">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/small-buSsiness.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/99f017d6bc.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- Navigation -->
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

  <br>
  <br>
  <br>
  <br>

  <!-- Page Content -->
  <div class="container">
    <h2 class="mb-5">Listado de Empleados Distri-Grajales</h2>
    <!-- Content Row -->
    <div class="row">

      <table class="table">
        <thead class="thead-custom">
          <tr>
            <th scope="col">Cedula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Direccion</th>
            <th scope="col">Correo</th>
            <th scope="col">Cargo</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM empleado";
          $resultE = $con->query($query);

          if (!empty($resultE) and mysqli_num_rows($resultE) > 0) {
            while ($row = mysqli_fetch_array($resultE)) { ?>

              <tr>
                <td><?php echo $row['cedula'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['apellido'] ?></td>
                <td><?php echo $row['direccion'] ?></td>
                <td><?php echo $row['correo'] ?></td>
                <?php
                $codigoC = $row['cargo_codigo'];

                $query2 = "SELECT nombre from cargo where codigo='$codigoC'";
                $resultE2 = mysqli_query($con, $query2);
                $cargoC = $resultE2->fetch_array()[0] ?? '';
                ?>
                <td><?php echo $cargoC ?></td>
                <td>
                  <a href="../funciones/editarEmpleado.php?id=<?php echo $row['cedula'] ?>" class="btn editIcon">
                    <i class=" fas fa-marker"></i>
                  </a>
                  <a href="../funciones/borrarEmpleado.php?id=<?php echo $row['cedula'] ?>" class="btn deleteIcon">
                    <i class=" far fa-trash-alt"></i>
                  </a>
                </td>
              </tr>

          <?php }
          } ?>

        </tbody>
      </table>


  </div>
  <!-- /.container -->

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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>