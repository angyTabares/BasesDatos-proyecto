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
        <h2 class="enun">Listar por marca la cantidad de productos que hay registrados, incluir solo aquellas marcas cuyos productos no hallan sido pedidos por tiendas de Armenia</h2>
        <table class="tabla">
            <thead class="header">
                <tr>
                    <th class="headerText" scope="col">Nombre de la Marca</th>
                    <th class="headerText" scope="col">Cantidad de Productos</th>
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
                            <td  class="rows"><?php echo $row['nombre'] ?></td>
                            <td  class="rows"><?php echo $row['cantidad'] ?></td>
                        </tr>
                <?php }
                } ?>

            </tbody>
            </table>

    </div>
</body>

</html>