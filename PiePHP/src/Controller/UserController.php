<?php

namespace Controller;

use Model\UserModel;
use Core\Controller;

class UserController extends Controller
{
    public function addAction()
    {
        // echo "Je suis la fonction addAction de UserController!";
    }
    
    public function indexAction()
    {
        echo "Je suis la fonction indexAction de UserController!";
    }
    
    public function registerAction()
    {
        $this->render('register');
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $register = new UserModel($_POST['email'], $_POST['password']);
            $register->save();
        }
    }

    public function loginAction()
    {
        $this->render('login');
        if (isset($_POST['email']) && isset($_POST['password']))
        {
        $register = new UserModel($_POST['email'], $_POST['password']);
        $register->connect();
        }
    }

    public function profileAction()
    {
        $this->render('profile');
    }
}

?>