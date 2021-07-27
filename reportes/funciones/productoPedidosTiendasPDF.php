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


        <h2 class="enun">Listado de productos pedidos en las tiendas del municipio de Armenia ademas de los productos pedidos en las tiendas de Calarca</h2>
        <table class="tabla">
            <thead class="header">
                <tr>
                    <th class="headerText" scope="col">Codigo Producto</th>
                    <th class="headerText" scope="col">Nombre Producto</th>
                    <th class="headerText" scope="col">Municipio del Pedido</th>
                    <th class="headerText" scope="col">Cantidad Pedida</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT pr.codigo, pr.nombre,m.nombre as municipio, SUM(pp.cantidad) as cantidad
                FROM   municipio m inner join tienda t on m.codigo=t.municipio_codigo inner join pedido p on p.tienda_rut = t.rut
                INNER JOIN pedido_producto pp  on pp.pedido_numero=p.numero INNER JOIN producto pr on pp.producto_codigo = pr.codigo 
                WHERE m.nombre='Armenia'
                GROUP BY pr.codigo UNION 
                SELECT pr.codigo, pr.nombre,m.nombre as municipio, SUM(pp.cantidad) as cantidad
                FROM   municipio m inner join tienda t on m.codigo=t.municipio_codigo inner join pedido p on p.tienda_rut = t.rut
                INNER JOIN pedido_producto pp  on pp.pedido_numero=p.numero INNER JOIN producto pr on pp.producto_codigo = pr.codigo 
                WHERE m.nombre='Calarca'
                GROUP BY pr.codigo
                ";
                $resultE = $con->query($query);

                if (!empty($resultE) and mysqli_num_rows($resultE) > 0) {
                    while ($row = mysqli_fetch_array($resultE)) { ?>

                        <tr>
                            <td class="rows"><?php echo $row['codigo'] ?></td>
                            <td class="rows"><?php echo $row['nombre'] ?></td>
                            <td class="rows"><?php echo $row['municipio'] ?></td>
                            <td class="rows"><?php echo $row['cantidad'] ?></td>
                           
                        </tr>
                <?php }
                } ?>

            </tbody>
        </table>
    </div>
</body>

</html>