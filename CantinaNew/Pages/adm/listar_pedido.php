<?php

require('../../App/config.inc.php');

include "head_adm.php";

include "nav_adm.php";


?>


    <main class="main_adm">
        <section class="conatiner_header">
            <div class="title_default">Pedidos</div>
            <div class="conatiner_btn_header">
            </div>

        </section>
        <section class="conatiner_dados">
            <div class="wrap_conatinter_card_dados">
                <div class="card_dados">
                    30
                    <div class="conatiner_text_card">Quant. Pedidos</div>
                </div>
                <div class="card_dados">
                    30
                    <div class="conatiner_text_card">Quant. Pagos</div>
                </div>
                <div class="card_dados">
                    30
                    <div class="conatiner_text_card">Quant. A pagar</div>
                </div>

            </div>

        </section>
        <section class="conatier_pesquisa">
            <div class="conatier_pesquisa_left">
                <input type="text" placeholder="pesquisar produto...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
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
                    <th>N° Pedido</th>
                    <th>Nome Aluno</th>
                    <th>Preço Total</th>
                    <th class="some">Horario de Retirada</th>
                    <th>Status</th>
                    <th>Ver Pedido</th>
                </tr>
            
                <tr>
                    <td>N° Produtos</td>
                    <td>Nome</td>
                    <td>Preço</td>
                    <td class="some">3</td>
                    <td>
                        <div class="active_status">
                            <div class="text_list">Pago</div>
                        </div>
                    </td>
                    <td>
                        <div class="conatiner_listar_ações">
                            <a><i class="fa-solid fa-eye open-modal " data-modal="modal-1"></i></a>

                        </div>
                    </td>
                </tr>
                
            </table>
            
        </section>
        <dialog id="modal-1">
            <div class="modal_header">
                <button class="close-modal" data-modal="modal-1"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal_body">
                <div class="title_modal">Pedido N° 454</div>
                <div class="conatiner_dados_aluno_modal">
                    <div class="dados_aluno_modal">Aluno: Rafael Rodrigues dos Santos</div>
                    <div class="dados_aluno_modal">Matricula: 34543</div>
                    <div class="dados_aluno_modal">Telefone: 6792323</div>
                    <div class="dados_aluno_modal">Horario: 8:30</div>
                    <div class="status_gamaneto_modal">Status Pagamento : <span>Pago</span></div>
                </div>
                <div class="title_modal">Produtos</div>
                <div class="conatiner_produtos_modal">
                    <img src="" alt="">
                    <div class="dados_aluno_modal">Nome Produto</div>
                    <div class="dados_aluno_modal">Quant: 1</div>
                    <div class="dados_aluno_modal">Preço: R$ 4,50</div>
                </div>
                <div class="container_status_modal">
                    <div class="status_gamaneto_modal2">Preço Total: <span>R$ 12,50</span></div>
                </div>

            </div>
        </dialog>
    


    

    </main>


    <script src="/Public/Js/modal.js"></script>
    
</body>
</html>