<?php
require 'conexao.php';

$delete = $_POST['del_msg'];

mysqli_query($conn, "DELETE FROM comentario WHERE comentario.id_coment = '".$delete."' ");
?>

<?php
echo '<meta http-equiv="refresh" content="0, URL=comentarios.php">';
?>