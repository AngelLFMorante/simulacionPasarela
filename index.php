<?php
require("config.php");
$cod_comercio = $_REQUEST["cod_comercio"] ?? 0;
$cod_pedido = $_REQUEST["cod_pedido"] ?? 0;
$importe = $_REQUEST["importe"] ?? 0;
$concepto = $_REQUEST["concepto"] ?? "Desconocido";
$comercio = $comercios[$cod_comercio];

if (!isset($comercio)) {
    die("Código de comercio desconocido");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
    <link rel="stylesheet" type="text/css" href="./css/vistaCss.css">
    <!-- bootstrap internet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- script bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">

    <title>Pasarela de pago</title>
</head>

<body class="container fondo-imagen">

    <div class="div-cabecera">
        <h1>Simulación de pasarela de pago</h1>
        <img class="img-fluid img-logo" src="./assets/images/logo.png" data-srcpng="" alt="socialLoveLogo">
        <h2><?= $comercio["nombre"] ?></h2>

        <b class="center">Se va a proceder a la realizacion del pago:</b>
        <ul>
            <li>Código de pedido: <?= $cod_pedido ?></li>
            <li>Concepto: <b style="color:red"><?= $concepto ?></b></li>
            <li>Importe: <b><?= $importe ?>&euro;</b> </li>
        </ul>

        <br>
        <br>

        <center>
            <form action="accion.php" method="POST" class="form-pasarela">
                <input type="hidden" name="cod_comercio" value="<?= $cod_comercio ?>">
                <input type="hidden" name="cod_pedido" value="<?= $cod_pedido ?>">
                <input type="hidden" name="importe" value="<?= $importe ?>">
                <center>
                    <h4>Selecciona una acción a simular:</h4>
                </center><br>
                <center><button class="btn btn-primary" type="submit" name="pago" value="ok">Pagar</button>
                    <button class="btn btn-secondary" type="submit" name="pago" value="nook">Pago no completado</button>
                    <button class="btn btn-danger" type="submit" name="pago" value="cancelado">Cancelar</button></center>
            </form>
        </center>
        <br>
    </div>
</body>

</html>