<?php

namespace Model;

use Core\Database;
use Core\ORM;

class UserModel
{
    private $_email;
    private $_password;
    private $_db;
    public $table = "user";
    
    public function __construct($email, $password)
    {
        $this->_email = $email;
        $this->_password = $password;
        $this->_db = Database::database();
    }

    public function save()
    {
        $email = htmlspecialchars($this->_email);
        $pass_hache = password_hash($this->_password, PASSWORD_DEFAULT);
        $request = $this->_db->prepare("INSERT INTO user (email, password) VALUES (?, ?)");   
        $request->execute(array($email, $pass_hache));
        echo "<p class='message'>" . "Votre compte a bien été créé " . "<br><br>" . "Redirection vers la page de connexion dans 5 secondes..." . "</p>";
        echo "<meta HTTP-EQUIV='REFRESH' content='5; url=login'>"; 

        $request->closeCursor();
    }

    public function connect()
    {
        $request = $this->_db->prepare("SELECT * FROM user WHERE email = :email");
        $request->execute(array('email' => $this->_email));

        $result = $request->fetch();           

        if (!$result) 
        {
            echo "<p class='message'>" . "Mauvais identifiant ou mot de passe" . "</p>";
        } 
        else 
        {
            $isPasswordCorrect = password_verify($this->_password, $result['password']);
            if ($isPasswordCorrect) {

                $_SESSION['email'] = $result['email'];
                echo "<p class='message'>" . "Connexion réussie !" . "<br><br>" . "Redirection vers la page de votre compte dans 5 secondes..." .  "</p>";
                echo "<meta HTTP-EQUIV='REFRESH' content='5; url=profile'>";
            }
            else
            {
                echo "<p class='message'>" . "Mauvais identifiant ou mot de passe" . "</p>";
            }    
        }
        $request->closeCursor();
    }

    public function create()
    {
        $request = $this->_db->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
        $request->execute(array($this->_email, $this->_email));
        $user_id = $this->_db->lastInsertId();

        $request->closeCursor();
    }

    public function read($user_id)
    {
        $request = $this->_db->prepare("SELECT * FROM user WHERE id = $user_id");
        $request->execute();
        $data = $request->fetch();

        $request->closeCursor();
    }

    public function update($column, $value, $user_id)
    {
        $request = $this->_db->prepare("UPDATE user SET $column = $value WHERE id = $user_id");
        $request->execute();

        $request->closeCursor();
    }

    public function delete($user_id)
    {
        $request = $this->_db->prepare("DELETE FROM user WHERE id = $user_id");
        $request->execute();

        $request->closeCursor();
    }

    public function read_all()
    {
        $request = $this->_db->prepare("SELECT * FROM user");
        $request->execute();
        $data = $request->fetch();

        $request->closeCursor();
    }
}

?>