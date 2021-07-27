<?php

include 'db.php';
$con = mysqli_connect($host, $user, $pass, $db);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM producto WHERE codigo= '$id' ";
  $result = $con->query($query);

  //si almenos tengo un resultado
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $codigo = $row['codigo'];
    $nombre = $row['nombre'];
    $precio = $row['precio'];
    $marca = $row['marca_codigo'];
  }
}

if (isset($_POST['editarProducto'])) {
  $id = $_GET['id'];
  $codigo = $_POST['codigoP'];
  $nombre = $_POST['nombreP'];
  $precio = $_POST['precioP'];
  $marca = $_POST['codigoMarca'];


  $query = "UPDATE producto set codigo= '$codigo',nombre = '$nombre', precio = '$precio',
               marca_codigo='$marca' WHERE codigo = '$id'";

  mysqli_query($con, $query);

  header("Location: ../vistas/vistaProductos.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Productos</title>

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
  <div class="container d-flex flex-column align-items-center justify-content-center">
    <h2 class="mb-5">Editar Producto</h2>
    <form id="registProducto-form" class="form editProducto" action="editarProducto.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputEmail4">Codigo</label>
          <input type="text" value="<?php echo $codigo; ?>" name="codigoP" class="form-control" id="nombreProducto" placeholder="Codigo Poducto">
        </div>
        <div class="form-group col-md-12">
          <label for="inputPassword4">Nombre</label>
          <input type="text" value="<?php echo $nombre; ?>" name="nombreP" class="form-control" id="nombrePro" placeholder="nombre">
        </div>


        <div class="form-group col-md-6">
          <label for="inputCity">Precio</label>
          <input type="text" value="<?php echo $precio; ?>" name="precioP" class="form-control" id="precioPdto">
        </div>

        <input type="hidden" id="marcaOculta" name="codigoMarca">

        <div class="form-group col-md-6">
          <label for="inputState">Marca</label>
          <select id="inputMarca" value="<?php echo $marca; ?>" name="marca" class="form-control">
            <option>Seleccione</option>
            <?php
            $query = "SELECT * FROM Marca";
            $result_marca = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result_marca)) { ?>

              <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre'] ?></option>

            <?php } ?>

          </select>
        </div>

      </div>

      <button type="submit" name="editarProducto" class="btn btnForm btnSubmit">Guardar</button>

    </form>
  </div>


  <script>
    const selectElement = document.getElementById('inputMarca');

    selectElement.addEventListener('change', (event) => {
      document.getElementById('marcaOculta').value = document.getElementById('inputMarca').value;
    });
  </script>

  <br><br>

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>