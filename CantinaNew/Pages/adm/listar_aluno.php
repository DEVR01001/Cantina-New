<?php

require('../../App/config.inc.php');

include "head_adm.php";

include "nav_adm.php";





$dadosItem = new Aluno();

$dados = $dadosItem->listarAll();


$totalAlunos = count($dados);




?>


    <main class="main_adm">
        <section class="conatiner_header">
            <div class="title_default">Alunos</div>
            <div class="conatiner_btn_header">
            </div>

        </section>
        <section class="conatiner_dados">
            <div class="wrap_conatinter_card_dados">
                <div class="card_dados">
                    <?php echo $totalAlunos; ?>
                    <div class="conatiner_text_card">Quant. Alunos</div>
                </div>

            </div>

        </section>
        <section class="conatier_pesquisa">
            <div class="conatier_pesquisa_left">
                <input type="text" placeholder="pesquisar produto...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>

            </div>
            <div class="conatier_pesquisa_right">
                <div style='display:none;' class="conatiner_teste">
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
            </div>

        </section>
        <section class="tabelas">
            <table>
                <tr class="list_adm_header">
                    <th>N° Aluno</th>
                    <th>Nome Aluno</th>
                    <th>Matricula</th>
                    <th  class="some">Telefone</th>
                    <th>Ações</th>
                </tr>
                <?php

                foreach ($dados as $aluno) {
                    
                    echo'
                        <tr>
                            <td>'.$aluno['id_aluno'].'</td>
                            <td>'.$aluno['nome'].' '.$aluno['sobrenome'].'</td>
                            <td>'.$aluno['matricula'].'</td>
                            </td>
                            <td class="some">'.$aluno['telefone'].'</td>
                            <td>
                                <div class="conatiner_listar_ações">
                                    <a href="ver_aluno.php?id_aluno='.$aluno['id_aluno'].'"><i class="fa-solid fa-eye"></i></a>
                                    <a href="excluir_aluno.php?id_aluno='.$aluno['id_aluno'].'"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    ';
                }

                ?>
                
            </table>
            
        </section>
    


    

    </main>
    
</body>
</html>