<?php

require('../../App/config.inc.php');

include "head_adm.php";

include "nav_adm.php";



$id_adm = $_GET['id_adm'];

$erro='';


$result = Adm::getId($id_adm);





if(isset($_POST['editar'])){

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

            $adm->id_adm = $id_adm;
            $adm->user = $user;
            $adm->email = $email;
            $adm->senha = password_hash($senha, PASSWORD_DEFAULT);
            $adm->admStatus = $status;

    
            $result = $adm->editar();

            if($result){
                header('location: listar_adm.php');
            }else{
                $erro='erro ao editar';
            }



        }


    }



}




?>



    <main class="main_adm">
        <section class="conatiner_header">
            <div class="title_default title_color">Editar Adm</div>
            <div class="conatiner_btn_header">
            </div>

        </section>
        <div class="conatiner_form_adm">
        <form method='post' class="form_center" action="">
                    <div class="item_flex">
                        <label for="">User</label>
                        <input name='user' type="text" value='<?php echo $result->user; ?>'>
                    </div>
                    <div class="item_flex">
                        <label for="">Email</label>
                        <input name='email' type="text"  value='<?php echo $result->email; ?>'>
                    </div>
                    <div class="item_flex">
                        <label for="">Senha</label>
                        <input name='senha' type="password"  value='<?php echo $result->senha; ?>'>
                    </div>
                    <div class="item_flex">
                        <label for="">Status</label>
                        <select name="status" id=""  value='<?php echo $result->admStatus; ?>'>
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                    <p style='color:red; font-size:13px;' class='erro'> <?php echo $erro; ?></p>
                    <div class="conatiner_btn_form">
                        <button name='cancelar' >Cancelar</button>
                        <button name='editar'>Salvar</button>
                    </div>
            </form>


        </div>
        
        
    


    

    </main>
    
</body>
</html>