<!--Se o usuario estiver logado retorna a pagina de logon-->
<?php
// A sessão precisa ser iniciada em cada página diferente
session_start();

$nivel_necessario = 0;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ( $_SESSION['UsuarioNivel'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    ?>
    <?php
    session_start();
    $_SESSION['UsuarioNivel'] = 0;
    if ($_SESSION['UsuarioNivel'] == 1) {
        // Redireciona o visitante de volta para pagina do usuario
        header("Location: logon.php");
        exit;
    } else if ($_SESSION['UsuarioNivel'] == 2) {
        // Redireciona o visitante de volta para pagina do adm
        header("Location: adm.php");
        exit;
    }
}

$user = $_SESSION['UsuarioNivel'];

if (empty($user)) {
    $_SESSION['UsuarioNivel'] = 0;
    $_SESSION['UsuarioID'] = 0;
} else {
    // Redireciona o usuario
    if ($_SESSION['UsuarioNivel'] == 1) {
        header("Location: logon.php");
        exit;
    } else if ($_SESSION['UsuarioNivel'] == 2) {
        header("Location: adm.php");
        exit;
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
        <title>Login Beta Labs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="assets/css/bootstrap.css" rel="stylesheet">
    	<link href="assets/css/font-awesome.css" rel="stylesheet">
       <link href="estilos/bootstrap-social.css" rel="stylesheet" >
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="estilos/index.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-42119746-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
        <style type="text/css">
        body, html {
		height: 100%;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 71, 97));
    }

        .card-container.card {
        max-width: 350px;
        padding: 40px 40px;
    }

    .btn {
        font-weight: 700;
        height: 36px;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        cursor: default;
    }

    /*
     * Card component
     */
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
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
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

    /*
     * Form styles
     */
    .profile-name-card {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 0;
        min-height: 1em;
    }

    .reauth-email {
        display: block;
        color: #404040;
        line-height: 2;
        margin-bottom: 10px;
        font-size: 14px;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin #email_login,
    .form-signin #senha_login {
        direction: ltr;
        height: 44px;
        font-size: 16px;
    }

    .form-signin input[type=email],
    .form-signin input[type=password],
    .form-signin input[type=text],
    .form-signin button {
        width: 100%;
        display: block;
        margin-bottom: 10px;
        z-index: 1;
        position: relative;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        border-color: rgb(104, 145, 162);
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    }

    .btn.btn-signin {
        /*background-color: #4d90fe; */
        background-color: rgb(104, 145, 162);
        /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
        padding: 0px;
        font-weight: 700;
        font-size: 14px;
        height: 36px;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        border: none;
        -o-transition: all 0.218s;
        -moz-transition: all 0.218s;
        -webkit-transition: all 0.218s;
        transition: all 0.218s;
    }

    .btn.btn-signin:hover,
    .btn.btn-signin:active,
    .btn.btn-signin:focus {
        background-color: rgb(12, 97, 33);
    }

    .forgot-password {
        color: rgb(104, 145, 162);
    }

    .forgot-password:hover,
    .forgot-password:active,
    .forgot-password:focus{
        color: rgb(12, 97, 33);
    }
			.footer{width:100%; float:down;  height:50px;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" img src='fotos\beta.png' />
              <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" name="login" method="post" action="valida.php" id="login">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" class="form-control" placeholder="Login Email" id="email_login" name="email_login" required autofocus>
                    <input type="password" class="form-control" placeholder="Senha" id="senha_login" name="senha_login" maxlength="8" required>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
                </form><!-- /form -->
                <a href="cadastro.php" class="forgot-password">
                    Cadastrar-se
                </a>
            </div><!-- /card-container -->
        </div><!-- /container -->
        <script type="text/javascript">
        /**
         * function that checks if the browser supports HTML5
         * local storage
         *
         * @returns {boolean}
         */
        function supportsHTML5Storage() {
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        }
        </script>
<footer class="footer">
<br>
<p align="center"><font color="#FFFFFF" face="arial_black"><strong>Danilo Song</strong></font></p>
<div class="col-lg-6 col-lg-offset-2">
	<p align="center" class="col-lg-offset-7 col-lg-1"><a href="https://github.com/danilosong"  class="btn btn-social-icon btn-github" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-github']);"><span class="fa fa-github"></span></a></p>
		<p align="center" class="col-lg-offset-0 col-lg-1"><a href="https://www.linkedin.com/in/danilo-song-045a8a95/" class="btn btn-social-icon btn-linkedin" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-linkedin']);"><span class="fa fa-linkedin"></span></a></p>
  </div>
</footer>
</body>
</html>