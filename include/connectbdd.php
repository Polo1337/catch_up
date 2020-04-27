<?php
try {
    $servername = "db5000303644.hosting-data.io";
    $user = "dbu526586";
    $pass = "u:Z2H^7n";
    $dbname = "dbs296631";
    // Je me connecte à ma bdd
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    // En cas d'erreur, un message s'affiche et tout s'arrête
    die('Erreur : ' . $e->getMessage());
}
