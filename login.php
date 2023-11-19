<?php 
    require_once("usuario/UsuarioController.php"); 
    $usuario_control = new UsuarioController();
    if ( count($_POST) > 0 ) {
         $resultado = $usuario_control -> login($_POST);
    }
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de pedido 1.0</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-rbs5b6SyIodqO6LPBqg5mGRHgDg3O/3UweZ6ZIuBFY7p2tA1DR3gWtN0JKMKPfU"
        crossorigin="anonymous">
</head>

<style type="text/css">
    body {
        background-image: url("./img/tela_fundos.jpg");
    }
    
    div.container {
        width: 80%; /* Ajusta a largura para ocupar 80% da largura da tela */
        max-width: 200px; /* Limita a largura máxima para uma melhor experiência em telas pequenas */
        height: auto;
        border: 1px solid #606060;
        padding: 50px;
        border-radius: 50px;
        box-shadow: 10px 10px 0px #000;
        margin: 10% auto; /* Centraliza verticalmente e centraliza horizontalmente */
    }

    input[type='email'],
    input[type='password'] {
        width: 100%; /* Ocupa 100% da largura do contêiner */
        height: 25px;
        border: solid 1px #606060;
        border-radius: 8px;
        margin-bottom: 15px; /* Adiciona um espaço entre os campos */
    }

    input[type='submit'] {
        width: 50%; /* Ocupa 50% da largura do contêiner */
        border-radius: 5px 5px 5px 5px;
        height: 25px;
        color: red;
    }

    .formBoxExtra {
        margin: 1rem 0; /* Adiciona espaço acima e abaixo do bloco extra */
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .formLinkExtra {
        font-size: 0.8rem;
        color-scheme: red;
    }
    .alert {
        color: white;
    }
        .text-center {
            color: white;
        }
</style>

<body>
    <div class="container">
        <h2 class="text-center">Efetue login</h2>

        <form id="form_login" action="login.php" method="POST">
            <?php if(isset($resultado) && $resultado["cod"] == 0): ?>
            <div class="alert alert-danger">
                <?php echo $resultado["msg"]; ?>
            </div>
            <?php endif; ?>
            <input type="email" id="email" name="email" placeholder="Digite seu email" />
            <input type="password" id="senha" name="senha" placeholder="Digite sua Senha" />
            <input type="submit" id="submiter" value="Entrar" class="btn btn-primary" />
            <div class="formBoxExtra" id="formBoxExtra">
                <!-- Se houver algum link extra, você pode adicionar aqui -->
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX0i/XjD0pTU2JYm9z"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9MvcJ4J/p0Xm4Lb/H49/xw1Xb4f7Mf6P1m3yAqrYU2VhNkFg1xNbA44/ZW9NQdYz9CpLmf08MdMbxzbZp9K3rCf/iT4Z"
        crossorigin="anonymous"></script>
</body>

</html>
