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
    .footer{
        text-align: center;
        background: #88b06a;
        color: #fff;
        font-weight: bold;
    }
</style>

<body>
    <div class="titleContainer">
        <h1 class="title">Distri-Grajales</h1>
    </div>

    <div class="contenedor">


        <h2 class="enun">Nomina de Empleados</h2>
        <table class="tabla">
            <thead class="header">
                <tr>
                    <th class="headerText" scope="col">Nombre</th>
                    <th class="headerText" scope="col">Apellido</th>
                    <th class="headerText" scope="col">Salario</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT e.nombre,e.apellido,c.salario from empleado e join cargo c on e.cargo_codigo = c.codigo
                    GROUP by e.nombre";
                $resultE = $con->query($query);

                if (!empty($resultE) and mysqli_num_rows($resultE) > 0) {
                    while ($row = mysqli_fetch_array($resultE)) { ?>

                        <tr>
                            <td class="rows"><?php echo $row['nombre'] ?></td>
                            <td class="rows"><?php echo $row['apellido'] ?></td>
                            <td class="rows">$<?php echo $row['salario'] ?></td>
                        </tr>

                <?php }
                } ?>

            </tbody>
            <tfoot class="footer">
                <?php
                $query = "SELECT sum(c.salario) as Nomina
                from empleado e join cargo c on e.cargo_codigo = c.codigo";
                $resultE = $con->query($query);

                if (!empty($resultE) and mysqli_num_rows($resultE) > 0) {
                    while ($row = mysqli_fetch_array($resultE)) { ?>
                        <tr>
                            <td class="rows"  colspan="2">Total Nomina</td>
                            <td>$<?php echo $row['Nomina'] ?></td>
                        </tr>
                <?php }
                } ?>
            </tfoot>
        </table>
    </div>
</body>

</html>