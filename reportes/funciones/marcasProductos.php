<?php
include 'db.php';
$con = mysqli_connect($host, $user, $pass, $db);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas Productos</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../form.css">
    <link rel="stylesheet" href="../../reportes.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



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
        <h2 class="mb-3">Listar por marca la cantidad de productos que hay registrados, incluir solo aquellas marcas cuyos productos no hallan sido pedidos por tiendas de Armenia</h2>
        <a href="../generadores/generarMarcasProductos.php" class="btn pdfDownloader btnSubmit mb-2"><i class="pdfDownloaderIcon fas fa-file-pdf"></i>Generar</a>
        <table class="table">
            <thead class="thead-custom">
                <tr>
                    <th scope="col">Nombre de la Marca</th>
                    <th scope="col">Cantidad de Productos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT mar.nombre, COUNT(prd.codigo) as cantidad
              from marca mar join producto prd on mar.codigo = prd.marca_codigo
              where mar.codigo not in(
              SELECT p.marca_codigo 
              from producto p join pedido_producto pdp on p.codigo = pdp.producto_codigo join pedido pd 
              on pdp.pedido_numero = pd.numero join tienda ti on pd.tienda_rut = ti.rut join municipio mn on ti.municipio_codigo = mn.codigo
              where mn.nombre ='Armenia')
              GROUP BY mar.nombre
              ORDER By COUNT(prd.codigo) DESC";
                $resultE = $con->query($query);

                if (!empty($resultE) and mysqli_num_rows($resultE) > 0) {
                    while ($row = mysqli_fetch_array($resultE)) { ?>
                        <tr>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['cantidad'] ?></td>
                        </tr>
                <?php }
                } ?>

            </tbody>
            </table>


    </div>
    </div>
</body>

</html>