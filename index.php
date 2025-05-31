<?php
    include "system/tools.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SisconMR v1.0</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <form class="form" method="post">
        <h2 class="form__title">Iniciar Sesion</h2>
            <?php
                include "system/ValidAccess.php";
            ?>
            <div class="form__container">
                <div class="form__group">
                    <input type="text" id="user" class="form__input" placeholder=" " name="user">
                    <label for="user" class="form__label">Usuario:</label>
                    <span class="form__line"></span>
                </div>
                <div class="form__group">
                    <input type="text" id="password" class="form__input" placeholder=" " name="password">
                    <label for="password" class="form__label">Contraseña</label>
                    <span class="form__line"></span>
                </div>
                <button type="submit" class="form__submit" name="btnIngreso" value="ok">Ingresar</button>
            </div>
    </form>
</body>
</html>