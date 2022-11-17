<?php

require 'models/cliente/clienteshema.php';
class clienteModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT cli_id,cli_razon_social razon,cli_identificacion nit,cli_representante_legal rpl,cli_direccion,ciu_nombre ciudad,cli_correo,cli_estado FROM clientes,ciudades where cli_ciu_id=ciu_id and cli_estado='A'");
            while($row = $query->fetch()){
                $item = new ClienteSchema();
                $item->id      = $row['cli_id'];
                $item->razon   = $row['razon'];
                $item->nit     = $row['nit'];
                $item->rpl     = $row['rpl'];
                $item->ciudad  = $row['ciudad'];
                $item->correo  = $row['cli_correo'];
                $item->estado  = $row['cli_estado'];
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
    public function getCiudades(){
        try{
            $query = $this->db->connect()->query("SELECT ciu_id IdCiu,ciu_nombre NombreCiu,dep_id IdDep,dep_nombre NombreDep FROM ciudades,departamentos where ciu_dep_id=dep_id and ciu_estado='A' order by dep_nombre,ciu_nombre");
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e){
            return [];
        }
    }

    public function crear($item){
        $query = $this->db->connect()->prepare("INSERT INTO clientes (cli_razon_social, cli_identificacion, cli_representante_legal, cli_direccion, cli_ciu_id, cli_correo, cli_estado) VALUES (:razon,:nit,:rpl,:direccion,:ciud,:correo,:estado)");
        $query->bindParam(':razon',$item['razon'],PDO::PARAM_STR);
        $query->bindParam(':nit',$item['nit'],PDO::PARAM_STR);
        $query->bindParam(':rpl',$item['rpl'],PDO::PARAM_STR);
        $query->bindParam(':ciud',$item['ciud'],PDO::PARAM_STR);
        $query->bindParam(':correo',$item['correo'],PDO::PARAM_STR);
        $query->bindParam(':direccion',$item['direccion'],PDO::PARAM_STR);
        $query->bindParam(':estado',$item['estado'],PDO::PARAM_STR);
        try{
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM clientes WHERE cli_id = :id");
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