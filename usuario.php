<?php session_start(); ?>
<?php if (isset($_SESSION["nome_usuario"]) ): ?>
    <?php 
        require_once("usuario/UsuarioController.php"); 
        $usuario_control = new UsuarioController();
        if ( count($_POST) > 0 ) {
            $resultado = $usuario_control -> cadastrar($_POST);
        }
        ?>
       
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    /* Adicione este estilo para posicionar no canto superior direito */
    .exit-button {
        position: fixed;
        top: 10px;
        right: 10px;
    }
</style>
<body>
    <div class="container">

        <form action="usuario.php" method="POST">
        <h2>Usuário</h2>
        <a href="index.php" class="nav-item nav-link active exit-button"><i class="fa fa-home"></i>Home</a>
            <br/>
            <div class="form-group">
            <label  for="nome_usuario">Nome do usuario:</label>
            <input type="text" required class="form_control" name="nome_usuario"
             id="nome_usuario" placeholder="Digite o nome do usuário">
            </div>

            <div class="form-group">
            <label  for="email_usuario">Email do usuario:</label>
            <input type="text" required class="form_control" name="email_usuario"
             id="email_usuario" placeholder="Digite o email do usuário">
            </div>

            <div class="form-group">
            <label  for="senha_usuario">Senha do usuario:</label>
            <input type="password" required class="form_control" name="senha_usuario"
             id="senha_usuario" placeholder="Digite a senha do usuário">
            </div>

            <div class="form-group">
            <label  for="senha_conf_usuario">Confirmação da senha do usuario:</label>
            <input type="password" required class="form_control" name="senha_conf_usuario"
             id="senha_conf_usuario" placeholder="Digite a senha_conf do usuário">
            </div>

            <button type="submit" class="btn btn-primary">Adicionar usuario</button>
            <br/>
            <?php if( isset($resultado) ): ?>
            <div class="alert <?= $resultado["style"] ?>">
               <?php echo $resultado["msg"]; ?>
            </div>

            <?php endif; ?>
        </form>
        <br/><br/><br/>

         <?php $usuarios =  $usuario_control->seleciona(); ?>
           
        <?php if(count($usuarios) > 0): ?>
         <h4>Usuários Cadastrados:</h4>

    <table id="tab_produto"class="table">
        <tr>
            <th>Cód.</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data registro</th>
            <th>Situação</th>
            <th></th>
        </tr>
        <?php foreach($usuarios as $u): ?>
        <tr id="usuario?=$u['codigo']?>">
              <td><?= $u["codigo"]; ?></td>
              <td><?= $u["nome"]; ?></td>
              <td><?= $u["email"]; ?></td>
              <td><?= $u["data_registro"]; ?></td>
              <td><?= $u["situacao"]; ?></td>
              <td>
                <a class="btn btn-outline-warning btn-sm" href="usuario_alterar.php?cod_usuario=<?=$u['codigo']?>">Alterar</a>
                 <a class="btn btn-outline-danger btn-sm" onclick="removerUsuario('<?=$u['nome']?>', <?=$u['codigo']?>)">Remover</a>
               </td>
              </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
     <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
function removerUsuario(nomeUsuario, codUsuario) {
    if( confirm('Remover ' + nomeUsuario + '?') ) {
        //ajax
    var ajax = new XMLHttpRequest();
    ajax.responseType = "json"; //chave-valor
        ajax.open("GET", "usuario_remover.php?cod_usuario="+codUsuario, true);
        ajax.send();
        ajax.addEventListener("readystatechange", function() {
        if(ajax.status === 200 && ajax.readyState === 4) {
            resposta = ajax.response.msg;
            alert(resposta);
            var row = document.getElementById("usuario"+codUsuario);
            location.reload();
        }
        });
    }
}

</script>

</html>
<?php else: ?>
    <div class="alert alert-danger">
   Você não está logado no sistema.
    </div>
<?php endif; ?>