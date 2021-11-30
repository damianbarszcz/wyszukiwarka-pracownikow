<?php
        require_once('db_connect.php');

       $getMonth = $_GET['month'];
       $nr=1;

       $result =sqlsrv_query($connect,"SELECT DISTINCT  p.Imie, p.Nazwisko, r.RodzajUrlopu FROM Urolpy$ u, Pracownicy$ p, RodzajeUrlopow$ r  
       WHERE p.id = u.idPracownika AND u.RodzajUrlopu = r.id  AND ((MONTH(u.PoczatekUrlopu) = $getMonth OR MONTH(u.KoniecUrlopu) = $getMonth) OR 
       ($getMonth BETWEEN MONTH(u.PoczatekUrlopu) AND MONTH(u.KoniecUrlopu)))", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));

       $num_rows = sqlsrv_num_rows($result);

       echo  "<span>Liczba pracowników:</span> " .  $num_rows . "<br />";

       while ( $record = sqlsrv_fetch_array($result) ) {
               echo  $nr ."." . " " .  "<strong>". utf8_encode($record["Imie"])  . " " . utf8_encode($record["Nazwisko"])  . "</strong>" .  " - " .  utf8_encode($record["RodzajUrlopu"]) . "<br />";
               $nr++;
       }

       sqlsrv_close($connect);  
?>