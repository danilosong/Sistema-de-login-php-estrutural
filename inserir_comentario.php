<?php

session_start();
require 'conexao.php';

$id = $_SESSION['UsuarioID'];
$msg = $_POST['msg_coment'];

mysqli_query($conn, "INSERT INTO comentario (COMENTARIO, CRIACAO, MOD_CRIACAO,id_coment, id_fk) VALUES('" . $msg . "', now(), '','', '" . $id . "')");
?>

<?php
echo '<meta http-equiv="refresh" content="0, URL=comentarios.php">';
?>