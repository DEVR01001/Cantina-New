<?php

require('../../App/config.inc.php');



$id_aluno = $_GET['id_aluno'];





$aluno = new Aluno();

$result = $aluno->excluir($id_aluno);


if($result){
    header('location: listar_aluno.php');
}

