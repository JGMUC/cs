<?php

class Usuario extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->usuarios = [];  
    }

    function render(){
        if (isset($_SESSION['login'])){
            $usuarios = $this->model->get();
            $this->view->usuarios = $usuarios;
            $roles=$this->model->getRoles();
            $this->view->roles = $roles;
            $this->view->render('usuarios/index');
        }else{
            header('location:login');
        }
       
    }

    function actualizarUsuario(){
        session_start();
        if($this->model->update()){
            // actualizar usuario exito
          
        }else{
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el usuario";
        }
        $this->view->render('usuarios/index');
    }
    function crearUsuario(){
        $rol     = $_POST['rol'];
        $codigo	 = $_POST['codigo'];
        $nombres =	  $_POST['nombres'];
        $apellido =	  $_POST['apellido'];
        $correo	  = $_POST['correo'];
        $documento= 	  $_POST['documento'];
        $fechaNaci=	  $_POST['fechaNaci'];
        $estado	  = $_POST['estado'];
        $pass	  = $_POST['pass'];
        $telefono	  = $_POST['telefono'];
        if($this->model->crear(['rol' => $rol, 'codigo' => $codigo, 'nombres' => $nombres, 'apellido' => $apellido, 'correo' => $correo, 'documento' => $documento, 'fechaNaci' => $fechaNaci, 'telefono' => $telefono,'pass' => $pass,'estado' => $estado] )){
            $this->view->mensaje = "Usuario creado correctamente";
        }else{
            $this->view->mensaje = "No se pudo crear el usuario";
        }
        
        $this->view->render('usuarios/index');
    }

    function eliminarUsuario($param = null){
        $id = $param[0];

        if($this->model->delete($id)){
            $mensaje = "Usuario eliminado correctamente";
        }else{
            $mensaje = "No se pudo eliminar el usuario";
        }
        //$this->render();
        
        echo $mensaje;
    }
}

?>