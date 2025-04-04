<?php

require('../../App/config.inc.php');

include "head_adm.php";
include "nav_adm.php";

$dadosItem = new Adm();
$dados = $dadosItem->listarAll();


$totalAdm = count($dados);
$totalAtivos = 0;
$totalInativos = 0;


foreach ($dados as $adm) {
    if ($adm['admStatus'] === 'ativo') {
        $totalAtivos++;
    } else {
        $totalInativos++;
    }
}

?>

<main class="main_adm">
    <section class="conatiner_header">
        <div class="title_default">Administradores</div>
        <div class="conatiner_btn_header"></div>
    </section>

    <section class="conatiner_dados">
        <div class="wrap_conatinter_card_dados">
            <div class="card_dados">
                <?php echo $totalAdm; ?>
                <div class="conatiner_text_card">Quant. Adm</div>
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
            <a class="btn_cadastrar" href="cadastro_adm.php">+ Adm</a>
        </div>
        <div class="conatier_pesquisa_right">
            <div style="display:none;" class="conatiner_teste">
                <div class="item_select_cat">Todos</div>
                <div class="item_select_cat">Lanches</div>
                <div class="item_select_cat">Doces</div>
                <div class="item_select_cat">Bebidas</div>
            </div>
        </div>
    </section>

    <section class="tabelas">
        <table>
            <tr class="list_adm_header">
                <th>N° Adm</th>
                <th>Nome Adm</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>

            <?php
            foreach ($dados as $adm) {
                if ($adm['admStatus'] === 'ativo') {
                    $status = 'Ativo';
                    $icone_status = 'active_status';
                } else {
                    $status = 'Inativo';
                    $icone_status = 'desative_status';
                }

                echo '
                <tr>
                    <td>' . $adm['id_adm'] . '</td>
                    <td>' . $adm['user'] . '</td>
                    <td>
                        <div class="' . $icone_status . '">
                            <div class="text_list">' . $adm['admStatus'] . '</div>
                        </div>
                    </td>
                    <td>
                        <div class="conatiner_listar_ações">
                            <a href="editar_adm.php?id_adm=' . $adm['id_adm'] . '"><i class="fa-solid fa-pencil"></i></a>
                            <a href="excluir_adm.php?id_adm=' . $adm['id_adm'] . '"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                </tr>';
            }
            ?>
        </table>
    </section>
</main>

</body>
</html>
