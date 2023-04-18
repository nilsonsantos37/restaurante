<?php 

include("bd/BancoDados.php");

class Produto {
    private $codigo;
    private $nome;
    private $categoria;
    private $valor;
    private $foto;
    private $info;
    private $cod_usuario;

    private $banco_dados;

    function __construct() {
       $this -> banco_dados = new BancoDados();
    }

    function pegar_valores_post($valores) {
        if ( ! isset($_SESSION["codigo_usuario"]) ) session_start();

          $this->codigo = isset ($valores["cod_prod"]) ? $valores["cod_prod"] : 0;
          $this->nome = $valores["nome_produto"];
          $this->categoria = $valores["categoria_produto"];
          $this->valor = $valores["valor_produto"];
          $this->foto = $valores["foto_produto"];
          $this->info = $valores["info_produto"];  
          $this->cod_usuario = $_SESSION["codigo_usuario"]; 
        }

        function selecionar($codigo = null) {
            $Where_cod = "";
        if(isset($codigo) && $codigo > 0) {
             $Where_cod = " AND codigo = " .$codigo;
        }
        try {
           
            $conn = $this-> banco_dados ->conectar();

            //Pegar os produtos armazenados no BD:
            $stmt = $conn->prepare("SELECT * FROM produto WHERE situacao = 'HABILITADO'" . $Where_cod);
            $stmt->execute();

             $resultado = $stmt-> fetchAll();
        }  catch(PDOException $e) { 
             $resultado["msg"] = "Erro ao selecionar produtos no banco de dados: " . $e->getMessage();;
             $resultado["cod"] = 0;
             $resultado["style"] = "alert-danger";
        }
        $conn = null;

        return $resultado;

    }

    function inserir($produto) {
        $this->pegar_valores_post($produto);

        try {
            $conn = $this-> banco_dados->conectar();

            $sql = "INSERT INTO produto 
                (nome, categoria, valor, foto, info_adicional, codigo_usuario) 
                VALUES 
                (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->nome,  $this->categoria,  $this->valor,  $this->foto,  $this->info,  $this->cod_usuario ]);
            $resultado["msg"] = "Produto inserido.";
            $resultado["cod"] = 1;
            $resultado["style"] = "alert-success";
        } catch(PDOException $e) { 
            $resultado["msg"] = "Erro ao inserir produto no banco de dados: " . $e->getMessage();;
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;

        return $resultado;
    }

    function atualizar($produto) {
        $this->pegar_valores_post($produto);

        try {
            $conn = $this-> banco_dados->conectar();
        
             $sql = "UPDATE produto SET nome = ?, categoria = ?, valor = ?, info_adicional = ?, data_hora = now()  WHERE codigo = ?";
             $stmt = $conn->prepare($sql);
             $stmt->execute([$this->nome, $this->categoria, $this->valor, $this->info, $this->codigo]);
    
              $resultado["msg"] = "Item alterado com sucesso!";
              $resultado["cod"] = 1;
              $resultado["style"] = "alert-success"; 
          } 
          catch(PDOException $e) { 
            $resultado["msg"] = "Erro ao alterar  produto no banco de dados: " . $e->getMessage();;
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null;
        return $resultado;

    }
      
    
    function remover($codigo) {
        try {
            $conn =  $this -> banco_dados->conectar();
            
            $sql = "UPDATE produto SET situacao = 'DESABILITADO'
                 WHERE codigo = ?";
         $stmt = $conn->prepare($sql); 
         $stmt->execute([$codigo]);
         
         $resultado["msg"] = "Item removido com sucesso!";
         $resultado["cod"] = 1;
         $resultado["style"] = "alert-success"; 
        } 
        catch(PDOException $e) { 
            $resultado["msg"] = "Erro ao remover produto no banco de dados: " . $e->getMessage();;
            $resultado["cod"] = 0;
            $resultado["style"] = "alert-danger";
        }
        $conn = null; 
        return $resultado;
    }
}
    
?>