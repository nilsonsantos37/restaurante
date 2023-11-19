<?php 

if (session_status() != PHP_SESSION_ACTIVE) {
    // Sessão ativa
    session_start();
}   


?>
<?php if (isset($_SESSION["nome_usuario"]) ): ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
     <form action="cadastrar_pedido.php" method="POST"> 
        <h5>Olá, <?= $_SESSION["nome_usuario"]; ?>!
        <h2>Escolha de itens do pedido</h2>
        <br/>
     <div class="form-group">
     <label for="nome_produto">Nome do produto:</label>
     <input type="text" class="form-control" id="nome_produto" name="nome_produto"  placeholder="Digite o produto">
     </div>
     <div class="form-group">
     <label for="qtd_produto">Quantidade:</label>
     <input type="number" class="form-control" id="qtd_produto" name="qtd_produto" maxlength="10">
     </div>
     <div class="form-group">
     <label for="obs_produto">Observação:</label>
     <input type="text" class="form-control" id="obs_produto" name="obs_produto">
     </div>
     <div class="form-group">
     <label for="preco_produto">Preço unitário:</label>
     <input type="text" class="form-control" id="preco_produto" name="preco_produto">
     </div>
     <button type="submit" class="btn btn-primary">Adicionar item</button>
     <?php if( isset($resultado) ): ?>
           <div class="alert <?= $resultado["style"]?> ">
               <?php echo $resultado["msg"]; ?>
            </div>
        <?php endif; ?>
    </form>
    </div>
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