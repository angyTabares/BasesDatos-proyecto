<?php
include 'db.php';
$con = mysqli_connect($host, $user, $pass, $db);
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte</title>
  <link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../form.css">
  <link rel="stylesheet" href="../../reportes.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



  <script src="https://kit.fontawesome.com/99f017d6bc.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- Navigation -->
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

  <div class="container">

    <h2 class="mb-3">Reportes de Distri-Grajales</h2>

    <div class="accordion" id="accordionExample">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn reportesBtn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <div class="d-flex align-items-center reportesContainer">
                <div class="reportesImgContainer">
                  <img src="../../imagenes/customer.svg" alt="">
                </div>
                <p class="ml-3 m-0">Reportes Relacionados con los Empleados</p>
              </div>
            </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
            <ul class="listaReportes">
              <li><a href="../funciones/empleadosSueldo.php">Listado de empleados con su respectivo sueldo.</a></li>
              <li><a href="../funciones/totalNomina.php">Total de la nómina de los empleados.</a></li>
              <li><a href="../funciones/empleadoContratos.php">Listar por empleado la cantidad de contratos con proveedores en los que ha participado, tener solo en cuenta aquellos proveedores que no provean productos de la marca Winny.</a></li>
              <li><a href="../funciones/cargosCantidad.php">
                  Mostrar por cargos la cantidad de empleados que tiene. Mostrar sólo aquellos cargos que tengan menos empleados que el cargo de Bodeguero.</a>
              </li>
            </ul>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn reportesBtn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <div class="d-flex align-items-center reportesContainer ">
                <div class="reportesImgContainer">
                  <img src="../../imagenes/groceries.svg " alt="">
                </div>
                <p class="ml-3 m-0">Reportes Relacionados con los Productos</p>
              </div>
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">
            <ul class="listaReportes">
              <li><a href="../funciones/productosProveidos.php"> Listado de productos (nombre y precio) proveídos por los proveedores con contrato vigente</a></li>
              <li><a href="../funciones/marcasProductos.php">Listar por marca la cantidad de productos que hay registrados, incluir solo aquellas marcas cuyos productos no hallan sido pedidos por tiendas de Armenia</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h2 class="mb-0">
            <button class="btn reportesBtn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <div class="d-flex align-items-center reportesContainer ">
                <div class="reportesImgContainer">
                  <img src="../../imagenes/truck.svg" alt="">
                </div>
                <p class="ml-3 m-0">Reportes Relacionados con los Proveedores</p>
              </div>
            </button>
          </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
          <div class="card-body">
            <ul class="listaReportes">
              <li> <a href="../funciones/contratosFechas.php">Listado de contratos con su fecha de inicio y su fecha de finalización</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingThree">
          <h2 class="mb-0">
            <button class="btn reportesBtn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              <div class="d-flex align-items-center reportesContainer ">
                <div class="reportesImgContainer">
                  <img src="../../imagenes/supermarket.svg" alt="">
                </div>
                <p class="ml-3 m-0">Reportes Relacionados con las Tiendas</p>
              </div>
            </button>
          </h2>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
          <div class="card-body">
            <ul class="listaReportes">
              <li><a href="../funciones/pedidosFecha.php">Listado de pedidos con su respectiva fecha</a></li>
              <li><a href="../funciones/productoPedidosTiendas.php">Listado de productos pedidos en las tiendas del municipio de Armenia ademas de los productos pedidos en las tiendas de Calarca
                </a></li>
              <li><a href="../funciones/tiendaPedidosEntregados.php">Listar por cada tienda la cantidad total de pedidos que tienen el estado de “Entregado” y que la fecha de entrega esté entre el primer dia del año 2021 y la fecha actual</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>





</body>

</html>