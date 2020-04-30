<?php

include 'connectBDD.php';

$username = !empty($_POST['username']) ? $_POST['username'] : NULL;
$mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL;
$email = !empty($_POST['email']) ? $_POST['email'] : NULL;


$sql = $bdd->prepare("INSERT INTO user ('username', 'mdp', 'email')
                            VALUES (:username, :mdp, :email, :id_typeuser = 2 )");

$sql->execute(array(
    'username' => $username,
    'mdp' => $mdp,
    'email' => $email,
));

$sql->closeCursor();
header('location:../index.php');
