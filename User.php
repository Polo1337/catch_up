<?php
class User
{
    private $username;
    private $email;
    private $mdp;
    private $token;
    private $valid;

    public function __construct($username, $email, $mdp)
    {
        $this->username = $username;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->token = substr(str_shuffle(str_repeat("0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN", 40)), 0, 40);
        $this->valid = 0;
    }



    public function verifToken($bdd)
    {
        $bool = false;
        $req = $bdd->prepare("SELECT valid FROM user WHERE username = ?");
        $req->execute([$this->username]);
        $valid = $req->fetch();
        if ($valid['valid'] == "1") {
            $bool = true;
        }
        return $bool;
    }


    public function inscription($bdd)
    {
        if ((!empty($this->email)) && (!empty($this->mdp))) {
            $req = $bdd->prepare("SELECT * FROM user WHERE email = ?");
            $req->execute([$this->email]);
            $count = $req->rowCount();
            if ($count == 0) {
                $req = $bdd->prepare("INSERT INTO user SET username = ?, email = ?, mdp = ?, validation_token = ?, id_typeuser = 1");
                $req->execute([$this->username, $this->email, $this->mdp, $this->token]);
                echo "Inscription reussie <br> verifiez votre mail";
                echo '<a href="index.php">Retournez a lacceuil</a>';
                // envoyer le mail (a faire)
            } else {
                echo "mail deja pris";
                echo '<a href="connexion.php">Réésayez</a>';
            }
        } else {
            echo "erreur";
        }
    }
}
