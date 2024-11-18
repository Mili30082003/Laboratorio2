<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP06 (LAB2)</title>
    <link rel="stylesheet" href="<?php echo $ruta ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $ruta ?>css/estilo.css">
</head>
<body>
    <header class="d-flex justify-content-end align-items-center p-3">
        <p class="me-3 mb-0">
            <strong>
                Bienvenido/a, 
                <?php 
                // Verifica si el parámetro 'usu' está presente en la URL
                if (isset($_GET['usu']) && !empty($_GET['usu'])) {
                    echo htmlspecialchars($_GET['usu']); // Evita inyecciones de código
                } else {
                    echo 'Invitado/a'; // Valor predeterminado si no se proporciona
                }
                ?>!
            </strong>
        </p>

        <img src="../img/usuarios/<?php 
        // Verifica si 'fot' está presente y el archivo existe
        if (isset($_GET['fot']) && !empty($_GET['fot']) && file_exists('../img/usuarios/' . $_GET['fot'])) {
            echo htmlspecialchars($_GET['fot']); // Evita inyecciones de código
        } else {
            echo 'usuario_default.png'; // Imagen predeterminada
        }
        ?>" 
        alt="Foto de usuario" 
        style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
    </header>
</body>
</html>
