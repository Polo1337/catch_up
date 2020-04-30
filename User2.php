<?php
class User2
{
    private $username;
    private $email;
    private $mdp;
    private $token;
    private $valid;

    public function __construct($username, $mdp)
    {
        $this->username = $username;
        $this->mdp = $mdp;
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


    public function verifConect($bdd)
    {
        $req = $bdd->prepare("SELECT * FROM user WHERE username = ? AND mdp = ?");
        $req->execute([$this->username, $this->mdp]);
        $donnee = $req->fetch();

        $this->email = $donnee['email'];
        $id_user = $donnee['id_user'];
        $id_typeuser = $donnee['id_typeuser'];
        $count = $req->rowCount();

        if ($count > 0) {
            $bool = $this->verifToken($bdd);
            if ($bool == true) {
                session_start();
                $this->valid = 1;
                $_SESSION['username'] = $this->username;
                $_SESSION['mdp'] = $this->mdp;
                $_SESSION['validation_token'] = $this->valid;
                $_SESSION['email'] = $this->email;
                $_SESSION['id_user'] = $id_user;
                $_SESSION['id_typeuser'] = $id_typeuser;
                header("location:index.php");
            } else {
                echo "verifiez la confirmation de votre adresse mail <br>";
                echo '<a href="index.php">Retournez a lacceuil</a>';
            }
        } else {

            //Mauvais identifiant ou mauvais tout cours
            header("location:index6.php");
        }
    }
}
