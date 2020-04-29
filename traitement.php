<?php
session_start();


//connexion bdd
require_once('class_database.php');
require_once("User.php");
$connexion_bdd = new database('localhost', 'catch', 'root', '');
$bdd = $connexion_bdd->PDOConnexion();

$pseudo = $_POST['username'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$user1 = new User($pseudo, $email, $mdp);
$user1->inscription($bdd);
