<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestión BD - Consulta</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-3">Sistema de gestión BD - Países</h1>
            <p class="lead">Esta página nos sirve para editar la información de los países almacenados en la BD</p>
            <hr class="my-2">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="alta.php?Type=Continente" role="button">Dar de alta un continente</a>
                <a class="btn btn-primary btn-lg" href="index.php" role="button">Gestionar países</a>
            </p>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped table-bordered" id="example" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Continente</th>
                    <th class="th-sm">Expansión de terreno</th>
                    <th class="th-sm">Porcentaje del planeta</th>
                    <th class="th-sm">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    // Try catch para conectar a la BD
                    try {

                        $conn = new PDO('mysql:host=localhost;port=3307;dbname=operaciones', 'root', 'contrasena');
                    
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                    
                    // Try catch para realizar consulta a la BD
                    try {
                        $sql = "SELECT * FROM gestionbd_parcial3.continente";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        
                        if ($stmt->rowCount() > 0) {
                            echo "<h5>Datos encontrados</h5>";
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                $id = $row['ID_Continente'];
                                $nombre_continente = $row['Nombre_Continente'];
                                $expansion = $row['Expansion_Terreno'];
                                $porcentaje = $row['Porcentaje_planeta'];

                                echo "<tr>
                                <td>$nombre_continente</td>
                                <td>$expansion</td>
                                <td>$porcentaje</td>
                                <td><a href=\"modificar.php?Type=Continente&ID=$id&Nombre_Continente=$nombre_continente&Expansion=$expansion&Porcentaje=$porcentaje\">Editar</a></td>
                                </tr>";
                            }
                        } else {
                            echo "<h5>Consulta sin resultados</h5>";
                        }
                    } catch (PDOException $e) {
                        echo $sql."<br>".$e->getMessage();
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('example').DataTable();
        });

        function cargarDatos(nombre_pais, nombre_continente, correo, fechaNacimiento, pais, telefono){
            document.getElementById('modalNombrePais').setAttribute('value',nombre_pais);
            document.getElementById('modalNombreContinente').setAttribute('value',nombre_continente);
        }
    </script>
</body>
</html>