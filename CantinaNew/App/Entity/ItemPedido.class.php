<?php

require_once(__DIR__ . '/../DB/Database.php');



class ItemPedido{


    public int $id_item_pedido;
    public int $id_produto;
    public int $id_aluno;
    public int $quantidade;





    public function cadastrar(){



        $db = new Database('item_pedido');

        $result = $db->insert([

            'id_item_pedido' => $this->id_item_pedido,
            'id_produto' => $this->id_produto,
            'id_aluno' => $this->id_aluno,
            'quatidade' => $this->quantidade,

        ]);

        return $result;

    }



}