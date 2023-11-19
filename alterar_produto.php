<?php 
  if(count($_POST) > 0) {
    require_once('produto/Produto.php');

    $produto = new Produto();

     $resultado =  $produto -> atualizar($_POST);

      header("location: produto.php");
  }

?>