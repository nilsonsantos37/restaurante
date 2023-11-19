<?php

include("bd/BancoDados.php");

class Usuario
{
    private $codigo;
    private $nome;
    private $email;
    private $senha;
    private $data_registro;
    private $data_alteracao;
    private $situacao;

    private $banco_dados;

    function __construct()
    {
        $this->banco_dados = new BancoDados();
    }

    function pegar_valores_post($valores)
    {
        if (! isset($_SESSION["codigo_usuario"])) session_start();

        $this->codigo = isset($valores["cod_usuario"]) ? $valores["cod_usuario"] : 0;
        $this->nome = $valores["nome_usuario"];
        $this->email = $valores["email_usuario"];
        $this->senha = $valores["senha_usuario"];
        $this->data_registro = isset($valores["data_registro"]) ? $valores["data_registro"] : date('Y-m-d-H:i:s');
        $this->data_alteracao = isset($valores["data_alteracao"]) ? $valores["data_alteracao"] : date('Y-m-d-H:i:s');
        $this->situacao = isset($valores["situacao_usuario"]) ? $valores["situacao_usuario"] : "Habilitado";
        //$this->cod_usuario = $_SESSION["codigo_usuario"]; 
    }


    function selecionar($filtro = array())
    {


      
        $Where_cod = "1 = 1";
        if (isset($filtro["codigo"]))
            $Where_cod .= " AND codigo = :codigo";
        if (isset($filtro["email"]))
            $Where_cod .= " AND email = :email";
        if (isset($filtro["senha"]))
            $Where_cod .= " AND senha = md5(:senha)";
        if (isset($filtro["situacao"]))
            $Where_cod .= " AND situacao = :situacao";

        try {

            $this->banco_dados = new BancoDados();
      
            $conn = $this->banco_dados->conectar();
     
            
            //Pegar os usuarios armazenados no BD:
            $stmt = $conn->prepare("SELECT * FROM usuario WHERE  {$Where_cod} AND situacao ='Habilitado' ");
        
            if (isset($filtro["codigo"]))
                $stmt->bindParam(':codigo', $filtro["codigo"], PDO::PARAM_INT);
            if (isset($filtro["email"]))
                $stmt->bindParam(':email', $filtro["email"], PDO::PARAM_STR);
            if (isset($filtro["senha"]))
                $stmt->bindParam(':senha', $filtro["senha"], PDO::PARAM_STR);
            if (isset($filtro["situacao"]))
                $stmt->bindParam(':situacao', $filtro["situacao"], PDO::PARAM_STR);

            $stmt->execute();

            $resultado = $stmt->fetchAll();
        
        } catch (PDOException $e) {
            $resultado["msg"] = "Erro ao selecionar usuarios no banco de dados: " . $e->getMessage();;
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;

       
        return $resultado;
    }

    function verificaEmail($email)
    {
      
        try {
            $this->banco_dados = new BancoDados();
            $conn = $this->banco_dados->conectar();

            //Pegar os usuarios armazenados no BD:
            $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email" );
          
            if (isset($email))
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
       
            $stmt->execute();
            $resultado = $stmt->fetchAll();
           
        } catch (PDOException $e) {
            $resultado["msg"] = "Erro ao selecionar usuarios no banco de dados: " . $e->getMessage();
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;
    
        return $resultado;
    }
    function inserir($usuario)
    {
        $this->pegar_valores_post($usuario);

        try {
            $conn = $this->banco_dados->conectar();

            $sql = "INSERT INTO usuario 
                (nome, email, senha, data_registro, data_alteracao, situacao) 
                VALUES 
                (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->nome,  $this->email,  $this->senha,  $this->data_registro,  $this->data_alteracao,  $this->situacao]);

            $resultado["msg"] = "Usuário inserido.";
            $resultado["cod"] = 1;
            $resultado["style"] = "alert-success";
        } catch (PDOException $e) {
            $resultado["msg"] = "Erro ao inserir usuario no banco de dados: " . $e->getMessage();;
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;
        return $resultado;
    }

    function atualizar($usuario)
    {
        $this->pegar_valores_post($usuario);

        try {
            $conn = $this->banco_dados->conectar();

            $sql = "UPDATE usuario SET nome = ?, email = ?, senha = ?, data_registro = , situacao =, data_alteracao = now()  WHERE codigo = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->nome, $this->email, $this->senha, $this->data_registro, $this->situacao, $this->codigo]);

            $resultado["msg"] = "Item alterado com sucesso!";
            $resultado["cod"] = 1;
            $resultado["style"] = "alert-success";
        } catch (PDOException $e) {
            $resultado["msg"] = "Erro ao alterar  usuario no banco de dados: " . $e->getMessage();;
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;
        return $resultado;
    }



    function remover($codigo)
    {
        try {
            $conn = $this->banco_dados->conectar();

            $sql = "UPDATE usuario SET situacao = 'DESABILITADO'
                 WHERE codigo = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$codigo]);

            $resultado["msg"] = "Item removido com sucesso!";
            $resultado["cod"] = 1;
            $resultado["style"] = "alert-success";
        } catch (PDOException $e) {
            $resultado["msg"] = "Erro ao remover usuario no banco de dados: " . $e->getMessage();;
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;
        return $resultado;
    }
}

?>