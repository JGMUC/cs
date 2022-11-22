<?php
require 'models/consultaclientes/clienteshema.php';
class consultaclientesModel extends Model{
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
}
?>