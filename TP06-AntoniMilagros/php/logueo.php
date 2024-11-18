<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    //hacer cuestiones
    require_once 'conexion.php';
    $conexion = conectar();
    if ($conexion) {
        $usu = $_POST['username'];
        $clave = sha1($_POST['password']);
        $consulta = 'SELECT usuario, pass, foto
        FROM usuario 
        WHERE usuario = ? AND pass = ?';
$sentencia = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($sentencia, 'ss', $usu, $clave);
$q = mysqli_stmt_execute($sentencia);
mysqli_stmt_bind_result($sentencia, $usuarioBD, $claveBD, $fotoBD);

if ($q){
    mysqli_stmt_fetch($sentencia);
    echo '<p> Usuario y Contraseña Correctos --> <strong>Usuario ingresado: ' . $usuarioBD . '</strong></p>
    <p> Redirigiendo al listado de artículos... </p>';
    header('refresh:3;url=articulo_listado.php?usu=' . $usuarioBD . '&' . 'fot=' . $fotoBD);

desconectar($conexion);
    } else {
        echo '<p>Error, Usuario y/o Contraseña incorrectos</p>';
        header("refresh:2;url=../index.php");
    }
} else {
    echo '<p> Error al intentar conectar a la base de datos </p>';
    header("refresh:2;url=../index.php");
}
} else {
    echo '<p>Ingrese usuario y contraseña</p>';
    header("refresh:2;url=../index.php");
}

?>