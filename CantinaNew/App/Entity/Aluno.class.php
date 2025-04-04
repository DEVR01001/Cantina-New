<?php

require_once(__DIR__ . '/../DB/Database.php');




class Aluno{


    public int $id_aluno;
    public string $nome;
    public string $sobrenome;
    public string $email;
    public string $senha;
    public int $matricula;
    public int $telefone;




    public function cadastrar(){

        $db = new Database('aluno');

        $result = $db->insert([

            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'email' => $this->email,
            'senha' => $this->senha,
            'matricula' => $this->matricula,
            'telefone' => $this->telefone,


        ]);

        return $result;

    }

      
    public static function getId($id){

        $db = new Database('aluno');

        $result = $db->select('id_aluno = "' . $id . '"')->fetchObject(self::class);

    
        return $result;
    
    
    }


    
    public static function getEmail($email){

        $db = new Database('aluno');

        $result = $db->select('email = "' . $email . '"')->fetchObject(self::class);

    
        return $result;
    
    
    }


    public function listarAll($where=null,$order=null,$limit=null){


        $db = new Database('aluno');

        $result = $db->select()->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


             
    public static function excluir($id){

        $db = new Database('aluno');

        $result = $db->delete('id_aluno = ' . $id . '');

        return $result;
    
    
    }















}