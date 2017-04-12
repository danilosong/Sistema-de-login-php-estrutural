<?php
// A sessão precisa ser iniciada em cada página diferente
session_start();
?>

<?php
$nivel_necessario = 1;
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ( $_SESSION['UsuarioNivel'] < $nivel_necessario)) {
    exit;
}
?>
<?php 

if(empty($_SESSION['UsuarioImagem']))
{
    $imagem = "beta.png";
    $_SESSION['UsuarioImagem'] = $imagem;
    echo "<img src='fotos/" . $imagem . "' alt='Foto de Exibição' class='profile-img-card'/>";
}
else
echo "<img src='fotos/" . $_SESSION['UsuarioImagem'] . "' alt='Foto de Exibição' class='profile-img-card'/>";
?>
<?php
require 'conexao.php';
$coment = $_POST['edit_msg'];

$query = mysqli_query($conn, "SELECT COMENTARIO, MOD_CRIACAO,id_coment FROM comentario where id_coment = '".$coment."' ;");
$consulta = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
        <title>Comentários Beta Labs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="estilos/comentarios.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <p align="center"><small><strong><a href="comentarios.php" style="color: #FFF">Voltar</a></strong></small></p>
    <body>
    <style type="text/css">
        .teste { background: #fafafa;}
        .teste1 {
        padding: 0;
    }
        body, html {
        height: 100%;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 71, 97));
    }
    </style>
           <link rel="stylesheet" type="text/css" href="estilos/msgbox.css" />
        <!-- COMENTARIOS -->
        <div class="container">
            <div class="row">
                <div class="span6">
				<div class="widget-area no-padding blank">
                   <div class="status-upload">
                    <form id="msg" name="msg" method="post" action="editar_msg.php">
                			<textarea id="msg_coment" name="msg_coment"><?php echo $consulta['COMENTARIO']; ?></textarea>
							<button type="submit" class="btn btn-success green" name="edit" id="edit" value="<?php echo $coment ?>"><em class="fa fa-share"></em> Editar</button>
                		</div>                 
                </div>
            </div>
        </form>
          </div>
		</div>
    </div>
</body>
</html>