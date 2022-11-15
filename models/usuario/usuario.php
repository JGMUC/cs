<?php

require 'models/usuario/usuarioshema.php';
require 'models/usuario/rolshema.php';
class usuarioModel extends Model{

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

    public function getRoles(){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT * FROM roles where rol_estado='A'");
            while($row = $query->fetch()){
                $item = new RolSchema();
                $item->id = $row['rol_id'];
                $item->rol    = $row['rol_nombre'];
                $item->estado  = $row['rol_estado'];
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function getById($id){
        $item = new UsuarioSchema();

        $query = $this->db->connect()->prepare("SELECT * FROM usuarios where usu_estado='A' and usu_id=:id");
        try{
            $query->execute(['id' => $id]);
            while($row = $query->fetch()){
                    $item->id = $row['usu_id'];
                    $item->rol    = $row['usu_rol'];
                    $item->codigo  = $row['usu_codigo'];
                    $item->nombres  = $row['usu_nombres'];
                    $item->apellidos  = $row['usu_apellidos'];
                    $item->correo  = $row['usu_correo'];
                    $item->documento  = $row['usu_documento'];
                    $item->fechaNaci  = $row['usu_fecha_nacimiento'];
                    $item->estado  = $row['usu_estado'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE usuarios SET usu_rol = :rol, usu_codigo = :codigo , usu_nombres = nombres, usu_apellidos=apellidos,usu_correo= correo,usu_documento=documento,usu_fecha_nacimiento=fechaNaci ,usu_estado=estado  WHERE usu_id = :id");
        try{
            $query->execute([
                'id'=> 	  $item['id'], 
                'rol'=>	  $item['rol'],
                'codigo'=>	  $item['codigo'],
                'nombres'=>	  $item['nombres'],
                'apellido'=>	  $item['apellido'],
                'correo'=>	  $item['correo'],
                'documento'=>	  $item['documento'],
                'fechaNaci'=>	  $item['fechaNaci'],
                'estado'=>	  $item['estado']

            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
    public function crear($item){
        $query = $this->db->connect()->prepare("insert into usuarios(usu_rol,usu_codigo,usu_nombres,usu_apellidos,usu_correo,usu_documento,usu_fecha_nacimiento,usu_estado,usu_telefono,usu_pass) values(:rol,:codigo,:nombres,:apellido,:correo,:documento,:fechaNaci ,:estado,:telefono,:pass)");
        $query->bindParam(':rol',$item['rol'],PDO::PARAM_INT);
        $query->bindParam(':codigo',$item['codigo'],PDO::PARAM_STR);
        $query->bindParam(':nombres',$item['nombres'],PDO::PARAM_STR);
        $query->bindParam(':apellido',$item['apellido'],PDO::PARAM_STR);
        $query->bindParam(':correo',$item['correo'],PDO::PARAM_STR);
        $query->bindParam(':documento',$item['documento'],PDO::PARAM_STR);
        $query->bindParam(':fechaNaci',$item['fechaNaci'],PDO::PARAM_STR);
        $query->bindParam(':telefono',$item['telefono'],PDO::PARAM_STR);
        $query->bindParam(':estado',$item['estado'],PDO::PARAM_STR);
        $query->bindParam(':pass',$item['pass'],PDO::PARAM_STR);
        try{
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM usuarios WHERE usu_id = :id");
        try{
            $query->execute([
                'id'=> $id,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>