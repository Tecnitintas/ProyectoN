<?php
    if ( ! empty( $_POST['btnIngreso'] ) ) {
        if ( empty( $_POST['user'] ) or empty( $_POST['password'] ) ) {
            echo '<div class="alert alert-warning">Informacion incompleta</div>';
        } else {
            $oConexion = CreateConnection();
            if ( ! $oConexion->connect_errno ) {
                $cUsuario   = $_POST['user'];
                $cPassword  = $_POST['password'];
                $oResult    = $oConexion->query( query: "select * from usuarios where nombre='$cUsuario' and contrasena='$cPassword'" );
                if ( $aData = $oResult->fetch_object() ) {
                    session_start();
                    $_SESSION['ID']     = $aData->id;
                    $_SESSION['USER']   = $aData->nombre;
                    $_SESSION['MODULE'] = '';
                    $oConexion->close();
                    header( header: 'Location: system/menu.php' );
                } else {
                    echo '<div class="alert alert-warning">Usuario o contraseña no valida</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Error al conectarse a la base de datos</div>';
            }
        }
    }
?>