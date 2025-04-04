<?php

require_once(__DIR__ . '/../DB/Database.php');




class Produto{


    public int $id_produto;
    public string $nome;
    public string $categoria;
    public float $preco;
    public string $produtcStatus;
    public int $quantidade;
    public string $descricao;
    public string $valor_nutri;
    public string $foto;
    public int $quantidade_carrinho = 1;




    public function cadastrar(){

        $db = new Database('produto');

        $result = $db->insert([

            'nome' => $this->nome,
            'categoria' => $this->categoria,
            'preco' => $this->preco,
            'produtcStatus' => $this->produtcStatus,
            'descricao' => $this->descricao,
            'valor_nutricional' => $this->valor_nutri,
            'quatidade' => $this->quantidade,
            'foto' => $this->foto,

        ]);

        return $result;

    }






    public function listarAll($where=null,$order=null,$limit=null){


        $db = new Database('produto');

        $result = $db->select()->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public static function editarQuantidade($id, $quantidade){
        $db = new Database('produto');

        $result = $db->update('id_produto = ' .$id, [

                'quatidade' => $quantidade,
        ]);

        return $result;



    }


             
    public static function excluir($id){

        $db = new Database('produto');

        $result = $db->delete('id_produto = ' . $id . '');

        return $result;
    
    
    }
    
    public static function getId($id){

        $db = new Database('produto');

        $result = $db->select('id_produto = "' . $id . '"')->fetchObject(self::class);

    
        return $result;
    
    
    }


    public function editar(){
        

        $db = new Database('produto');

        
        

        $result = $db->update('id_produto = ' . $this->id_produto, [

            
            'nome' => $this->nome,
            'categoria' => $this->categoria,
            'preco' => $this->preco,
            'produtcStatus' => $this->produtcStatus,
            'descricao' => $this->descricao,
            'valor_nutricional' => $this->valor_nutri,
            'quatidade' => $this->quantidade,
            'foto' => $this->foto,

        ]);

        return $result;

    }


    
    public function setQuantity(int $quant){
        $this->quantidade_carrinho = $quant;
    }


    public function getQuantity(){
        return $this->quantidade_carrinho;
    }

   











}