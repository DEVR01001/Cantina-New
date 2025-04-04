<?php

require_once(__DIR__ . '/../DB/Database.php');




class Adm{


    public int $id_adm;
    public string $user;
    public string $email;
    public string $senha;
    public string $admStatus;




    public function cadastrar(){

        $db = new Database('adm');

        $result = $db->insert([

            'user' => $this->user,
            'email' => $this->email,
            'senha' => $this->senha,
            'admStatus' => $this->admStatus,

        ]);

        return $result;

    }


    public static function getEmailAdm($email){

        $db = new Database('adm');

        $result = $db->select('email = "' . $email .'"')->fetchObject(self::class);

        return $result;

    }


         
    public static function getId($id){

        $db = new Database('adm');

        $result = $db->select('id_adm = "' . $id . '"')->fetchObject(self::class);

    
        return $result;
    
    
    }

    
    public function listarAll($where=null,$order=null,$limit=null){


        $db = new Database('adm');

        $result = $db->select()->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }




    
    public function editar(){
        

        $db = new Database('adm');

        
        

        $result = $db->update('id_adm = ' . $this->id_adm, [

            'user' => $this->user,
            'email' => $this->email,
            'senha' => $this->senha,
            'admStatus' => $this->admStatus,

        ]);

        return $result;

    }


            
    public static function excluir($id){

        $db = new Database('adm');

        $result = $db->delete('id_adm = ' . $id . '');

        return $result;
    
    
    }

    



    














}