<?php
session_start();

include 'connectBDD.php';

$username = !empty($_POST['username']) ? $_POST['username'] : NULL;
$email = !empty($_POST['email']) ? $_POST['email'] : NULL;

$sql = $bdd->prepare("UPDATE user
                            SET
                            username = (:username),
                            email = (:email)
                            WHERE id_user = (:id_user)");


$sql->execute(array(
    'username' => $username,
    'email' => $email,
    'id_user' => $_SESSION['id_user']
));

$_SESSION['username'] = $username;
$_SESSION['email'] = $email;

$sql->closeCursor();
header('location:../index.php');
