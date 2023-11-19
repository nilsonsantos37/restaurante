<?php session_start(); ?>
<?php if (isset($_SESSION["nome_usuario"]) ): ?>
<?php
        require_once("produto/ProdutoController.php");
        $produto_control = new ProdutoController();
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
</head>

<body>
<div class="container">
    
    <?php 
        $cod_prod = $_GET["cod_prod"] ?? "";
        $produtos = $produto_control -> selecionar($cod_prod); 
        ?>
      <form action="alterar_produto.php" method="POST">
        <h2>Produtos</h2>
        <br/>
        <div class="form-group">
                <label for="cod_prod">Código do produto:</label>
                <input type="text" required readonly value="<?= $produtos[0]['codigo']; ?>" class="form-control" name="cod_prod" id="cod_prod" >
            </div>
            <br/>
            <div class="form-group">
                <label for="nome_produto">Nome do produto:</label>
                <input type="text" required value="<?= $produtos[0]['nome']; ?>" class="form-control" name="nome_produto" id="nome_produto"   placeholder="Digite o produto">
            </div>
            <div class="form-group">
                 <label for="categoria_produto">Categoria:</label>
                 <input type="text" required value="<?= $produtos[0]['categoria']; ?>" class="form-control" name="categoria_produto" id="categoria_produto" placeholder="Digite a categoria do produto">
            </div>
            <div class="form-group">
                 <label for="valor_produto">Valor unitário (R$):</label>
                 <input type="number" required value="<?= $produtos[0]['valor']; ?>" step=".01" class="form-control" name="valor_produto" id="valor_produto" placeholder="Digite o valor">
            </div>
            <div class="form-group">
                 <label for="foto_produto">Foto:</label>
                 <input type="file" class="form-control" name="foto_produto" id="foto_produto"/>
            </div>
            <div class="form-group">
                 <label for="info_produto">Informações adicionais:</label>
                 <textarea class="form-control" name="info_produto" id="info_produto" rows="4" cols="50"><?= $produtos[0]['info_adicional']; ?></textarea>

            </div>
            <button type="submit" class="btn btn-primary">Alterar produto</button>
            <br/>
        </form>
        <?php if( isset($resultado) ): ?>
            <div class="alert <?= $resultado["style"] ?>">
               <?php echo $resultado["msg"]; ?>
            </div>
            <?php endif; ?>
            <br/><br/><br/>
        
    </div>
     <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
<?php else: ?>
    <div class="alert alert-danger">
   Você não está logado no sistema.
    </div>
<?php endif; ?>