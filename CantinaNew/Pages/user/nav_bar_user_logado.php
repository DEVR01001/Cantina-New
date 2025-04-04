<?php

$cart = new Cart();


$id_aluno = $_SESSION['aluno']['id_aluno'];

$productsInCart = $cart->getCart();



if(isset($_GET['id_remove'])){
    $id = strip_tags($_GET['id_remove']);

    $cart->remove($id);
    header('location: menu.php');
}



if(isset($_GET['id_remove_one'])){
    $id = strip_tags($_GET['id_remove_one']);

    $cart->decrementa($id);
    header('location: menu.php');
}


if(isset($_GET['id_add'])){
    $id = strip_tags($_GET['id_add']);

    $id = Produto::getId($id);
    $cart->add($id);
    header('location: menu.php');
}


function gerarCodigo(){
        
    $codigo = '';

    $i=0;
    while( $i < 8){
        $num = rand(1,9);

        $codigo.= $num;
        $i+=1;
    }

    return $codigo;
}




if(isset($_POST['finalizar'])){

    if(count($productsInCart) <= 0){
        echo'Adicione um produto';

    }else{
          
    $horario = $_POST['horario'];
    $codigo = gerarCodigo();
    $codigo = (int)$codigo;
    


    $newItemPedido = new ItemPedido();


    foreach($productsInCart as $prod){



        $newItemPedido->id_item_pedido = $codigo;
        $newItemPedido->id_produto = $prod->id_produto;
        $newItemPedido->id_aluno = $id_aluno;
        $newItemPedido->quantidade = $prod->quantidade;

      


        $newItemPedido->cadastrar();

    }


    $newPedido = new Pedido();

    $newPedido->id_item_pedido = $codigo;
    $newPedido->horario = $horario;

    $result = $newPedido->cadastrar();
  
    

    if($result){
        header('location: menu.php');
    }
    

    }
  


}







?>


<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/Public/Css/sytele_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User</title>
</head>
<body >
    <header class="navbar">
        <nav class="navbar-2">
            <ul>
                <div class="conatiner_menu">
                    <i id='icon_menu' class="fa-solid fa-bars icon_menu"></i>
                    <div id="conteudo_menu" class="conatiner_menu_body">
                        <a href="editar_aluno.html"><i class="fa-solid fa-user"></i>Perfil</a>
                        <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sair</a>
                    </div>
                </div>
                <li>
                    <a href="menu.php">Menu</a>
                </li>
                <li>
                    <a href="pedidos.php">Pedidos</a>
                </li>
                <li>
                    <a id="open_cart_btn"><i class="fa-solid fa-cart-shopping"></i>Carrinho</a>
                </li>
                
            </ul>
            <div class="conatiner_logo"><a href=""><i class="fa-solid fa-burger"></i><div class="logo_text">Sistema Cantina</div></a></div>
                <div  id='conatiner_open_cart' class="conatiner_open_cart">
                    <div class="cart_header">
                        <div class="tilte_cart">Sacola</div>
                        <i id="open_close_btn" class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="cart_body">
                        <div class="text_cart">Produtos</div>
                            <div class="cotainer_list_cart">
                                <?php
                                        if(count($productsInCart) <= 0){
                                            echo'Nenhum item econtrado';
                                        }else{
                                            foreach($productsInCart as $produto){
                                                $cont = 0;

                                                echo'
                                                    <div class="item-cart">
                                                        <div class="conatiner_first_cart">
                                                            <img src="" alt="">
                                                            <div class="text_wrap_cart">
                                                                <div class="name_cart">'.$produto->nome.'</div>
                                                                <div class="name_cart">Qut: '.$produto->quantidade_carrinho.'</div>
                                                            </div>
                                                        </div>
                                                        <div class="preco_cart">R$ '.number_format($produto->preco, 2, ',', '.').'</div>
                                                        <a href="?id_add='.$produto->id_produto.'" class="add_cart"><i class="fa-solid fa-plus"></i></a>
                                                        <a  href="?id_remove_one='.$produto->id_produto.'"class="add_cart"><i class="fa-solid fa-minus"></i></a>
                                                        <a  href="?id_remove='.$produto->id_produto.'"class="remove_cart"><i class="fa-solid fa-xmark"></i></a>
                                                
                                                    </div>



                                                ';

                                                $cont +=1;
                                            }

                                        }
                                    ?>
                            </div>
                        <div class="shape_list"></div>
                        <div class="conatiner_final_cart">
                            <form method='post' action="">
                                <div class="container_cart_input_horario">
                                    <input type="time" name="horario" id="">
                                </div>
                                <div class="container_status_modal">
                                    <div class="status_gamaneto_modal2">Preço Total: <span><?php echo number_format($cart->getTotal(), 2, ',', '.'); ?> </span></div>
                                </div>
        
                                <div class="conatiner_btn_cart">
                                    <button name='finalizar'>Finalizar Pedido</button>
                                </div>
                            </form>
    
                        </div>
    
                    </div>
    
                </div>

            </div>
          
        </nav>
    </header>