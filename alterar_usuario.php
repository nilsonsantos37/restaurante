<?php 
  if(count($_POST) > 0) {
    require_once('usuario/Usuario.php');

    $usuario = new Usuario();

     $resultado =  $usuario -> atualizar($_POST);

      header("location: usuario.php");
  }

?>