<?php

require('../../App/config.inc.php');

require('../../App/Session/Login.php');

include "head_user.php";


$result = Login::RequireLogout();


if ($result == true){
    include "nav_bar_user_logado.php";

}else{

    include "nav_bar_user_deslogado.php";
}




$dadosItem = new Produto();


$dados = $dadosItem->listarAll();


// CART



if(isset($_GET['id'])){

    $id_produto = strip_tags($_GET['id']);


    $produto = Produto::getId($id_produto);

    
    $cart = new Cart();
    $cart->add($produto);



   

}







?>

    <main class="main-user">
        <section class="container_title_user">
            <div class="title_default">Menu</div>
        </section>
        <section class="conatiner_text_area_user">
            <div class="text_area_user">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid quibusdam temporibus blanditiis tempore illo ducimus distinctio at, culpa, sapiente, voluptates labore esse natus nobis doloribus magni quaerat earum mollitia accusamus.</div>
        </section>
        <div class="conatiner_select_mobile">
            <select name="" id="">
                <option value="">Todos</option>
                <option value="">Lanche</option>
                <option value="">Doces</option>
                <option value="">Bebidas</option>
            </select>
        </div>
        <section class="conatiner_select_menu">
            <button>Todos</button>
            <button>Lanche</button>
            <button>Doces</button>
            <button>Bebidas</button>
        </section>
        <section class="conatiner_wrap_card">
            <div class="wrap_card_user">
                <?php

                foreach($dados as $produto){
                    echo'
                    <div class="card_default">
                        <img src="'.$produto['foto'].'" alt="">
                        <div class="text_nome_default">'.$produto['nome'].'</div>
                        <div class="text_nome_default">Qunt Disponivel:'.$produto['quatidade'].'</div>
                        <div class="text_preco_default">R$ '.$produto['preco'].'</div>
                        <div class="conatiner_btn_card">
                            <a data-modal="'.$produto['id_produto'].'" class="open-modal"><i class="fa-solid fa-eye "></i></a>
                            <a href=?id='.$produto['id_produto'].'><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                    <dialog id="'.$produto['id_produto'].'">
                        <div class="modal_header">
                            <button class="close-modal" data-modal="'.$produto['id_produto'].'"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="modal_body">
                            <div class="title_modal">'.$produto['nome'].'</div>
                            <div class="conatiner_dados_aluno_modal2">
                                <img src="'.$produto['foto'].'" alt="">
                                <div class="text_modal_default_wrap">
                                    <p >Quantidade Disponivel: '.$produto['quatidade'].'</p>
                                    <p c>Preço: R$ '.$produto['preco'].'</p>
                                </div>
                            </div>
                            <div class="title_modal">Descrição</div>
                            <div class="conatiner_produtos_modal">
                                <div class="text_modal_produto">'.$produto['descricao'].'</div>
                            </div>
                            <div class="title_modal">Valores Nutricionais</div>
                            <div class="conatiner_center_modal_nutri">
                                '.$produto['valor_nutricional'].'
                            </div>
                            <a href=?id='.$produto['id_produto'].' class="conatiner_btn_mosal_sacola">
                                <i class="fa-solid fa-cart-shopping"></i>Adicionar no Carrinho
                            </a>
                    
                        </div>
                    </dialog>

                    ';
                }
                ?>
            </div>
    
        </section>

       

    </main>
   
       
    
</body>
</html>