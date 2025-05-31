<?php
    function CreateConnection(): mysqli {

        $oReturn = new mysqli( hostname: "Localhost", username: "root", password: "", database: "Sysconmr" );

        return $oReturn;

    }
    function CheckAccess( $cUserId, $cAccessCode ): bool {

        return true;

    }
?>