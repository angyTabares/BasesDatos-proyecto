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
  
  <form id="registEmpleado-form" class="form" action="../funciones/guardarProveedor.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre Empresa</label>
      <input type="text" name="nombreProveedor" class="form-control" id="nombreProvee" placeholder="Proveedor">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" name="emailProveedor" class="form-control" id="emailProvee" placeholder="email">
    </div>

    
    <div class="form-group col-md-4">
      <label for="inputCity">rut</label>
      <input type="text" name="rut" class="form-control" id="rutProvee">
    </div>
    </div>

    <button type="submit" name="guardarProveedor" class="btn btn-primary">Guardar</button>

   </form>
</div>

<br><br>
    <!-- Content Row -->
<div class="container">
 
 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Rut</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
           <?php 
                   $query = "SELECT * FROM proveedor";
                   $resultP = $con->query($query);

                   if(!empty($resultP) AND mysqli_num_rows($resultP)>0) { 
                    while($row = mysqli_fetch_array($resultP)) { ?>
                      
                        <tr>
                           <td><?php echo $row['rut'] ?></td>
                           <td><?php echo $row['nombre'] ?></td>
                           <td><?php echo $row['email'] ?></td>
                           <td>
                              <a href="../funciones/editarProveedor.php?id=<?php echo $row['rut']?>" class="btn btn-secondary">
                                 <i class= "fas fa-marker"></i>
                              </a>
                              <a href="../funciones/borrarProveedor.php?id=<?php echo $row['rut']?>" class="btn btn-danger">
                                 <i class="far fa-trash-alt"></i>
                              </a>
                           </td>
                        </tr>

            <?php } }?>

  </tbody>
 </table>


 
  <!-- /.container -->
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>