<?php

require('../../App/config.inc.php');

include "head_adm.php";

include "nav_adm.php";


$id_aluno = $_GET['id_aluno'];



$result = Aluno::getId($id_aluno);










?>


    <main class="main_adm">
        <section class="conatiner_header">
            <div class="title_default title_color">Ver aluno</div>
            <div class="conatiner_btn_header">
            </div>

        </section>
        <div class="conatiner_form_adm">
            <form class="form_center" action="">
                    <div class="item_flex">
                        <label for="">Nome</label>
                        <input disabled  type="text" value='<?php echo $result->nome; ?>'>
                    </div>
                    <div class="item_flex">
                        <label for="">Sobrenome</label>
                        <input disabled  type="text" value='<?php echo $result->sobrenome; ?>'>
                    </div>
                    <div class="item_flex">
                        <label for="">Email</label>
                        <input disabled  type="text" value='<?php echo $result->email; ?>'>
                    </div>
                    <div class="item_flex">
                        <label for="">Telefone</label>
                        <input disabled  type="text" value='<?php echo $result->telefone; ?>'>
                    </div>
                    <div class="item_flex">
                        <label for="">Matricula</label>
                        <input disabled  type="text" value='<?php echo $result->matricula; ?>'>
                    </div>
            </form>
        </div>
        
        
    


    

    </main>
    
</body>
</html>