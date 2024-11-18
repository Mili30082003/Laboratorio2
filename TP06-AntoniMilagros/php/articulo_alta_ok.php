<?php 
if (!empty($_FILES['imagen']['size']) && !empty($_POST['precio']) && !empty($_POST['categoria']) && !empty($_POST['nombre'])) 
{
    require_once'conexion.php';
    $conexion = conectar();
    if ($conexion) {
        $fotoArtAlt = $_FILES['foto']['name'];
        $precioArtAlt = $_POST['precio'];
        $categArtAlt = $_POST['categoria'];
        $nombreArtAlt = $_POST['nombre'];
        $consulta = 'INSERT INTO articulo(foto, precio, categoria, nombre)
        VALUES (?, ?, ?, ?)';

        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'ssss', $fotoArtAlt, $precioArtAlt, $categArtAlt, $nombreArtAlt);
        $q = mysqli_stmt_execute($sentencia);

        if ($q) {
            echo 'Guardado exitoso!';
        } else {
            echo 'Error al guardar';
        }
        desconectar($conexion);
}
} else {
    echo 'Debe ingresar datos en el formulario';
    header ('refresh:3;url=articulo_alta.php');
}
?>