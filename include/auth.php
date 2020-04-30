<?php
session_start();
// TODO: Vérifier que le boolean d'admin du user loggé est à 1 sinon return
if (isset($_SESSION['id_typeuser'])) {
    if ($_SESSION['id_typeuser'] == 1) {
        header('location:../index.php');
    } else if ($_SESSION['id_typeuser'] == 2) {
        header('location:../admin.php');
    } else {
        header('location:../index.php');
    }
} else {
    header('location:../index.php');
}
