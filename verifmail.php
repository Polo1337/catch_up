<?php

require_once("User.php");
require_once("class_database.php");

$token = $_GET['validation_token'];
$conect = new Database("localhost", "catch", "root", "");
$bdd = $conect->PDOConnexion();


$req = $bdd->prepare("SELECT * FROM user WHERE validation_token = ?");
$req->execute([$token]);
$count = $req->rowCount();
if ($count > 0) {
    $req = $bdd->prepare("UPDATE user SET valid = ? WHERE validation_token = ?");
    $req->execute([1, $token]);
    echo "Le mail a bien été validé connectez vous pour acceder a la page admin <br>";
    echo '<a href="index.php">COnectez vous</a>';
}
