<?php
session_start();
header('Content-type: text/html; charset=utf-8');
?>
<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Read<i>it</i>.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="blog.php" class="nav-link">Articles</a></li>
                <?php if (!(isset($_SESSION['username']))) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion / Inscription</a>
                    </li>
                <?php else : ?>
                    <li><a href="deconnect.php">Deconexion</a>
                        <a href="include/formADMIN.php">
                            <h4> Bonjour <?php echo $_SESSION['username'] ?></h4>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>