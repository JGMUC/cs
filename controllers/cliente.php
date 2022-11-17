<?php

class Cliente extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->clientes = [];  
    }
    function render(){
        if (isset($_SESSION['login'])){
            $clientes = $this->model->get();
            $this->view->clientes = $clientes;
            $ciudades=$this->model->getCiudades();
            $this->view->ciudades = $ciudades;
            $this->view->render('clientes/index');
        }else{
            header('location:login');
        }
    }
   
    function crearCliente(){
        $razon     = $_POST['razon'];
        $nit	   = $_POST['nit'];
        $rpl       =	  $_POST['rpl'];
        $ciudad    =	  $_POST['ciudad'];
        $correo	   = $_POST['correo'];
        $direccion = 	  $_POST['dir'];
        $estado	   = $_POST['estado'];
        if($this->model->crear(['razon' => $razon, 'nit' => $nit, 'rpl' => $rpl, 'ciud' => $ciudad, 'correo' => $correo, 'direccion' => $direccion, 'estado' => $estado] )){
            $this->view->mensaje = "Cliente creado correctamente";
        }else{
            $this->view->mensaje = "No se pudo actualizar el cliente";
        }
        
        $this->view->render('clientes/index');
    }

    function eliminarCliente($param = null){
        $matricula = $param[0];

        if($this->model->delete($matricula)){
            $mensaje = "Cliente eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar el cliente";
        }
        //$this->render();
        echo $mensaje;
    }
}

?>