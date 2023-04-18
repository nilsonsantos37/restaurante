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
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
</head>
<style type="text/css">
			body{
                background-image: url("R.jpg");
			
			}
			div.container{
			width: 20%;
			height: auto;
			
			border: 1px solid #606060;
			padding: 50px;
			border-radius: 50px;
			box-shadow: 10px 10px 0px #000;
			margin-top: 10%;
			/* Centralizando a div 
			
			*O atributo text-align foi depreciado. 
			
			*/
			margin-left: auto;
			margin-right: auto;
			}
			input[type='email'], input[type='password']{
			width: 250px;
			height: 40px;
			border: solid 1px #606060;
			border-radius: 8px;
			}
			input[type='password']{
			margin-left: 1px;
			}
			
			input[type='submit']{
			width: 150px;
			}
		</style>
<body>
    <div class="container">
            <h2>Efetue login</h2>
            
            <form id="form_login" action="index.php" method="POST">
                <?php if(isset($resultado) && $resultado["cod"] == 0): ?>
                <div class="alert alert-danger">
                    <?php echo $resultado["msg"]; ?>
                </div>
                <?php endif; ?>
                <input type="email" id="email" name="email" placeholder="Digite seu email"/>
                <br><br>
                <input type="password" id="senha" name="senha" placeholder="Digite sua Senha" />
                <br><br>
                <input type="submit" id="submiter" value="Entrar" class="btn btn-primary"/>
            </form>
    </div>
      </body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>