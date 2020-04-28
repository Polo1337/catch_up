<?php

class user
{
    protected $username;
    protected $mdp;
    protected $_email;

    public function __construct($username, $mdp)
    {
        $this->username = $username;
        $this->mdp = $mdp;
    }

    //getters
    public function getUsername()
    {
        return $this->username;
    }

    public function getmdp()
    {
        return $this->mdp;
    }


    //setters
    public function setUsername($Username)
    {
        $this->username = $Username;
    }
    public function setmdp($mdp)
    {
        $this->mdp = $mdp;
    }




    public function connexion($bdd)
    {
        $Username = $this->username;
        $mdp = $this->mdp;
        $req = $bdd->prepare("SELECT * FROM user WHERE username = :username AND mdp = :mdp");
        $req->execute(array(
            'username' =>  $this->username,
            'mdp' => $this->mdp
        ));

        $count = $req->rowCount();
        if ($count > 0) {
            session_start();
            $_SESSION['username'] =  $this->username;
            $_SESSION['mdp'] = $this->mdp;
            header("location:index.php");
        } else {
            echo "Mauvais Username ou mdp <br>";
            echo "<a href='index.php'>Retour</a>";
        }
    }
}
