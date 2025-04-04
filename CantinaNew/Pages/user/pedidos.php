<?php


include "head_user.php";


include "nav_bar_user_logado.php";




?>
    <main  class="main-user">
        <section class="container_title_user">
            <div class="title_default">Pedidos</div>
        </section>
        <section class="conatiner_text_area_user">
            <div class="text_area_user">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid quibusdam temporibus blanditiis tempore illo ducimus distinctio at, culpa, sapiente, voluptates labore esse natus nobis doloribus magni quaerat earum mollitia accusamus.</div>
        </section>
        <div class="conatiner_select_mobile">
            <select name="" id="">
                <option value="">A pagar</option>
                <option value="">Pagos</option>
                <option value="">Histórico de Pedidos</option>
            </select>
        </div>
        <section class="conatiner_select_menu">
            <button>A pagar</button>
            <button>Pagos</button>
            <button>Histórico de Pedidos</button>

        </section>
        <section class="conatiner_wrap_card">
            <div class="wrap_card_user">
                <div class="card_default">
                    <img src="" alt="">
                    <div class="text_nome_default">N° Pedido</div>
                    <div class="text_nome_default">Qunt itens: 4</div>
                    <div class="text_preco_default">R$ 15,50</div>
                    <div class="conatiner_btn_card">
                        <a data-modal="modal-1" class="open-modal"><i class="fa-solid fa-eye"></i></a>
                        <a data-modal="modal-2" class="open-modal">Pagar</a>
                    </div>
                </div>
            </div>
    
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
        <dialog id="modal-2">
            <div class="modal_header">
                <button class="close-modal" data-modal="modal-2"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal_body">
                <div class="title_modal">Pedido N° 454</div>
                <div class="conatiner_dados_aluno_modal">
                    <div class="container_status_modal">
                        <div class="status_gamaneto_modal2">Preço Total: <span>R$ 12,50</span></div>
                    </div>
                    <div class="conatiner_modal_text_pay">
                        Chave Pix: 23443234543344545654
                    </div>
                    <div class="conatiner_qrcode">
                        <img src="" alt="">
                    </div>
                </div>
                
        
            </div>
        </dialog>
        
        

    </main>
   
       
    <script src="../../Public/JS/drop_nav.js"></script>
    <script src="../../Public/JS/modal.js"></script>
    <script src="../../Public/JS/drop_sacola.js"></script>
</body>
</html>