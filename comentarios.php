<?php
// A sessão precisa ser iniciada em cada página diferente
session_start();
?>

<?php
$nivel_necessario = 0;
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
$consulta_coment = mysqli_query($conn, "SELECT id, NOME, IMG, COMENTARIO, CRIACAO , MOD_CRIACAO,id_coment FROM usuario right JOIN comentario on usuario.id = comentario.id_fk order by id_coment desc ;")
?>
<!DOCTYPE html>
<html>
    <head>
    <p align="center"><small><strong><a href="index.php" style="color: #FFF">Voltar</a></strong></small></p>
        <meta charset="utf-8">
        <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
        <title>Comentários Beta Labs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="estilos/comentarios.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            //diferentes submit
            function Enviar(opc)
            {
                if(opc == 0)
                {
                    document.Editar.action = "edit.php";
                }
                if(opc == 1)
                {
                    document.Editar.action = "deletar_msg.php";
                }
            }
        </script>
    </head>
    <body>
    <style type="text/css">
        .teste { background: #fafafa;}
        .teste1 {
        padding: 0;
    }
        body, html {
        
        background-repeat: no-repeat;
        background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 71, 97));
    }

.btn-link, .btn-link:active, .btn-link[disabled], fieldset[disabled] .btn-link {
color: #000000;
background-color: transparent;
border: none;
-webkit-box-shadow: 0;
box-shadow: 0;
}
.button:hover {
    text-decoration:none; 
   border-top-color: #e6e6e6;
   background: #e6e6e6;
   color: #000000;
   }
    </style>
           <link rel="stylesheet" type="text/css" href="estilos/msgbox.css" />
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3><font color="white">Comentários</font></h3>
                    <hr>
                </div>
            </div>
            <!-- INICIO -->
            <form id="Editar" name="Editar" method="post">
             <div class="rolagem2 teste1 teste">
                                         <?php
            while ($consulta = mysqli_fetch_array($consulta_coment)) 
            {
                ?>
                <div class="row">
                    <div class="col-sm-1">
                        <div class=".profile-img-card2">
                            <img class='profile-img-card2' <?php echo "src='fotos/" . $consulta['IMG'] . "'" ?>/>
                        </div>
                    </div>
                    <?php
                    // Invertendo a data
                    $data = $consulta['CRIACAO'];
                    $datamod = $consulta['MOD_CRIACAO'];

                    ?>
                    <div class="col-sm-5 col-lg-offset-0">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <?php
                            if($datamod == 0)
                            { 
                            ?>
                                <strong><?php echo $consulta['NOME']; ?></strong><small><span class="text-muted"> Comentado em <?php echo date('d/m/Y H:i:s', strtotime($data)); ?></small>
                                 <?php } else { ?>
                                <strong><?php echo $consulta['NOME']; ?></strong><small><span class="text-muted"> Comentado em <?php echo date('d/m/Y H:i:s', strtotime($data)); ?> Editado em <?php echo date('d/m/Y H:i:s', strtotime($datamod)); ?></small>
                                <?php } ?>
                        <?php
                        // botao
                        $user = $_SESSION['UsuarioNivel'];
                        $iduser = $consulta['id'];

                         if (empty($user)) {
                        $_SESSION['UsuarioID'] = 0;
                                          }

                        else if ($iduser == $_SESSION['UsuarioID'] || $_SESSION['UsuarioNivel'] == 2) {
                            ?>
                                        <!-- Single button -->
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="edit_msg" name="edit_msg" <?php $valor = $consulta['id_coment'];?>  value="<?php echo $valor ?>" >
                                        <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                        <li><button id="edit_msg" name="edit_msg" <?php $valor = $consulta['id_coment'];?>  value="<?php echo $valor ?>"  class="btn-link button" type="submit" onClick="Enviar(0)">Editar</button></li>
                                        <?php
                                        if($_SESSION['UsuarioNivel'] == 2)
                                        {
                                        ?>
                                        <li><button id="del_msg" name="del_msg" class="btn-link button" value="<?php echo $valor ?>" onClick="Enviar(1)">Apagar</button></li>
                                        <?php } else {}?>
                                        </ul>
                                        </div>
                                        <?php } else { }?>
                                </span>
                            </div>
                            <div class="panel-body rolagem"><i><?php echo wordwrap($consulta['COMENTARIO'],50, "<br />\n", true);?></i></div>
                        </div>
                    </div>
                </div>
                <br>
                <?php } ?>
        </form>
        </div>
        </div>
        <script type="text/javascript"></script>

        <!-- COMENTARIOS -->
            <?php
                if($_SESSION['UsuarioNivel'] == 1 || $_SESSION['UsuarioNivel'] == 2){
            ?>
        <div class="container">
            <div class="row">
                <div class="span6">
				<div class="widget-area no-padding blank">
                   <div class="status-upload">
                    <form id="msg" name="msg" method="post" action="inserir_comentario.php">
                			<textarea placeholder="Digite seu comentario..." id="msg_coment" name="msg_coment"></textarea>
							<button type="submit" class="btn btn-success green"><em class="fa fa-share"></em> Enviar</button>
                		</div>                 
                </div>
            </div>
            <?php }
            else
            {
            ?>
            <?php }?>

        </form>
          </div>
		</div>
    </div>
</body>
</html>