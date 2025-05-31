<?php
    if ( ! empty( $_POST['btnOk'] ) ) {
        if ( CheckAccess( cUserId: $_SESSION['ID'], cAccessCode: ( $_SESSION['MODULE'] . 'CRE' ) ) ) {
            if ( ! empty( $_POST['nombre'] ) and ! empty( $_POST['password'] ) ) {
                $oConexion = CreateConnection();
                if ( ! $oConexion->connect_errno) {
                    $cNombre    = $_POST['nombre'];
                    $cMovil     = $_POST['movil'];
                    $cCorreo    = $_POST['correo'];
                    $cPassword  = $_POST['password'];
                    $oResult    = $oConexion->query( query: "insert into usuarios (nombre,movil,correo,contrasena) values ('$cNombre','$cMovil','$cCorreo','$cPassword' )" );
                    $oConexion->close();
                    if ( $oResult !=1 ) {
                        echo '<div class="alert alert-danger">Error al crear el registro</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Error al conectarse a la base de datos</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Informacion incompleta</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Acceso denegado a crear registros</div>';
        }
    }
    ?>