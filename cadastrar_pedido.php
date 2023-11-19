<?php 
  session_start();
if(count($_POST) > 0) {

    //1. pegar os valores do formulário
    $nome   = $_POST["nome_produto"];
    $qtd    = $_POST["qtd_produto"];
    $obs    = $_POST["obs_produto"];
    $preco  = $_POST["preco_produto"]; 
    $cod_usuario = $_SESSION["codigo_usuario"];
    
    try {
        include("bd/BancoDados.php");
      
        $conn = new BancoDados();
        $conn = $conn ->conectar();

         // 3. verificar se email e senha estão no BD
         $sql = "INSERT INTO item_pedido 
         (nome_produto, quantidade, preco_und, observacao, cod_usuario,data_hora) 
         VALUES 
         (?,?,?,?,?,?)";
         $stmt = $conn->prepare($sql);
         $stmt->execute([$nome, $qtd , $preco, $obs, $cod_usuario, date('Y-m-d H:i:s')    ]);

          $resultado["msg"] = "Item inserido com sucesso!";
          $resultado["cod"] = 1;
          $resultado["style"] = "alert-success" ; 
      } 
      catch(PDOException $e) { 
        $resultado["msg"] = "Inserção no banco de dados falhou: " . $e->getMessage();;
        $resultado["cod"] = 0;
        $resultado["style"] = "alert-danger";
      }     
      $conn = null;
    }    
include("pedido.php");
?>