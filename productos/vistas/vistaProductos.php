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
  <div class="container">
  <h2 class="mb-3">Nuevo Producto</h2>
  <form id="registProveedor-form" class="form" action="../funciones/guardarProducto.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Codigo</label>
      <input type="text" name="codigoP" class="form-control" id="nombreProducto" placeholder="Codigo Poducto">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nombre</label>
      <input type="text" name="nombreP" class="form-control" id="nombrePro" placeholder="Nombre">
    </div>

    
    <div class="form-group col-md-2">
      <label for="inputCity">Precio</label>
      <input type="text" name="precioP" class="form-control" id="precioPdto" placeholder="Precio">
    </div>

    <input type="hidden" id="marcaOculta" name="codigoMarca">

    <div class="form-group col-md-3">
      <label for="inputState">Marca</label>
      <select id="inputMarca" name="marca" class="form-control">
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

    <button type="submit" name="guardarProducto" class="btn btnForm">Guardar</button>

   </form>
</div>


<script>
const selectElement = document.getElementById('inputCargo');

selectElement.addEventListener('change', (event) => {
  document.getElementById('marcaOculta').value= document.getElementById('inputMarca').value;
});
</script>

<br><br>
    <!-- Content Row -->
<div class="container">
 
 <table class="table">
  <thead class="thead-custom">
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Marca</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
           <?php 
                   $query = "SELECT * FROM producto";
                   $resultP = $con->query($query);

                   if(!empty($resultP) AND mysqli_num_rows($resultP)>0) { 
                    while($row = mysqli_fetch_array($resultP)) { ?>
                      
                        <tr>
                           <td><?php echo $row['codigo'] ?></td>
                           <td><?php echo $row['nombre'] ?></td>
                           <td><?php echo $row['precio'] ?></td>
                           
                           <?php
                           $codigoM=$row['marca_codigo'];
        
                           $query2 = "SELECT nombre from marca where codigo='$codigoM'";
                           $resultE2 = mysqli_query($con, $query2);
                           $marcaC = $resultE2->fetch_array()[0] ?? '';
                           ?>
                           <td><?php echo $marcaC?></td>
                           <td>
                              <a href="../funciones/editarProducto.php?id=<?php echo $row['codigo']?>" class="btn btn editIcon">
                                 <i class= "fas fa-marker"></i>
                              </a>
                              <a href="../funciones/borrarProducto.php?id=<?php echo $row['codigo']?>" class="btn btn deleteIcon">
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