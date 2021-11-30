<?php
        require_once('db_connect.php');

        $getDate=$_GET['day'];
        $getVacation = $_GET['vacation'];
        $nr=1;

        $result =sqlsrv_query($connect,"SELECT DISTINCT p.Imie, p.Nazwisko FROM Urolpy$ u, Pracownicy$ p 
        WHERE  '$getDate' >= u.PoczatekUrlopu AND '$getDate'<= u.KoniecUrlopu  AND p.id = u.idPracownika AND u.RodzajUrlopu = $getVacation", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
 
        $num_rows = sqlsrv_num_rows($result);

        echo  "<span>Liczba pracowników:</span> " .  $num_rows . "<br />";

        while ( $record = sqlsrv_fetch_array($result) ) {
                echo  $nr ."." . " " .  "<strong>". utf8_encode($record["Imie"])  . " " . utf8_encode($record["Nazwisko"])  . "</strong>". "<br />";
                $nr++;
        }
 
        sqlsrv_close($connect);  
?>