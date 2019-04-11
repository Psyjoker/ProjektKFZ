<?php
    $pdo = new PDO('mysql:host=localhost;dbname=dbkfz', 'root', '');

    $sql = "UPDATE kunde SET anzeige='nein' WHERE kundennummer='$_GET['kundennummer']'";
?>
