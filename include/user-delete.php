<?php
session_start();

include 'connectBDD.php';

$id_user = !empty($_POST['id_user']) ? $_POST['id_user'] : NULL;

$delete = $bdd->prepare("DELETE FROM user WHERE id_user=:id_user");
$delete->execute(array('id_user' => $id_user));

header("Location: ../index.php");
