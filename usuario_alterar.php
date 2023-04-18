<?php session_start(); ?>
<?php if (isset($_SESSION["nome_usuario"]) ): ?>
<?php
        require_once("usuario/UsuarioController.php");
        $usuario_control = new UsuarioController();
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
        $cod_usuario = $_GET["cod_usuario"];
        $usuario = $usuario_control -> seleciona($cod_usuario); 
        ?>
      <form action="alterar_usuario.php" method="POST">
        <h2>usuario</h2>
        <br/>
        <div class="form-group">
                <label for="cod_usuario">Código do usuario:</label>
                <input type="text" required readonly value="<?= $usuario[0]['codigo']; ?>" class="form-control" name="cod_usuario" id="cod_usuario" >
            </div>
            <br/>
            <div class="form-group">
                <label for="nome_usuario">Nome do usuario:</label>
                <input type="text" required value="<?= $usuario[0]['nome']; ?>" class="form-control" name="nome_usuario" id="nome_usuario"   placeholder="Digite o Usuario">
            </div>
            <div class="form-group">
                 <label for="email_usuario">E-mail do Usuario:</label>
                 <input type="text" required value="<?= $usuario[0]['email']; ?>" class="form-control" name="email_usuario" id="email_usuario" placeholder="Digite o E-mail">
            </div>
            <div class="form-group">
                 <label for="senha_usuario">senha_usuario:</label>
                 <input type="number" required value="<?= $senha_usuario[0]['senha']; ?>" step=".01" class="form-control" name="senha_usuario" id="senha_usuario" placeholder="Digite a Senha">
            </div>
            <div class="form-group">
                 <label for="data_registro">Data de registro:</label>
                 <input type=" date('Y-m-d-H:i:s')" class="form-control" name="data_registro" id="data_registro"/>
            </div>
            <div class="form-group">
                 <label for="data_alteracao">data de alteracao :</label>
                 <input type=" date('Y-m-d-H:i:s')" class="form-control" name="data_alteracao" id="data_alteracao"/>
            </div>
            <div class="form-group">
                 <label for="situacao_usuario">Situação do Usuario :</label>
                 <textarea class="form_control" name="situacao_usuario" id="situacao_usuario" rows="4" cols="50"><?= $usuario[0]['situacao']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Alterar usuario</button>
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