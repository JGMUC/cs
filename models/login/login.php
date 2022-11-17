<?php
    require 'usuarioShema.php';
    class loginModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function get($usuario,$password){
            $item = new UsuarioSchema();
            $hash = md5($password);
            $query = $this->db->connect()->prepare("SELECT * FROM usuarios where usu_estado='A' and usu_pass=:pass and usu_codigo=:codigo");
            try{
                $query->execute(['pass' => $hash,
                                 'codigo'=> $usuario]);
                while($row = $query->fetch()){
                        $item->id = $row['usu_id'];
                        $item->rol    = $row['usu_rol'];
                        $item->nombres  = $row['usu_nombres'];
                        $item->apellidos  = $row['usu_apellidos'];
                }
                return $item;
            }catch(PDOException $e){
                return null;
            }
        }
    }
?>