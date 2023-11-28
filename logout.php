<?php
session_start(); // Inicia a sessão
session_destroy(); // Destrói a sessão

// Redireciona para a página de login ou para onde você deseja após o logout
header("Location: login.php");
exit();
?>
