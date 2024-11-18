<?php

function conectar() {
    $servidor = 'localhost';
    $usuario = 'root';
    $clave = '';
    $baseDatos = 'labo2';

    try {
        // Intenta conectar
        $conexion = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

        if (!$conexion) {
            throw new Exception("Error al conectar con la base de datos: " . mysqli_connect_error());
        }

        return $conexion;
    } catch (Exception $e) {
        // Mensaje de error al administrador
        echo '<p>Error al conectar a la base de datos. Comuníquese con el administrador.</p>';
        error_log($e->getMessage()); // Registra el error en el log del servidor
        return false;
    }
}

function desconectar($conexion) {
    if ($conexion) {
        mysqli_close($conexion);
    } else {
        echo '<p>No hay conexión abierta para cerrar.</p>';
    }
}
?>
