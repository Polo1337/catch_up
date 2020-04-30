<?php
session_start();
// TODO: Vérifier que le boolean d'admin du user loggé est à 1 sinon return
if (isset($_SESSION['id_typeuser'])) {
    if ($_SESSION['id_typeuser'] == 1) {
        header('location:index.php');
    } else if ($_SESSION['id_typeuser'] == 2) {
        include 'include/navbar.php';
?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="css/reset.css">

            <!--GOOGLE FONTS-->

            <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu+2:400,500,600,700,800|Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Asap:400,400i,500,500i,600,600i,700,700i|Bellota+Text:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Orbitron:700,800,900|Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
            <script src="functions/select.js"></script>
            <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

            <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
            <link rel="stylesheet" href="css/animate.css">

            <link rel="stylesheet" href="css/owl.carousel.min.css">
            <link rel="stylesheet" href="css/owl.theme.default.min.css">
            <link rel="stylesheet" href="css/magnific-popup.css">

            <link rel="stylesheet" href="css/aos.css">

            <link rel="stylesheet" href="css/ionicons.min.css">

            <link rel="stylesheet" href="css/flaticon.css">
            <link rel="stylesheet" href="css/icomoon.css">
            <link rel="stylesheet" href="css/style.css">
        </head>

        <body>
            <?php include 'include/connectBDD.php'; ?>
            <br><br><br><br>
            <section class="admin">
                <div id="user_profile" class="tabcontent">
                    <h3 class="liens-footer">Mes informations</h3>
                    <p>Nom : <?= $_SESSION['username'] ?></p>
                    <p>mail : <?= $_SESSION['email'] ?></p>
                </div>
                <div id="userInfoEdit" class="tabcontent">
                    <form action="include/userInfoEdit.php" method="POST">
                        <label for="username">Je change de username : </label>
                        <input type="text" placeholder="<?= $_SESSION['username'] ?>" name="username" value=""><br>
                        <label for="email">Je change de mail : </label>
                        <input type="text" placeholder="<?= $_SESSION['email'] ?>" name="email" value=""><br>
                        <input class="ok" type="submit" id='submit' value='Enregistrer les modifications'> <br>
                    </form>
                </div>
            </section>
            <br><br>
            <div id="filmDelete" class="subtabcontent">
                <h3>Supprimer un utilisateur</h3>

                <div class="delete-film">
                    <form action="include/user-delete.php" method="POST">
                        <label for="films"><b>Sélectionner un utilisateur :</b></label>
                        <select name="id_user" id="films">
                            <option selected disabled>Sélectionner...</option>
                            <?php

                            $req = $bdd->prepare('SELECT * FROM user');
                            $req->execute();

                            while ($films = $req->fetch()) {
                            ?>
                                <option value="<?= $films['id_user'] ?>"><?= $films['username'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="submit" value="Supprimer" class="btn-delete">
                    </form>
                    <?php if (isset($_GET['username']) && $_GET['username'] == 'deleted') : ?>
                        <?= "<p class=\"error msg\">Le film a bien été supprimé</p>" ?>
                    <?php endif ?>
                </div>
            </div>
            <br><br>
            <!-- <div id="actorAdd" class="subtabcontent">
                <h3>Ajouter un utilisateur</h3>
        
                <div class="user-insert">
        
                    <form action="include/user-insert.php" method="POST" enctype="multipart/form-data">
        
                        <label for="username">Username</label>
                        <input type="username" id="username" name="username" placeholder="" required><br>
        
                        <label for="email">Mail</label>
                        <input type="email" id="email" name="email" placeholder="" required><br>
        
                        <label for="mdp">Password</label>
                        <input type="mdp" id="mdp" name="mdp" placeholder="" required><br>
        
                        <input type="submit" value="Enregistrer">
                    </form>
                </div>
            </div> -->

        </body>

        </html>






<?php

    } else {
        header('location:index.php');
    }
} else {
    header('location:index.php');
}
