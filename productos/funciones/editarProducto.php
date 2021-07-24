<?php
  
  include 'db.php';
  $con = mysqli_connect($host,$user,$pass,$db);

  if(isset($_GET['id']))
  {
      $id= $_GET['id'];
      $query = "SELECT * FROM producto WHERE codigo= '$id' ";
      $result =$con->query($query);

      //si almenos tengo un resultado
      if(mysqli_num_rows($result)>0)
     {
       $row = mysqli_fetch_array($result);

       $codigo = $row['codigo'];
       $nombre=$row['nombre'];
       $precio= $row['precio'];
       $marca= $row['marca_codigo'];
 
     }
    
  }

  if(isset($_POST['editarProducto']))
  {
      $id= $_GET['id'];
      $codigo = $_POST['codigoP'];
      $nombre=$_POST['nombreP'];
      $precio= $_POST['precioP'];
      $marca= $_POST['codigoMarca'];

      
     $query = "UPDATE producto set codigo= '$codigo',nombre = '$nombre', precio = '$precio',
               marca_codigo='$marca' WHERE codigo = '$id' ";

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
  
  <form id="registProducto-form" class="form" action="editarProducto.php?id=<?php echo $_GET['id'];?>" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Codigo</label>
      <input type="text" value="<?php echo $codigo; ?>" name="codigoP" class="form-control" id="nombreProducto" placeholder="Codigo Poducto">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nombre</label>
      <input type="text" value="<?php echo $nombre; ?>" name="nombreP" class="form-control" id="nombrePro" placeholder="nombre">
    </div>

    
    <div class="form-group col-md-2">
      <label for="inputCity">Precio</label>
      <input type="text" value="<?php echo $precio; ?>" name="precioP" class="form-control" id="precioPdto">
    </div>

    <input type="hidden" id="marcaOculta" name="codigoMarca">

    <div class="form-group col-md-3">
      <label for="inputState">Marca</label>
      <select id="inputMarca" value="<?php echo $marca; ?>" name="marca" class="form-control">
      <option >Seleccione</option>
        <?php 
                   $query = "SELECT * FROM Marca";
                   $result_marca= mysqli_query($con, $query);
                   
                    while($row = mysqli_fetch_array($result_marca)) { ?>
                           
                           <option value="<?php echo $row['codigo'] ?>"><?php echo $row['nombre'] ?></option>
                           
                   <?php } ?>

      </select>
    </div>
 
    </div>

    <button type="submit" name="editarProducto" class="btn btn-primary">Guardar</button>

   </form>
</div>


<script>
const selectElement = document.getElementById('inputMarca');

selectElement.addEventListener('change', (event) => {
  document.getElementById('marcaOculta').value= document.getElementById('inputMarca').value;
});
</script>

<br><br>

  <!-- Bootstrap core JavaScript -->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

