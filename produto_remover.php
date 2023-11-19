<?php 
   session_start();
    if(isset($_SESSION["codigo_usuario"]) && $_SESSION["codigo_usuario"] > 0) {
     if(count($_GET) > 0) {
        $cod_prod = $_GET["cod_prod"];
  
        require_once('produto/Produto.php');

        $produto = new Produto();

       $resultado = $produto->remover($cod_prod);
      
        echo json_encode($resultado);
    }
  }else {
    echo "Operação não permitida.";
  }
?>