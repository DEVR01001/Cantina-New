<?php

require_once(__DIR__ . '/../DB/Database.php');



class Produto{


    public int $id_pedido;
    public int $id_item_pedido;
    public  $horario;





    public function cadastrar(){

        $db = new Database('pedido');

        $result = $db->insert([

            'id_item_pedido' => $this->id_item_pedido,
            'horario' => $this->horario,

        ]);

        return $result;

    }



}