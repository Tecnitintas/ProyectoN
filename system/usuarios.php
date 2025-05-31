<?php
    session_start();
    if ( empty( $_SESSION['USER'] ) ) {
        header( header: 'Location: ../index.php' );
    } else {
        $_SESSION['MODULE'] = '01';
        include "tools.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eadf92e061.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/tools.js"></script>
</head>
<body>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="post">
            <h5 class="text-center alert alert-secundary">Registro de Usuario</h5>
            <?php
                include "usuarios-CR.php";
                include "usuarios-DEL.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Celular</label>
                <input type="text" class="form-control" name="movil">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="correo">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="btnOK" value="ok">Crear Registro</button>
        </form>
        <div class="col-8 p-4">
            <table class="table table-striped">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">Id #</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $oConexion = CreateConnection();
                        if ( ! $oConexion->connect_errno ) {
                            $oResult = $oConexion->query( query: "select * from usuarios order by Nombre" );
                            while ( $aData = $oResult->fetch_object() ) { ?>
                            <tr>
                                <th><?= $aData->id ?></th>
                                <td><?= $aData->nombre ?></td>
                                <td><?= $aData->movil ?></td>
                                <td><?= $aData->correo ?></td>
                                <td>
                                    <a href="usuarios-EDE.php?id=<?= $aData->id ?>" class="btn btn-small"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="usuarios.php?id=<?= $aData->id ?>" class="btn btn-small btn-danger" onclick="return ShowConfirm( 1 "><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php }
                        $oConexion->close();
                        } else {
                            echo '<div class="alert alert-danger">Error al conectarse a la base de datos</div>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>