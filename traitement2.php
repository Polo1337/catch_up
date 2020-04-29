<?php
session_start();


//connexion bdd
require_once('class_database.php');

$connexion_bdd = new database('localhost', 'catch', 'root', '');
$bdd = $connexion_bdd->PDOConnexion();

require_once('User2.php');

$pseudo = !empty($_POST['username']) ? $_POST['username'] : NULL;
$mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL;

$user1 = new User2($pseudo, $mdp);
$user1->verifConect($bdd);
