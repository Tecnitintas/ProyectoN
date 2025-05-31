<?php
    $xRecord = $_GET['id'];
    include "tools.php";
    $oConexion = CreateConnection();
    $oResult   = $oConexion->query( query: "select * from usuarios where id='$xRecord'" );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form class="col-4 p-3" method="post">
        <h5 class="text-center alert alert-secondary">Modificacion de Usuario</h5>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>"
        <?php
            include "usuarios-EDW.php";
            while ( $aData = $oResult->fetch_object() ) { ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $aData->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Celular</label>
                    <input type="text" class="form-control" name="movil" value="<?= $aData->movil ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="correo" value="<?= $aData->correo ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" value="<?= $aData->contrasena ?>">
                </div>
            <?php }
            $oConexion->close();
        ?>
        <button type="submit" class="btn btn-primary" name="btnOk" value="ok">Modificar registro</button>
    </form>
</body>
</html>