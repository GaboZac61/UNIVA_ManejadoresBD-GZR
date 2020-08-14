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
                <a class="btn btn-primary btn-lg" href="alta.php?Type=Pais" role="button">Dar de alta un país</a>
                <a class="btn btn-primary btn-lg" href="continentes.php" role="button">Gestionar continentes</a>
            </p>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped table-bordered" id="example" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Pais</th>
                    <th class="th-sm">Continente</th>
                    <th class="th-sm">Población (En millones)</th>
                    <th class="th-sm">Moneda</th>
                    <th class="th-sm">Idioma</th>
                    <th class="th-sm">PIB (En millones de USD)</th>
                    <th class="th-sm">Actividad económica principal</th>
                    <th class="th-sm">Editar</th>
                    <th class="th-sm">Eliminar</th>
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
                        $sql = "CALL gestionbd_parcial3.consulta_paises()";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        
                        if ($stmt->rowCount() > 0) {
                            echo "<h5>Datos encontrados</h5>";
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                $id = $row['ID_pais'];
                                $nombre_pais = $row['Nombre_pais'];
                                $nombre_continente = $row['Nombre_Continente'];
                                $poblacion = $row['Poblacion'];
                                $moneda = $row['Moneda'];
                                $idioma = $row['Idioma'];
                                $pib = $row['PIB'];
                                $act_economica = $row['Act_principal'];

                                echo "<tr>
                                <td>$nombre_pais</td>
                                <td>$nombre_continente</td>
                                <td>$poblacion</td>
                                <td>$moneda</td>
                                <td>$idioma</td>
                                <td>$pib</td>
                                <td>$act_economica</td>
                                <td><a href=\"modificar.php?Type=Pais&ID=$id&Nombre_Pais=$nombre_pais&Nombre_Continente=$nombre_continente&Poblacion=$poblacion&Moneda=$moneda&Idioma=$idioma&PIB=$pib&Act_economica=$act_economica\">Editar</a></td>
                                <td><a href=\"eliminar.php?Type=Pais&ID=$id&Nombre_Pais=$nombre_pais&Nombre_Continente=$nombre_continente&Poblacion=$poblacion&Moneda=$moneda&Idioma=$idioma&PIB=$pib&Act_economica=$act_economica\">Eliminar</a></td>
                                </tr>";
                            }
                        } else {
                            echo "<h5>No existen datos dentro de la tabla</h5>";
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