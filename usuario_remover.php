<?php 
   session_start();
    if(isset($_SESSION["codigo_usuario"]) && $_SESSION["codigo_usuario"] > 0) {
     if(count($_GET) > 0) {
        $cod_usuario = $_GET["cod_usuario"];
  
        require_once('usuario/Usuario.php');

        $usuario = new Usuario();

       $resultado = $usuario->remover($cod_usuario);
      
        echo json_encode($resultado);
    }
  }else {
    echo "Operação não permitida.";
  }
?>