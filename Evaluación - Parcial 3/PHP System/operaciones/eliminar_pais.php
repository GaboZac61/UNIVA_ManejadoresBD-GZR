<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestión BD - Modulo de insersión de Paises</title>
</head>
<body>
    <?php

    if (isset($_GET['Eliminar'])) {

        //Crear conexión a base de datos si los datos se enviaron desde el formulario
        try {
            $conn = new PDO('mysql:host=localhost;port=3307;dbname=gestionbd_parcial3', 'root', 'contrasena');
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        if ($conn==true){
            echo "<h2>Estado de la BD: Conectada</h2><br>";

            //Extraer datos enviados por el formulario y asignarlos a variables
            $id = $_GET['id_pais'];

            try {
				$sql = "CALL eliminar_pais($id, @status);";
                $stmt = $conn->prepare($sql);
                print_r($stmt);

                if ($stmt->execute()){

                    $sql = 'SELECT @status;';
                    $stmt = $conn->prepare($sql);
                    print_r($stmt);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            foreach($row as $value){
                                $status = $value;
                            }
                        }
                    }

                    if ($status == 1) {
                        echo "<h4>Datos eliminados de la BD con éxito</h4>";
                        echo "<p>Haga <a href='../index.php'>click aquí</a> para consultar los datos almacenados</p>";
                    }else{
                        echo "<h4>ERROR: El ID solicitado no ha podido ser localizado / El país no existe</h4>";
                        echo "<p><a href='../index.php'>Volver</a></p>";
                    }
                } else{
                    print_r($stmt->errorInfo());
                    echo "<h4>Error, los datos no han podido ser eliminados de la BD</h4>";
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
        echo "<p>Para enviar datos por medio del formulario haga <a href='../index.php'>click aquí</a></p>";
    }

    ?>
</body>
</html>