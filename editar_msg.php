<?php
require 'conexao.php';

$msg = $_POST['msg_coment'];
$idmsg = $_POST['edit'];

mysqli_query($conn, "UPDATE comentario SET COMENTARIO = '".$msg."', MOD_CRIACAO = NOW() WHERE comentario.id_coment = '".$idmsg."' ");
?>
<?php

echo '<meta http-equiv="refresh" content="0, URL=comentarios.php">';
?>