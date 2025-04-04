<?php





class Login{


    private static function init(){

        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }



    }





    public static function LoginAluno($object){
        self::init();

        $_SESSION['aluno'] = [
            'id_aluno' => $object->id_aluno,
            'email' => $object->email
        ];


        header('location: ../../Pages/user/menu.php');
        exit;

    }

    public static function LoginAdm($object){

        self::init();

        $_SESSION['adm'] = [
            'id_aluno' => $object->id_aluno,
            'email' => $object->email
        ];


        header('location: ../../Pages/adm/index.php');
        exit;

    }




    public static function isloginAluno(){
        self::init();

        return isset($_SESSION['aluno']['id_aluno']);

    }

    public static function isloginAdm(){
        self::init();

        return isset($_SESSION['adm']['id_adm']);

    }











    public static function RequireLogin(){
        self::init();

        if(!self::isloginAluno()){
            header('location: ../../Pages/user/login.php');
            exit;
        }

        if(!self::isloginAdm()){
            header('location: ../../Pages/user/login.php');
            exit;
        }


    }






    public static function RequireLogout(){
        self::init();

        if(self::isloginAluno()){
            return true;

        }else{
            return false;
        }

        if(self::isloginAdm()){
            header('location: ../../Pages/adm/index.php');
            exit;
        }


    }





    public static function logout(){
        self::init();
        session_unset();
        session_destroy();

        header('location: ../../Pages/user/login.php');
        exit;
    }












}