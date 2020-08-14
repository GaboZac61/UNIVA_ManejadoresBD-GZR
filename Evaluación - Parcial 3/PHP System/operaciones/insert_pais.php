<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestión BD - Modulo de insersión de Paises</title>
</head>
<body>
    <?php

    if (isset($_GET['Enviar'])) {

        //Crear conexión a base de datos si los datos se enviaron desde el formulario
        try {
            $conn = new PDO('mysql:host=localhost;port=3307;dbname=gestionbd_parcial3', 'root', 'contrasena');
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if ($conn==true){
            echo "<h2>Estado de la BD: Conectada</h2><br>";

            //Extraer datos enviados por el formulario y asignarlos a variables
            $nombre_pais = $_GET['Nombre_pais'];
            $nombre_continente = $_GET['Nombre_continente'];
            $poblacion = $_GET['poblacion'];
            $moneda = $_GET['Moneda'];
            $idioma = $_GET['Idioma'];
            $pib = $_GET['pib'];
            $actividad = $_GET['act_principal'];

            try {
				$sql = "CALL crear_pais('$nombre_pais', '$nombre_continente', $poblacion, '$moneda', '$idioma', $pib, '$actividad');";
                $stmt = $conn->prepare($sql);
                print_r($stmt);
                if ($stmt->execute()){
                    echo "<h4>Datos ingresados a la BD con éxito</h4>";
                    echo "<p>Nombre del pais: $nombre_pais</p>";
                    echo "<p>Continente al que pertenece: $nombre_continente</p>";
                    echo "<p>Población: $poblacion</p>";
                    echo "<p>Moneda: $moneda</p>";
                    echo "<p>Idioma: $idioma</p>";
                    echo "<p>Producto Interno Bruto: $pib</p>";
                    echo "<p>Actividad económica principal: $actividad</p><br>";
                    echo "<p>Haga <a href='../index.php'>click aquí</a> para consultar los datos almacenados</p>";
                } else{
                    print_r($stmt->errorInfo());
                    echo "<h4>Error, los datos no han podido ser insertados en la BD</h4>";
                }
                
			} catch (PDOException $e) {
				echo $sql."<br>".$e->getMessage();
            }
            
            
        }else{
            echo "<h2>Estado de la BD: Conexión fallida</h2><br>";
        }
    }else {
        echo "<h2>Estado de la BD: No conectada</h2>";
        echo "<h4>Los datos enviados a este sistema no han sido enviados por el formulario o no existen datos para cargar, porfavor intente nuevamente</h4>";
        echo "<p>Para enviar datos por medio del formulario haga <a href='../alta.php?Type=Pais'>click aquí</a></p>";
    }

    ?>
</body>
</html>