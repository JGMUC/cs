<?php

require 'models/consultausuarios/usuarioshema.php';

class consultausuariosModel extends Model{

    public function __construct(){
        parent::__construct();
    }
    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT usu_id,rol_nombre usu_rol,usu_codigo,usu_nombres,usu_apellidos,usu_correo,usu_documento,usu_fecha_nacimiento,usu_estado,usu_telefono FROM usuarios,roles where usu_rol=rol_id and usu_estado='A'");
            while($row = $query->fetch()){
                $item = new UsuarioSchema();
                $item->id = $row['usu_id'];
                $item->rol    = $row['usu_rol'];
                $item->codigo  = $row['usu_codigo'];
                $item->nombres  = $row['usu_nombres'];
                $item->apellidos  = $row['usu_apellidos'];
                $item->correo  = $row['usu_correo'];
                $item->documento  = $row['usu_documento'];
                $item->fechaNaci  = $row['usu_fecha_nacimiento'];
                $item->estado  = $row['usu_estado'];
                $item->telefono  = $row['usu_telefono'];
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }


}

?>