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
        <h2 class="enun"> Listar por cada tienda la cantidad total de pedidos que tienen el estado de “Entregado” y que la fecha de entrega esté entre el primer dia del año 2021 y la fecha actual</h2>
        <table class="tabla">
            <thead class="header">
                <tr>
                    <th class="headerText" scope="col">Nombre de la Tienda</th>
                    <th class="headerText" scope="col">Cantidad de Pedidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT t.nombre, COUNT(p.numero) as cantidad
                FROM tienda t INNER JOIN pedido p on t.rut = p.tienda_rut INNER JOIN estado_pedido ep on p.estado_pedido_codigo = ep.codigo
                WHERE ep.nombre = 'Entregado' and p.fecha BETWEEN date '2021-01-01' and CURRENT_DATE
                GROUP BY t.nombre
                ORDER BY COUNT(p.numero) DESC";
                $resultE = $con->query($query);

                if (!empty($resultE) and mysqli_num_rows($resultE) > 0) {
                    while ($row = mysqli_fetch_array($resultE)) { ?>
                        <tr>
                            <td class="rows"><?php echo $row['nombre'] ?></td>
                            <td class="rows"><?php echo $row['cantidad'] ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>