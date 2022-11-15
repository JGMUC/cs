<?php

class Usuario extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->usuarios = [];  
    }

    function render(){
        $usuarios = $this->model->get();
        $this->view->usuarios = $usuarios;
        $roles=$this->model->getRoles();
        $this->view->roles = $roles;
        $this->view->render('usuarios/index');
    }

    function actualizarUsuario(){
        session_start();
        // $matricula = $_POST['id'];
        // $nombre    = $_POST['nombre'];
        // $apellido  = $_POST['apellido'];

        unset($_SESSION['id_verAlumno']);

        if($this->model->update(['matricula' => $matricula, 'nombre' => $nombre, 'apellido' => $apellido] )){
            // actualizar alumno exito
            // $alumno = new UsuarioSchema();
            // $alumno->matricula = $matricula;
            // $alumno->nombre = $nombre;
            // $alumno->apellido = $apellido;
            
            // $this->view->alumno = $alumno;
            // $this->view->mensaje = "Alumno actualizado correctamente";
        }else{
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el alumno";
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
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el alumno";
        }
        
        $this->view->render('usuarios/index');
    }

    function eliminarAlumno($param = null){
        $matricula = $param[0];

        if($this->model->delete($matricula)){
            //$this->view->mensaje = "Alumno eliminado correctamente";
            $mensaje = "Alumno eliminado correctamente";
        }else{
            // mensaje de error
            //$this->view->mensaje = "No se pudo eliminar el alumno";
            $mensaje = "No se pudo eliminar el alumno";
        }
        //$this->render();
        
        echo $mensaje;
    }
}

?>