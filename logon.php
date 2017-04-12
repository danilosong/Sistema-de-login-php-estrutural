 <?php
// A sessão precisa ser iniciada em cada página diferente
session_start();

$nivel_necessario = 1;

if ($_SESSION['UsuarioNivel'] != $nivel_necessario = 1) {
    header("Location:index.php");
    exit;
}

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ( $_SESSION['UsuarioNivel'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    session_start();
    $_SESSION['UsuarioNivel'] = 0;
    // Redireciona o visitante de volta pro login
    header("Location:index.php");
    exit;
    session_destroy();
}
?>
<h1 align="center"><b>Bem-vindo</b></h1><?php
echo "<img src='fotos/" . $_SESSION['UsuarioImagem'] . "' alt='Foto de Exibição' class='profile-img-card'/>"
?>

<html>
    <head>
        <meta charset="utf-8">
        <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
        <title>Painel do administrador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    
    body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 71, 97));
}

    body { padding-top:20px; }
    .panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }
                        /* Animicoes para botao */
            
            .loading,.loading>td,.loading>th,.nav li.loading.active>a,.pagination li.loading,.pagination>li.active.loading>a,.pager>li.loading>a{
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 0));
            background-size: 40px 40px;
            animation: 2s linear 0s normal none infinite progress-bar-stripes;
            -webkit-animation: progress-bar-stripes 2s linear infinite;
}
            .btn.btn-default.loading,input[type="text"].loading,select.loading,textarea.loading,.well.loading,.list-group-item.loading,.pagination>li.active.loading>a,.pager>li.loading>a{
            background-image: linear-gradient(45deg, rgba(235, 235, 235, 0.15) 25%, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0) 50%, rgba(235, 235, 235, 0.15) 50%, rgba(235, 235, 235, 0.15) 75%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 0));
}

   .profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

    .card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -webkit-box-shadow: 0px 0px 97px -5px rgba(0,0,0,0.34);
    -moz-box-shadow: 0px 0px 97px -5px rgba(0,0,0,0.34);
    box-shadow: 0px 0px 97px -5px rgba(0,0,0,0.34);
}

    .card {
    max-width: 1230px;
    padding: 40px 40px;
}
</style>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="card">
            <p align="center"><font size="5"><b>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</b></font></p>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-lg-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" align="center">
                                <h3 class="panel-title">
                                    <span class="glyphicon glyphicon-bookmark"></span>Ferramentas</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">	
                                    <div class="col-xs-9 col-md-8 col-lg-12" align="center">
                                        <a href="comentarios.php" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span><br/><small>Comentários</small></a>
                                        <a href="cadastro_edit.php" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/><small>Editar</small></a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p align="center"><a href="logout.php" class="btn btn-danger loading">Sair</a></p>
            <script type="text/javascript">

            </script>
        </div>
    </body>
</html>
