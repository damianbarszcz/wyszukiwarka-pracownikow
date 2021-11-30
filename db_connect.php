<?php
     $serverName = "DESKTOP-6EAU1JT"; // Proszę wskazać własną nazwę serwera

     $connectionInfo = array( "Database"=>"system"); // Nazwa bazy danych (system) jeśli inna proszę zmienić 
     $connect = sqlsrv_connect( $serverName, $connectionInfo);

     if( !$connect ) {
          echo "Nie udało się nawiązać połączenia.<br />";
          die( print_r( sqlsrv_errors(), true));
     }
?>