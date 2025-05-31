<?php
    if ( ! empty( $_GET['id'] ) ) {
        if ( CheckAccess( cUserId: $_SESSION['ID'], cAccessCode: ( $_SESSION['MODULE'] . 'DEL' ) ) ) {
            $iId        = $_GET['id'];
            $oConexion  = CreateConnection();
            $oResult    = $oConexion->query( query: "delete from usuarios where id='$iId'" );
            $oConexion->close();
            if ( $oResult !=1) {
                echo '<div class="alert alert-danger">Error al eliminar registro</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Acceso denegado a eliminar registros</div>';
        }
    }
?>