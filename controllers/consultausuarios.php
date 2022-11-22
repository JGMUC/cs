<?php
class consultaUsuarios extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->consultausuarios = [];  
    }
    function render(){
        if (isset($_SESSION['login'])){
            $usuarios = $this->model->get();
            $this->view->consultausuarios = $usuarios;
            $this->view->render('consultausuarios/index');
        }else{
            header('location:login');
        }   
    }
}

?>