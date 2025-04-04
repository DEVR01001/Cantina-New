<?php

require('../../App/config.inc.php');

require('../../App/Session/Login.php');


include "head_user.php";


$erro='';

if(isset($_POST['login'])){

    if(empty($_POST['email']) && empty($_POST['senha'])  && empty($_POST['confsenha'])){
        $erro='Preencha os campos';

    }else{
       
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];


        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = 'Email inválido';
        } else{

            if($senha === $confsenha){

                $aluno = Aluno::getEmail($email);

                $adm = Adm::getEmailAdm($email);
                

            

                if($aluno instanceof Aluno && password_verify($senha, $aluno->senha)){

                    Login::LoginAluno($aluno);

                }else{
                    $erro='Email ou senha incorretas';
                }

                if($adm instanceof Adm && password_verify($senha, $adm->senha)){
                    Login::LoginAdm($adm);
                }else{
                    $erro='Email ou senha incorretas';
                }

            }else{
                $erro='Senhas não são iguais';


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
                <div class="title_form">Login</div>
                <div class="item_flex_user">
                    <label for="">Email</label>
                    <input name='email' type="text">
                </div>
                <div class="item_flex_user">
                    <label for="">Senha</label>
                    <input name='senha' type="password">
                </div>
                <div class="item_flex_user">
                    <label for="">Confirmar Senha</label>
                    <input name='confsenha' type="password">
                </div>
                <a class="esqueceu_senha" href="esqueceu_senha.html">Esqueceu a senha?</a>
                <div class="conatiner_login_alt">
                    <div class="item_ball_login"><i class="fa-brands fa-google"></i></div>
                    <div class="item_ball_login"><i class="fa-brands fa-facebook-f"></i></div>
                </div>
                <p style='color:red; font-size:13px;' class='erro'> <?php echo $erro; ?></p>
                <div class="conatiner_btn_form_user">
                    <button name='login' >Login</button>
                </div>
                <a href="cadastro_user.php" class="link_item">Não possui login? Cadastra-se</a>
            </form>
        </div>

    </main>
</body>
</html>