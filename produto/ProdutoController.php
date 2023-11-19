<?php

 require_once("Produto.php");

class ProdutoController {

    private $produto;

    function __construct(){
        $this -> produto = new Produto();
    }
    function selecionar($codigo = null) {
        return  $this ->produto->selecionar($codigo);
    } 
  
    function cadastrar($valores) {         
            $resultado = $this -> produto->inserir($valores);
             //include("produto.php");
    }
           
}

?>