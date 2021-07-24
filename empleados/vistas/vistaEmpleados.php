<?php
include 'db.php';
$con = mysqli_connect($host,$user,$pass,$db);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Empleados</title>

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
  
    <!-- Content Row -->
    <div class="row">

<table class="table">
  <thead class="thead-dark">
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

                   if(!empty($resultE) AND mysqli_num_rows($resultE)>0) { 
                    while($row = mysqli_fetch_array($resultE)) { ?>
                      
                        <tr>
                           <td><?php echo $row['cedula'] ?></td>
                           <td><?php echo $row['nombre'] ?></td>
                           <td><?php echo $row['apellido'] ?></td>
                           <td><?php echo $row['direccion'] ?></td>
                           <td><?php echo $row['correo'] ?></td>
                           <?php
                           $codigoC=$row['cargo_codigo'];
        
                           $query2 = "SELECT nombre from cargo where codigo='$codigoC'";
                           $resultE2 = mysqli_query($con, $query2);
                           $cargoC = $resultE2->fetch_array()[0] ?? '';
                           ?>
                           <td><?php echo $cargoC?></td>
                           <td>
                              <a href="../funciones/editarEmpleado.php?id=<?php echo $row['cedula']?>" class="btn btn-secondary">
                                 <i class= "fas fa-marker"></i>
                              </a>
                              <a href="../funciones/borrarEmpleado.php?id=<?php echo $row['cedula']?>" class="btn btn-danger">
                                 <i class="far fa-trash-alt"></i>
                              </a>
                           </td>
                        </tr>

            <?php } }?>

  </tbody>
</table>


  </div>
  <!-- /.container -->

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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>