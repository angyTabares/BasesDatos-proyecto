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
        width: 100%;
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


        <h2 class="enun">Listar por empleado la cantidad de contratos con proveedores en los que ha participado, tener solo en cuenta aquellos proveedores que no provean productos de la marca Winny</h2>
        <table class="tabla">
            <thead class="header">
                <tr>
                    <th class="headerText" scope="col">Cedula Empleado</th>
                    <th class="headerText" scope="col">Nombre Empleado</th>
                    <th class="headerText" scope="col">Apellido Empleado</th>
                    <th class="headerText" scope="col">Cantidad de Contrato </th>
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
                            <td class="rows"><?php echo $row['cedula'] ?></td>
                            <td class="rows"><?php echo $row['nombre'] ?></td>
                            <td class="rows"><?php echo $row['apellido'] ?></td>
                            <td class="rows"><?php echo $row['cant'] ?></td>
                        </tr>
                <?php }
                } ?>

            </tbody>
        </table>
    </div>
</body>

</html>