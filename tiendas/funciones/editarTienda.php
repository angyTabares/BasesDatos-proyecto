<?php

include 'db.php';
$con = mysqli_connect($host, $user, $pass, $db);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tienda WHERE rut= '$id' ";
  $result = $con->query($query);

  //si almenos tengo un resultado
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $rut = $row['rut'];
    $nombre = $row['nombre'];
    $direccion = $row['direccion'];
    $municipio = $row['municipio_codigo'];
  }
}

if (isset($_POST['editarTienda'])) {
  $id = $_GET['id'];
  $rut = $_POST['rutT'];
  $nombre = $_POST['nombreT'];
  $direccion = $_POST['direccion'];
  $municipio = $_POST['codigoMunicipio'];

  $query = "UPDATE tienda set rut= '$rut',nombre = '$nombre', direccion = '$direccion',
               municipio_codigo='$municipio' WHERE rut = '$id' ";

  mysqli_query($con, $query);

  header("Location: ../vistas/vistaTiendas.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tiendas</title>


  <link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../form.css">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



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
  <br><br><br><br>
  <!-- Page Content -->
  <div class="container d-flex align-items-center justify-content-center mt-5 flex-column">

    <form id="registTienda-form" class="editForm" action="editarTienda.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <h2 class="mb-5">Editar Tienda</h2>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputEmail4">Rut</label>
          <input type="text" value="<?php echo $rut; ?>" name="rutT" class="form-control" id="nombreTienda" placeholder="rut">
        </div>
        <div class="form-group col-md-12">
          <label for="inputPassword4">Nombre</label>
          <input type="text" value="<?php echo $nombre; ?>" name="nombreT" class="form-control" id="nombrePro" placeholder="nombre">
        </div>


        <div class="form-group col-md-6">
          <label for="inputCity">Direccion</label>
          <input type="text" value="<?php echo $direccion; ?>" name="direccion" class="form-control" id="direccion">
        </div>

        <input type="hidden" id="municipioOculto" name="codigoMunicipio">

        <div class="form-group col-md-6">
          <label for="inputState">Municipio</label>
          <select id="inputMunicipio" value="<?php echo $municipio; ?>" name="municipio" class="form-control">
            <option>Seleccione</option>
            <?php
            $query = "SELECT * FROM municipio";
            $result_muni = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result_muni)) { ?>

              <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre'] ?></option>

            <?php } ?>

          </select>
        </div>

      </div>
      <div class="d-flex flex-row align-items-center justify-content-center">
        <button type="submit" name="editarTienda" class="btn btnForm w-75">Editar</button>
      </div>

    </form>
  </div>


  <script>
    const selectElement = document.getElementById('inputMunicipio');

    selectElement.addEventListener('change', (event) => {
      document.getElementById('municipioOculto').value = document.getElementById('inputMunicipio').value;
    });
  </script>

  <br><br>
  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>