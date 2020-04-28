<?php

class signup
{
    protected $_username;
    protected $_mdp;
    protected $_email;

    public function __construct($_username, $_mdp, $_email)
    {
        $this->_username = $_username;
        $this->_mdp = $_mdp;
        $this->_email = $_email;
    }

    //getters
    public function getUsername()
    {
        return $this->_username;
    }

    public function getmdp()
    {
        return $this->_mdp;
    }

    public function getEmail()
    {
        return $this->_email;
    }


    //setters
    public function setUsername($username)
    {
        $this->_username = $username;
    }
    public function setmdp($mdp)
    {
        $this->_mdp = $mdp;
    }

    public function setEmail($Email)
    {
        $this->_email = $Email;
    }




    public function inscription($bdd)
    {
        $username = $this->_username;
        $mdp = $this->_mdp;
        $email = $this->_email;
        $req = $bdd->prepare("INSERT INTO user (username, email, mdp, id_typeuser)
                            VALUES (:username, :email, :mdp, 2) ");
        $req->execute(array(
            'username' => $this->_username,
            'mdp' => $this->_mdp,
            'email' => $this->_email,
        ));

        header("location:success.php");
    }
}
