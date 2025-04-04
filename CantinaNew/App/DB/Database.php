<?php



class Database {


    public $conn;
    public string $local = 'localhost';
    public string $db = 'CantinaDb';
    public string $user = 'root';
    public string $password = '';
    public $table;



    public function __construct($table = null) {
        $this->table = $table;
        $this->conecta();
    }


    
    private function conecta(){
        try{
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",
            $this->user,$this->password); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return true;
        }catch (PDOException $err){
            die("Connection Failed" . $err->getMessage());
            return false;
        }
    }
        



    public function execute($query, $binds = []){

        try{

            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;

        }catch (PDOException $err){
            die('Conection Falied' . $err->getMessage());

         }

    }



    public function insert($values){
        $fileds = array_keys($values);
        $binds = array_pad([], count($fileds), '?');

        $query = "INSERT INTO " . $this->table . " ( " .implode(",", $fileds) . ") VALUES (" .implode(",", $binds) . " ) ";





        $this->execute($query, array_values($values));


        return $this->conn->lastInsertId();
    }



    public function select($where=null,$order=null,$limit=null,$fileds='*'){

        $where = strlen($where) ? ' WHERE ' . $where : '';
        $order = strlen($order) ? ' ORDER ' . $order : '';
        $limit = strlen($limit) ? ' LIMIT ' . $limit : '';

        $query = 'SELECT ' . $fileds . ' FROM ' . $this->table . "" . $where . "" . $order . "" . $limit;

 
   
        return $this->execute($query);

    }


    public function delete($where){

        $query = 'DELETE FROM '. $this->table . " WHERE " . $where;


        return $this->execute($query);

    }

    public function update($where, $values){

        $fileds = array_keys($values);

        $query = 'UPDATE ' . $this->table . ' SET ' . implode( '=?,', $fileds) . " =? WHERE " . $where;
        

  


        return $this->execute($query, array_values($values));
        


    }


  



}




