<?php
include 'db.php';
$con = mysqli_connect($host, $user, $pass, $db);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sueldos de los empleados</title>
</head>
<style>
    .enun {
        font-family: "Gill Sans Extrabold", Helvetica, sans-serif;
    }

    .tabla {
        position: relative;
        left: 50%;
        transform: translate(-50%);
        width: 70%;
        border-top: 1px solid rgba(0, 0, 0, 0.4);
        font-family: "Gill Sans Extrabold", Helvetica, sans-serif;
    }

    .header {
        background: none;
        color: #88b06a;
        font-weight: bold;
        padding: 1em;
    }

    .headerText {
        font-size: 1.2rem;
        font-weight: bold;
        padding: 1em;
    }

    .rows {
        text-align: center;
        border-top: 1px solid #C6BEBD;
        padding: 1em;

    }

    .contenedor {
        padding: 2em;
    }

    .titleContainer {
        width: 100%;
        height: 50px;
    
    }

    .title {
        text-align: center;
        font-family: "Gill Sans Extrabold", Helvetica, sans-serif;
        color: #88b06a;

    }
</style>

<body>
    <div class="titleContainer">
        <h1 class="title">Distri-Grajales</h1>
    </div>

    <div class="contenedor">


        <h2 class="enun">Listado de productos proveídos por los proveedores con contrato vigente.</h2>
        <table class="tabla">
            <thead class="header">
                <tr>
                    <th class="headerText" scope="col">Nombre del Producto</th>
                    <th class="headerText" scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT p.nombre, p.precio
              from producto p join proveedor_producto pvp on p.codigo = pvp.producto_codigo join proveedor pv on
              pv.rut = pvp.proveedor_rut join contrato c on pv.rut= c.proveedor_rut
              where c.fecha_final > CURRENT_DATE";
                $resultE = $con->query($query);

                if (!empty($resultE) and mysqli_num_rows($resultE) > 0) {
                    while ($row = mysqli_fetch_array($resultE)) { ?>

                        <tr>
                            <td class="rows"><?php echo $row['nombre'] ?></td>
                            <td class="rows">$<?php echo $row['precio'] ?></td>

                        </tr>

                <?php }
                } ?>

            </tbody>
        </table>
    </div>
</body>

</html>