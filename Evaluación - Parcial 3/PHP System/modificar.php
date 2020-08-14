<?php
    $type = $_GET['Type'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestión BD - Modificaciones</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
                <?php
                if ($type == "Pais") {
                    echo "<h1 class='display-3'>Sistema de gestión BD - Modificación de países</h1>
                    <p class='lead'>Esta página nos sirve para modificar países en nuestra BD</p>
                    <hr class='my-2'>
                    <p class='lead'>
                    <a class='btn btn-primary btn-lg' href='index.php' role='button'>Regresar al registro de países</a>";
                }elseif($type == "Continente"){
                    echo "<h1 class='display-3'>Sistema de gestión BD - Modificación de continentes</h1>
                    <p class='lead'>Esta página nos sirve para modificar continentes en nuestra BD</p>
                    <hr class='my-2'>
                    <p class='lead'>
                    <a class='btn btn-primary btn-lg' href='continentes.php' role='button'>Regresar al registro de continentes</a>";
                }else{
                    echo "<a class='btn btn-primary btn-lg' href='#' role='button'>Usa el botón volver de tu navegador para salir</a>";
                }
                ?>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h4>Ingresa los datos que se solicitan</h4>
        </div>
    </div>

    <br>

    <?php
        if ($type == "Pais") {

            $id_pais = $_GET["ID"];
            $nombre_pais = $_GET["Nombre_Pais"];
            $nombre_continente = $_GET["Nombre_Continente"];
            $poblacion = $_GET["Poblacion"];
            $moneda = $_GET["Moneda"];
            $idioma = $_GET["Idioma"];
            $pib = $_GET["PIB"];
            $act_economica = $_GET["Act_economica"];
    ?>

    <div class="container card">
            <br>
            <form action="operaciones/update_pais.php" method="get" class="form-group">
                <div class="row">
                    <div class="col-1"><label for="id_pais">ID</label>
                    <input type="text" name="id_pais" id="" class="form-control" value="<?php echo $id_pais; ?>" readonly="readonly" required></div>
                    <div class="col"><label for="Nombre_pais">Nombre del país</label>
                    <input type="text" name="Nombre_pais" id="" class="form-control" value="<?php echo $nombre_pais; ?>" placeholder="Ej. México" required></div>
                    <div class="col"><label for="Nombre_continente">Nombre del continente al que pertenece</label>
                    <input type="text" name="Nombre_continente" id="" class="form-control" value="<?php echo $nombre_continente; ?>" placeholder="Ej. Ámerica" required></div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><label for="poblacion">Población</label>
                    <input type="number" name="poblacion" id="" class="form-control" value="<?php echo $poblacion; ?>" placeholder="Número interpretado en millones" required></div>
                    <div class="col"><label for="Moneda">Moneda</label>
                    <input type="text" name="Moneda" id="" class="form-control" value="<?php echo $moneda; ?>" placeholder="En formato abreviado, Ej. USD" required></div>
                    <div class="col"><label for="Idioma">Idioma</label>
                    <input type="text" name="Idioma" id="" class="form-control" value="<?php echo $idioma; ?>" placeholder="Idioma que predomina en el país" required></div>
                </div>
                <br>
                <div class="row">
                    <div class="col"><label for="pib">PIB</label>
                    <input type="number" name="pib" id="" class="form-control" value="<?php echo $pib; ?>" placeholder="Valuado en millones" required></div>
                    <div class="col"><label for="act_principal">Actividad económica principal</label>
                    <input type="text" name="act_principal" id="" class="form-control" value="<?php echo $act_economica; ?>" placeholder="Ej. Comercio exterior" required></div>
                </div>
                <br>
                <input class="btn btn-primary" type="submit" value="Enviar" name="Enviar"/>
            </form>
    </div>

    <?php
        }elseif ($type == "Continente"){
            $id = $_GET['ID'];
            $nombre_continente = $_GET['Nombre_Continente'];
            $expansion = $_GET['Expansion'];
            $porcentaje = $_GET['Porcentaje'];
    ?>

        <div class="container card">
                <br>
                <form action="operaciones/update_continente.php" method="get" class="form-group">
                    <div class="row">
                        <div class="col-1"><label for="id_continente">ID</label>
                        <input type="text" name="id_continente" id="" class="form-control" value="<?php echo $id; ?>" readonly="readonly" required></div>
                        <div class="col"><label for="Nombre_continente">Nombre del continente</label>
                        <input type="text" name="Nombre_continente" id="" class="form-control" placeholder="Ej. Ámerica" value="<?php echo $nombre_continente; ?>" required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col"><label for="expansion">Expansión de terreno</label>
                        <input type="number" name="expansion" id="" class="form-control" placeholder="Número interpretado en Kilometros cuadrados" value="<?php echo $expansion; ?>" required></div>
                        <div class="col"><label for="porcentaje">Porcentaje del planeta</label>
                        <input type="text" name="porcentaje" id="" class="form-control" placeholder="Número interpretado en porcentaje" value="<?php echo $porcentaje; ?>" required></div>
                    </div>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Enviar" name="Enviar"/>
                </form>
        </div>

    <?php
        }else{
    ?>

    <div class="container card">
        <h3>ERROR: Modulo no encontrado</h3>
    </div>

    <?php
        }
    ?>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>
</html>