<?php

require('../../App/config.inc.php');



$id_produto = $_GET['id_produto'];





$produto = new Produto();

$result = $produto->excluir($id_produto);


if($result){
    header('location: listar_produto.php');
}

