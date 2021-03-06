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
  <div class="container">
    <h2 class="mb-5">Nueva Tienda</h2>
    <form id="registTienda-form" class="form" action="../funciones/guardarTienda.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">RUT</label>
          <input type="text" name="rutT" class="form-control" id="nombreTienda" placeholder="RUT">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Nombre</label>
          <input type="text" name="nombreT" class="form-control" id="nombrePro" placeholder="Nombre">
        </div>


        <div class="form-group col-md-3">
          <label for="inputCity">Direccion</label>
          <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion">
        </div>

        <input type="hidden" id="municipioOculto" name="codigoMunicipio">

        <div class="form-group col-md-3">
          <label for="inputState">Municipio</label>
          <select id="inputMunicipio" name="municipio" class="form-control">
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

      <button type="submit" name="guardarTienda" class="btn btnForm">Guardar</button>

    </form>
  </div>


  <script>
    const selectElement = document.getElementById('inputMunicipio');

    selectElement.addEventListener('change', (event) => {
      document.getElementById('municipioOculto').value = document.getElementById('inputMunicipio').value;
    });
  </script>

  <br><br>
  <!-- Content Row -->
  <div class="container">

    <table class="table">
      <thead class="thead-custom">
        <tr>
          <th scope="col">Rut</th>
          <th scope="col">Nombre</th>
          <th scope="col">Direcci??n</th>
          <th scope="col">Municipio</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM tienda";
        $result = $con->query($query);

        if (!empty($result) and mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) { ?>

            <tr>
              <td><?php echo $row['rut'] ?></td>
              <td><?php echo $row['nombre'] ?></td>
              <td><?php echo $row['direccion'] ?></td>

              <?php
              $codigoM = $row['municipio_codigo'];

              $query2 = "SELECT nombre from municipio where codigo='$codigoM'";
              $resultE2 = mysqli_query($con, $query2);
              $muniC = $resultE2->fetch_array()[0] ?? '';
              ?>
              <td><?php echo $muniC ?></td>
              <td>
                <a href="../funciones/editarTienda.php?id=<?php echo $row['rut'] ?>" class="btn editIcon">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="../funciones/borrarTienda.php?id=<?php echo $row['rut'] ?>" class="btn deleteIcon">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>

        <?php }
        } ?>

      </tbody>
    </table>



    <!-- /.container -->
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>