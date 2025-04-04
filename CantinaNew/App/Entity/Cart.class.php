
<?php




class Cart{


    public function add($product){

        $inCart = false;
        $this->setTotal($product);

        if(count($this->getCart()) > 0){
            foreach($this->getCart() as $productInCart){
                if($productInCart->id_produto === $product->id_produto){
                    $quantity = $productInCart->getQuantity() + $product->getQuantity();
                    $productInCart->setQuantity($quantity);
                    $inCart = true;
                    break;

                }
            }
        }
        if(!$inCart){
            $this->setProductsInCart($product);
        }

    }


    private function setTotal($product){

        // print_r($product);
        $result = $_SESSION['cart']['total'] += $product->preco * $product->getQuantity();
        // print_r($result);
        // exit;
    }


    private function setProductsInCart($product){
        $_SESSION['cart']['products'][] = $product;
    }


    public function remove($id) {
        if (isset($_SESSION['cart']['products'])) {
            foreach ($this->getCart() as $index => $product) {
                if ((int)$product->id_produto === (int)$id) {
                    unset($_SESSION['cart']['products'][$index]);
                    $_SESSION['cart']['total'] -= $product->preco * $product->getQuantity();
                    break;
                }
            }
        }
    }


    public function decrementa($id) {
        if (isset($_SESSION['cart']['products'])) {
            foreach ($_SESSION['cart']['products'] as $index => $item) {
                $produto = $item;
                $quantidade = $item->quantidade_carrinho ;
                $id_produto = $item->id_produto;
             
                if ((int) $id_produto === (int) $id) {
    
                    $result = $_SESSION['cart']['total'] -= $produto->preco;

    
                    if ($quantidade > 1) {
                        $_SESSION['cart']['products'][$index]->quantidade_carrinho -= 1;
                    } else {
                        unset($_SESSION['cart']['products'][$index]);
                    }
    
                    break;
                }
            }
        }
    }
    
    
    

    

    public function getCart(){
        return $_SESSION['cart']['products'] ?? [];

    }

    public function getTotal(){

    return $_SESSION['cart']['total'] ?? 0;

    }

    





}