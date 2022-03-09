<?php

require_once './model/usermodel.php';
require_once './helper/helper.php';
require_once './vista/view.php';


class authController
{
    private $model;   
    private $helper;
    private $view;
    public function __construct()
    {
        $this->model = new userModel();      
        $this->helper = new helper();
        $this->view = new view();
    }


    function showRegistro()
    {
        $this->view->renderRegistro();
        if (!empty($_POST['email']) && !empty($_POST['password'])) {  //Verifico si los campos estan vacios o no.
            $userEmail = $_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $this->model->registerUser($userEmail, $userPassword);
        }
    }
    
    function showLogin()
    {
        $this->view->renderLogin();
    }
    
    function logout()  //Termina la sesion.
    {
        session_destroy();
        header("Location: " . BASE_URL . 'home');
        die();
    }

    public function login()  //Verificacion de la cuenta de usuario.
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUser($email);   // Busco el usuario en la BDD.

            if ($user && password_verify($password, $user->password)) { //Verifico si coincide el usuario y la contraseña.
                $this->helper->login($user);  //creo la sesion del usuario.
                header('LOCATION:' . BASE_URL);
            } else {
                echo "Usuario o contraseña invalido.";
            }
        }
    }











}
