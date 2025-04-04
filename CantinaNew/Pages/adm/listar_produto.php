<?php

require('../../App/config.inc.php');

include "head_adm.php";

include "nav_adm.php";



$dadosItem = new Produto();

$dados = $dadosItem->listarAll();


$totalProduto = count($dados);
$totalAtivos = 0;
$totalInativos = 0;


foreach ($dados as $produto) {
    if ($produto['produtcStatus'] === 'ativo') {
        $totalAtivos++;
    } else {
        $totalInativos++;
    }
}



if(isset($_POST['salvar'])){

    $id_produto = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];


    $result = Produto::editarQuantidade($id_produto,$quantidade);

    if($result){
        header('location: listar_produto.php');
    }

    
    
}elseif (isset($_POST['zerar'])){

    
    $id_produto = $_POST['id_produto'];
    $quantidade = 0;


    $result = Produto::editarQuantidade($id_produto,$quantidade);

    if($result){
        header('location: listar_produto.php');
    }


}




?>


    <main class="main_adm">
        <section class="conatiner_header">
            <div class="title_default">Produtos</div>
            <div class="conatiner_btn_header">
            </div>

        </section>
        <section class="conatiner_dados">
            <div class="wrap_conatinter_card_dados">
                <div class="card_dados">
                    <?php echo $totalProduto; ?>
                    <div class="conatiner_text_card">Quant. Produtos</div>
                </div>
                <div class="card_dados">
                    <?php echo $totalAtivos; ?>
                    <div class="conatiner_text_card">Quant. Ativos</div>
                </div>
                <div class="card_dados">
                <?php echo $totalInativos; ?>
                    <div class="conatiner_text_card">Quant. Inativos</div>
                </div>

            </div>

        </section>
        <section class="conatier_pesquisa">
            <div class="conatier_pesquisa_left">
                <input type="text" placeholder="pesquisar produto...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                <a class="btn_cadastrar" href="cadastrar_produto.php">+ Produto</a>

            </div>
            <div class="conatier_pesquisa_right">
                <div class="item_select_cat">
                    Todos
                </div>
                <div class="item_select_cat">
                    Lanches
                </div>
                <div class="item_select_cat">
                    Doces
                </div>
                <div class="item_select_cat">
                    Bebidas
                </div>
                
            </div>

        </section>
        <section class="tabelas">
            <table>
                <tr class="list_adm_header">
                    <th>N° Produtos</th>
                    <th>Nome</th>
                    <th class="some">Preço</th>
                    <th >Status</th>
                    <th class="some">Quantidade</th>
                    <th>Ações</th>
                </tr>

                <?php

                foreach($dados as $produto){
                    
                    if ($produto['produtcStatus'] === 'ativo') {
                        $status = 'Ativo';
                        $icone_status = 'active_status';
                    } else {
                        $status = 'Inativo';
                        $icone_status = 'desative_status';
                    }
                    echo'
                    <tr>
                        <td>'.$produto['id_produto'].'</td>
                        <td>'.$produto['nome'].'</td>
                        <td class="some">'.$produto['preco'].'</td>
                        <td>
                            <div class="' . $icone_status . '">
                                <div class="text_list">'. $produto['produtcStatus'] .'</div>
                            </div>
                        </td>
                        <td class="some">'. $produto['quantidade'] .'</td>
                        <td>
                            <div class="conatiner_listar_ações">
                                <a data-modal="'.$produto['id_produto'].'" class="open-modal"><i class="fa-solid fa-plus"></i></a>
                                <a href="editar_produto.php?id_produto='.$produto['id_produto'].'"><i class="fa-solid fa-pencil"></i></a>
                                <a href="excluir_produto.php?id_produto='.$produto['id_produto'].'"><i class="fa-solid fa-trash"></i></a>

                            </div>
                        </td>
                        <dialog id="'.$produto['id_produto'].'">
                            <div class="modal_header">
                                <button class="close-modal" data-modal="'.$produto['id_produto'].'"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <form  method="post" >
                                <div class="modal_body">
                                    <div class="title_modal">Adicionar Quantidade</div>
                                    <input style="display:none;" name="id_produto" value="'.$produto['id_produto'].'"> </input>
                                    <input name="quantidade" type="number">
                                    <div class="conatiner_btn_modal">
                                        <button name="zerar">Zerar</button>
                                        <button name="salvar">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </dialog>
                    </tr>

                    ';
                }
                ?>
            
            </table>

            
        </section>
    


    

    </main>


    <script src="/Public/Js/modal.js"></script>
    
</body>
</html>