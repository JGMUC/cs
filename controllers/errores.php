<?php
class Errores extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "Hubo un error en la solicitud o no existe la página";
        if (isset($_SESSION['login'])){
            $this->view->render('errores/index');
        }else{
            header('location:login');
        }
    }
}
?>