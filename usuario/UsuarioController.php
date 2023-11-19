<?php

require_once("Usuario.php");

class UsuarioController
{

    private $usuario;

    function __construct()
    {
        $this->usuario = new Usuario();
    }
    function seleciona($codigo = null)
    {
        return   $this->usuario->selecionar($codigo);
    }

    function verificaCadastro($codigo = null)
    {
        return   $this->usuario->verificaEmail($codigo);
    }



    function cadastrar($valores)
    {
        $usuario =   $this->verificaCadastro($valores['email_usuario']); 
    
        $resultado = array();
        if ($usuario) {
            $resultado["msg"] = "Erro ao inserir usuario no banco de dados. Já existe um usuario com esse email cadastrado.";
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        } else {
            $resultado = $this->usuario->inserir($valores);
        }
        return $resultado;
        $this->usuario = new Usuario();
        return  $this->usuario->inserir($valores);
    }

    function login($valores)
    {
        $filtro = array();
        $filtro["email"] = $valores["email"];
        $filtro["senha"] = $valores["senha"];
        $filtro["situacao"] = "Habilitado";

        $usuario =  $this->seleciona($filtro);


      
        if (count($usuario) == 1) {
            session_start();
            $_SESSION["email_usuario"] = $valores["email"];
            $_SESSION["nome_usuario"] = $usuario[0]["nome"];
            $_SESSION["codigo_usuario"] = $usuario[0]["codigo"];

            header("Location: produto.php");
        } else if (count($usuario) == 0) {
            $resultado["msg"] = " E-mail e senha não conferem.";
            $resultado["cod"] = 0;

            return $resultado;
        }
    }
}
