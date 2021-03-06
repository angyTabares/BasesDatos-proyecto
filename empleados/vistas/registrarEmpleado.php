<?php
include 'db.php';
$con = mysqli_connect($host, $user, $pass, $db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de empleados</title>
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
            <a class="nav-link" href="#">Home
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

  <br><br>
<br><br>
  <div class="container ">
    <form id="registEmpleado-form" class="form" action="../funciones/guardarEmpleado.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" name="correo" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Password</label>
          <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="inputCity">Cedula</label>
          <input type="text" name="cedula" class="form-control" id="inputCity">
        </div>

        <div class="form-group col-md-4">
          <label for="inputCity">Nombre</label>
          <input type="text" name="nombre" class="form-control" id="inputCity">
        </div>

        <div class="form-group col-md-6">
          <label for="inputCity">Apellido</label>
          <input type="text" name="apellido" class="form-control" id="inputCity">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Direccion</label>
          <input type="text" name="direccion" class="form-control" id="inputCity">
        </div>

        <input type="hidden" id="cargoOculto" name="codigoCargo">


        <div class="form-group col-md-3">
          <label for="inputState">Cargo</label>
          <select id="inputCargo" name="cargo" class="form-control">
            <option>Seleccione</option>
            <?php
            $query = "SELECT * FROM cargo";
            $result_cargo = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result_cargo)) { ?>

              <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre'] ?></option>

            <?php } ?>

          </select>
        </div>

        <div class="form-group col-md-3" id="divBodega" style="display:none;">
          <label for="inputState">Bodega</label>
          <select id="inputState" name="numBodega" class="form-control">
            <option selected>seleccione</option>
            <option>1</option>
            <option>2</option>
          </select>
        </div>
      </div>

      <button type="submit" name="guardarEmpleado" class="btn btn-primary">Registrar</button>
    </form>
  </div>

  <script>
    const selectElement = document.getElementById('inputCargo');

    selectElement.addEventListener('change', (event) => {
      document.getElementById('cargoOculto').value = document.getElementById('inputCargo').value;
      if (document.getElementById('cargoOculto').value == 2) {
        document.getElementById('divBodega').style.display = 'block';
      } else {
        document.getElementById('divBodega').style.display = 'none';
      }
    });
  </script>

</body>

</html>