<?php

session_start(); // Inicia a sessão
session_destroy(); // Destrói a sessão limpando todos os valores salvos
session_start();
header("Location: index.php", $_SESSION['UsuarioNivel'] = 0);
exit; // Redireciona o visitante
?>