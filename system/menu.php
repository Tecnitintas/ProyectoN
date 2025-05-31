<?php
    session_start();
    if ( empty( $_SESSION['USER'] ) ){
        header( header: 'Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
    <header class="header">
        <h1>SisconMR</h1>
        <div class="usuario">
            <img src="..assets/user-circle-regular-24.png" alt="Usuario logueado">
        </div>
        <div class="salir">
            <a href="../index.php">salir</a>
        </div>
    </header>
    <nav class="navbar">
        <ul class="menu">
            <li><a href="equipos.php" target="ifrMenu">Equipos</a></li>
            <li><a href="repuestos.php" target="ifrMenu">Repuestos</a></li>
            <li><a href="mensajes.php" target="ifrMenu">Mensajes</a></li>
            <li><a href="usuarios.php" target="ifrMenu">Usuarios</a></li>
        </ul>
    </nav>
    <main>
        <iframe name="ifrMenu" src="" frameborder="0"></iframe>
    </main>    
</body>
</html>