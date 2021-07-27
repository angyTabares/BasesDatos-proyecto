<?php
include 'db.php';
$con = mysqli_connect($host, $user, $pass, $db);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contratos Empleados</title>
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
        <h2 class="mb-3">Listar por empleado la cantidad de contratos con proveedores en los que ha participado, tener solo en cuenta aquellos proveedores que no provean productos de la marca Winny</h2>
        <a href="../generadores/generarEmpleadoContratos.php" class="btn pdfDownloader btnSubmit mb-2"><i class="pdfDownloaderIcon fas fa-file-pdf"></i>Generar</a>
        <table class="table">
            <thead class="thead-custom">
                <tr>
                    <th scope="col">Cedula Empleado</th>
                    <th scope="col">Nombre Empleado</th>
                    <th scope="col">Apellido Empleado</th>
                    <th scope="col">Cantidad de Contrato </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT e.cedula,e.nombre, e.apellido, COUNT(c.numero) as cant
                          from empleado e join contrato c on e.cedula = c.empleado_cedula
                          where c.proveedor_rut not in (
                           SELECT pd.rut
                              from proveedor pd join proveedor_producto pvp on pd.rut = pvp.proveedor_rut 
                              join producto pr on pr.codigo = pvp.producto_codigo join marca mr on pr.marca_codigo = mr.codigo
                              WHERE mr.nombre ='Winny'
                          )
                          GROUP BY e.nombre
                          ORDER BY e.apellido";
                $resultE = $con->query($query);

                if (!empty($resultE) and mysqli_num_rows($resultE) > 0) {
                    while ($row = mysqli_fetch_array($resultE)) { ?>

                        <tr>
                            <td><?php echo $row['cedula'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['apellido'] ?></td>
                            <td><?php echo $row['cant'] ?></td>
                        </tr>
                <?php }
                } ?>

            </tbody>
        </table>
    </div>
</body>

</html>