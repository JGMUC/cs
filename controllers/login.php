<?php
session_start();
class Login extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->login = [];  
    }
    function render(){
        $this->view->render('login/index');
    }
    function validarUsuario(){  
        $this->view->mensaje='';
        $usuCodigo=trim($_POST['codigo']);
        $usuPass=trim($_POST['pass']);
        $usuario = $this->model->get($usuCodigo,$usuPass);
        if ($usuario->id){
            $_SESSION['login']=$usuCodigo;
            header('location:/main');
        }else{
            $this->view->mensaje='Usuario o contraseña inválidos';
            $this->view->render('login/index');
        }                
    }
    function logOut(){  
        unset($_SESSION['login']);
        session_destroy();
        header('location:/login');           
    }
}
?>