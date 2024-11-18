<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Artículos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $ruta = '../';
        require("encabezado.php");
    ?>

    <main class="container">
        <section>
            <article class="row text-center">
                <section class="menu_tmp pt-3 pb-3">
                    <a class="btn btn-dark" href="articulo_alta.php">+ Alta Articulo</a>
                </section>
                <section class="d-flex justify-content-center">
                    <table class="table table-bordered table-hover table-striped w-auto">
                        <caption class="caption-top text-center bg-dark text-white">Listado de artículos</caption>
                        <tr>
                            <th class="bg-secondary text-white">Foto</th>
                            <th class="bg-secondary text-white">Producto</th>
                            <th class="bg-secondary text-white">Categoría</th>
                            <th class="bg-secondary text-white">Precio</th>
                        </tr>
                        
                        <tbody>
                        <?php
                            include 'conexion.php'; // Asegúrate de que este archivo esté en el mismo directorio

                            $conexion = conectar();
                            
                            if ($conexion) {
                                $sql = "SELECT * FROM articulo";
                                $resultado = mysqli_query($conexion, $sql);
                            
                                if ($resultado) {
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<tr>";
                                        echo "<td><img src='../img/articulos/" . ($fila['foto'] ? $fila['foto'] : 'default.jpg') . "' alt='" . $fila['nombre'] . "' width='100'></td>";
                                        echo "<td>" . $fila['nombre'] . "</td>";
                                        echo "<td>" . $fila['categoria'] . "</td>";
                                        echo "<td>$" . number_format($fila['precio'], 2, ',', '.') . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo '<p>Error al ejecutar la consulta.</p>';
                                }
                            
                                desconectar($conexion);
                            } else {
                                echo '<p>No se pudo conectar a la base de datos.</p>';
                            }
                        ?>
                        </tbody>
                    </table>
                </section>
            </article>
        </section>
    </main>

    <?php
        require("pie.php");
    ?>
</body>
</html>
