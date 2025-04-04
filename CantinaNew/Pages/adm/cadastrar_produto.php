<?php

require('../../App/config.inc.php');

include "head_adm.php";

include "nav_adm.php";



$erro='';

if(isset($_POST['cadastrar'])){

    if(empty($_POST['nome']) && empty($_POST['categoria'])  && empty($_POST['preco']) && empty($_POST['status']) && empty($_POST['quantidade'])  && empty($_POST['descricao']) && empty($_POST['valor_nutri'])   && empty($_FILES['foto'])){

        $erro='Preencha os campos';

    }else{
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $produtcStatus= $_POST['status'];
        $descricao = $_POST['descricao'];
        $valor_nutri = $_POST['valor_nutri'];
        $quantidade = $_POST['quantidade'];

        $preco = $_POST['preco'];
        $preco = str_replace(['.', ','], ['', '.'], $preco);
        $preco = (float)$preco;
        $precoFormatado = number_format($preco, 2, ',', '.');


        




        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

            $foto = $_FILES['foto'];
            $pasta = '../../Public/img/upload/';
            $nomeDoArquivo = $foto['name'];
            $NovoNomeArquivo = uniqid(); 
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION)); 
        
            if ($extensao !== "jpg" && $extensao !== "jpeg" && $extensao !== "png") {
                $erro = "Tipo de arquivo não aceito, apenas jpg, jpeg e png";
            }else{

                $Sucess = "Tipo de arquivo aceito";
    
                $path = $pasta . $NovoNomeArquivo . "." . $extensao;


                if (move_uploaded_file($foto['tmp_name'], $path)) {


                    $produto = new Produto();


                    $produto->nome = $nome;
                    $produto->categoria = $categoria;
                    $produto->preco = $preco;
                    $produto->produtcStatus = $produtcStatus;
                    $produto->descricao = $descricao;
                    $produto->valor_nutri = $valor_nutri;
                    $produto->foto = $path;
                    $produto->quantidade = $quantidade;


                    
                    // print_r($nome);
                    // print_r($categoria);
                    // print_r($preco);
                    // print_r($status);
                    // print_r($descricao);
                    // print_r($valor_nutri);
                    // print_r($quantidade);



                    // print_r($produto);
                    // exit;



                    $result = $produto->cadastrar();


                    if($result){
                        header('location: listar_produto.php');
                    }else{
                        $erro = "Erro ao cadastrar o produto";
                    }




                }
    

            }

        }


    }

}elseif (isset($_POST['cancelar'])){

    header('location: listar_produto.php');
}


?>





    <main class="main_adm">
        <section class="conatiner_header">
            <div class="title_default title_color">Cadastrar Produto</div>
            <div class="conatiner_btn_header">
            </div>

        </section>
        <div class="conatiner_form_adm">
            <form method='post' class="form_flex" action="" enctype = "multipart/form-data"> 
                <div class="conatiner_form_big">
                    <div class="left_form">
                        <div class="item_flex">
                            <label for="">Nome</label>
                            <input name='nome' type="text">
                        </div>
                        <div class="item_flex">
                            <label for="">Categoria</label>
                            <select name='categoria' name="" id="">
                                <option value="lanche">Lanches</option>
                                <option value="doce">Doces</option>
                                <option value="bebida">Bebidas</option>
                            </select>
                        </div>
                        <div class="item_flex">
                            <label for="">Preço</label>
                            <input name='preco' type="text">
                        </div>
                        <div class="item_flex">
                            <label for="">Status</label>
                            <select name="status" id="">
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                        </div>
                        <div class="item_flex">
                            <label for="">Descrição</label>
                            <textarea name="descricao" id="" cols="30" rows="10">

                            </textarea>
                        </div>

                    </div>
                    <div class="right_form">
                            <div class="item_flex">
                                <label for="">Quantidade</label>
                                <input name='quantidade' type="number" >
                            </div>
                            <div class="item_flex">
                                <label for="">Foto</label>
                                <input  id="preview"  accept ="image/*" name='foto'  id="file"  type="file" >
                            </div>
                            <div class="conatiner_previe_img">
                                <img id='pre_visu' src="/Public/img/OIP.jfif" alt="">
                                <p>Pré Visualização de imagem</p>
                            </div>
                            <div class="item_flex">
                                <label for="">Valores Nutricionais</label>
                                <textarea name="valor_nutri" id="" cols="30" rows="10">

                                </textarea>
                            </div>

                    </div>
                </div>
                <p style='color:red; font-size:13px;' class='erro'> <?php echo $erro; ?></p>
                <div class="conatiner_btn_form">
                    <button name='cancelar'>Cancelar</button>
                    <button name='cadastrar' >Cadastrar</button>
                </div>
               
            </form>

        </div>
        
        
    


    

    </main>
    
</body>
</html>