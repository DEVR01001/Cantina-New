<?php

require('../../App/config.inc.php');

include "head_adm.php";

include "nav_adm.php";



$erro='';

if(isset($_POST['cadastrar'])){

    if(empty($_POST['user']) && empty($_POST['email'])  && empty($_POST['senha']) && empty($_POST['status'])){

        
        $erro ='Preencha os campos';

    }else{


        $user = $_POST['user'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $status = $_POST['status'];


        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = 'Email inválido';
        } else{


            $adm = new Adm();

            $adm->user = $user;
            $adm->email = $email;
            $adm->senha =password_hash($senha, PASSWORD_DEFAULT);
            $adm->admStatus = $status;

            $result = $adm->cadastrar();

            if($result){
                header('location: listar_adm.php');
            }else{
                $erro='erro ao cadasatrar';
            }


        }


    }


}elseif (isset($_POST['cancelar'])){

    header('location: listar_adm.php');
}







?>



    <main class="main_adm">
        <section class="conatiner_header">
            <div class="title_default title_color">Cadastrar Adm</div>
            <div class="conatiner_btn_header">
            </div>

        </section>
        <div class="conatiner_form_adm">
            <form method='post' class="form_center" action="">
                    <div class="item_flex">
                        <label for="">User</label>
                        <input name='user' type="text">
                    </div>
                    <div class="item_flex">
                        <label for="">Email</label>
                        <input name='email' type="text">
                    </div>
                    <div class="item_flex">
                        <label for="">Senha</label>
                        <input name='senha' type="password">
                    </div>
                    <div class="item_flex">
                        <label for="">Status</label>
                        <select name="status" id="">
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                    <p style='color:red; font-size:13px;' class='erro'> <?php echo $erro; ?></p>
                    <div class="conatiner_btn_form">
                        <button name='cancelar' >Cancelar</button>
                        <button name='cadastrar'>Salvar</button>
                    </div>
            </form>


        </div>
        
        
    


    

    </main>
    
</body>
</html>