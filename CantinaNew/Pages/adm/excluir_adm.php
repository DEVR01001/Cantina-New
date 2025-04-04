<?php

require('../../App/config.inc.php');



$id_adm = $_GET['id_adm'];





$adm = new Adm();

$result = $adm->excluir($id_adm);


if($result){
    header('location: listar_adm.php');
}

