
<?php
require_once 'login.php';
class Main extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        if (isset($_SESSION['login'])){
            $this->view->render('main/index');
        }else{
            header('location:login');
        }
    }  
}

?>