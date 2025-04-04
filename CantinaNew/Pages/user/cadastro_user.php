<?php

require('../../App/config.inc.php');

include "head_user.php";


$erro='';

if(isset($_POST['cadastrar'])){

    if(empty($_POST['nome']) && empty($_POST['sobrenome'])  && empty($_POST['email']) &&  empty($_POST['senha'])  && empty($_POST['matricula']) &&  empty($_POST['telefone'])){

        $erro ='Preencha os campos';
    }else{


        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $matricula = $_POST['matricula'];
        $telefone = $_POST['telefone'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = 'Email inválido';
        } else{

            $aluno = new Aluno();

            $aluno->nome = $nome;
            $aluno->sobrenome = $sobrenome;
            $aluno->email = $email;
            $aluno->email = $email;
            $aluno->telefone = $telefone;
            $aluno->matricula = $matricula;
            $aluno->senha = password_hash($senha, PASSWORD_DEFAULT);


            $result = $aluno->cadastrar();

            if($result){
                header('Location: login.php?ms='.$erro.'');
            }else{
                $erro='Não foi possivel cadastrar';
            }

        }








        }

    }





?>

    <header class="navbar-solo">
        <nav>
            <div class="conatiner_logo">  <a href="index.php"><i class="fa-solid fa-burger"></i> Sistema Cantina</a></div>
        </nav>
    </header>
    <script src="../../Public/JS/drop_nav.js"></script>
    <main class="main-user">
        <div class="conatiner_form_user">
            <form method='post' class="form_default" action="">
                <div class="title_form">Cadastro Aluno</div>
                <div class="form_body">
                    <div class="form_left">
                        <div class="item_flex_user">
                            <label for="">Nome</label>
                            <input name='nome' type="text">
                        </div>
                        <div class="item_flex_user">
                            <label for="">Sobrenome</label>
                            <input name='sobrenome' type="text">
                        </div>
                        <div class="item_flex_user">
                            <label for="">Email</label>
                            <input name='email' type="text">
                        </div>
                    </div>
                    <div class="form_left">
                        <div class="item_flex_user">
                            <label for="">Telefone</label>
                            <input name='telefone' type="number">
                        </div>
                        <div class="item_flex_user">
                            <label for="">Matricula</label>
                            <input name='matricula' type="number">
                        </div>
                        <div class="item_flex_user">
                            <label for="">Senha</label>
                            <input name='senha' type="password">
                        </div>

                    </div>
                </div>
                <p style='color:red; font-size:13px;' class='erro'> <?php echo $erro; ?></p>
                
                <div class="conatiner_btn_form_user">
                    <button name='cadastrar'>Cadastra-se</button>
                </div>
                <a href="login.php" class="link_item">Não possui cadastro? Faça login aqui</a>
            </form>
        </div>

    </main>
</body>
</html>