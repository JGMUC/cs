<?php
class consultaClientes extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->consultaclientes = [];  
    }
    function render(){
        if (isset($_SESSION['login'])){
            $clientes = $this->model->get();
            $this->view->consultaclientes = $clientes;
            $this->view->render('consultaclientes/index');
        }else{
            header('location:login');
        }
    }
}
?>