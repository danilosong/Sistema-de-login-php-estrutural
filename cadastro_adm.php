<?php
// A sessão precisa ser iniciada em cada página diferente
session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ( $_SESSION['UsuarioNivel'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    $_SESSION['UsuarioNivel'] = $_SESSION['UsuarioNivel'];
    // Redireciona o visitante de volta pro login
    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
        <title>Cadastro ADMINISTRADOR Beta Labs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

        <script>
<!-- validar senha -->
function TestaSenha(valor) {
   var d = document.getElementById('seguranca');
   ERaz = /[a-z]/;
   ERAZ = /[A-Z]/;
   ER09 = /[0-9]/;
   ERxx = /[@!#$%&*+=?|-]/;
   if(valor.length == ''){
   } else {
      if(valor.length < 8){
         d.innerHTML = 'Seguranca da senha: <font color=\'red\'> BAIXA</font>';
     } else {
        if (valor.length === 8 && valor.search(ERaz) !== - 1 && valor.search(ERAZ) !== - 1 && valor.search(ER09) !== - 1 || valor.length > 7 && valor.search(ERaz) !== - 1 && valor.search(ERAZ) !== - 1 && valor.search(ERxx) || valor.length > 7 && valor.search(ERaz) !== - 1 && valor.search(ERxx) !== - 1 && valor.search(ER09) || valor.length > 7 && valor.search(ERxx) !== - 1 && valor.search(ERAZ) !== - 1 && valor.search(ER09)){
            d.innerHTML = 'Seguranca da senha: <font color=\'green\'> ALTA</font>';
        } else {
            if (valor.search(ERaz) !== - 1 && valor.search(ERAZ) !== - 1 || valor.search(ERaz) !== - 1 && valor.search(ER09) !== - 1 || valor.search(ERaz) !== - 1 && valor.search(ERxx) !== - 1 || valor.search(ERAZ) !== - 1 && valor.search(ER09) !== - 1 || valor.search(ERAZ) !== - 1 && valor.search(ERxx) !== - 1 || valor.search(ER09) !== - 1 && valor.search(ERxx) !== - 1){
                d.innerHTML = 'Seguranca da senha: <font color=\'orange\'> MEDIA</font>';
            } else {
                d.innerHTML = 'Seguranca da senha: <font color=\'red\'> BAIXA</font>';
            }
        }
    }
}
}

<!-- verificar as duas senhas -->
function validarSenha(){
    senha1 = document.formuser.senha_cad.value;
    senha2 = document.formuser.senha2_cad.value;

    if (senha1 === senha2)
        return true;
    else
        alert("SENHAS DIFERENTES");
    return false;
}
</script> 
    
            <style type="text/css">
                @import url(http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700);
        @import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700);

            html,body {
            height: 100%;
            background-repeat: no-repeat;
            background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 71, 97));
        }

        h1, h2, h3, h4, h5, h6 {
          font-family: 'Roboto Condensed', sans-serif;
          font-weight: 400;
          color:#111;
          margin-top:5px;
          margin-bottom:5px;
        }
        h1, h2, h3 {
          text-transform:uppercase;
        }

        input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 12px;
            cursor: pointer;
            opacity: 1;
            filter: alpha(opacity=1);    
        }

        .form-inline .form-group{
            margin-left: 0;
            margin-right: 0;
        }
        .control-label {
            color:#333333;
        }
            .card {
            background-color: #F7F7F7;
            /* just in case there no content*/
            padding: 30px 15px 10px;
            margin: auto auto auto;
            margin-top: auto;
          margin-left: auto;
          margin-right: auto;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 0px 0px 106px 0px;
            -moz-box-shadow: 5px 5px 10px #00001a;
            -webkit-box-shadow: 5px 5px 10px #00001a;
            box-shadow: 5px 5px 10px #00001a;
        }
            .textosombra {
              text-shadow: #000 1px 1px 1px;
            }
            .profile-img-card {
            width: 130px;
            height: 130px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
                </style>
                <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            </head>
            <body>
                <div class="container">

                    <div class="row">
                        <div class="col-md-8">
                            <section>
                                <p align="center"><a href="adm.php" ><img id="profile-img" class="profile-img-card" img src='fotos\beta.png' /></a></p>
                                <div class="card">
                                    <form class="form-horizontal" name="formuser" enctype="multipart/form-data" action="inserir_cadastro_adm.php" method="post"> 
                                        <p align="center"><label>Cadastro de administrador</label></p>
                                        <!-- cadastro email -->       
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Email ID <span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                    <input type="email" placeholder="Entre com seu Email" id="email_cad" name="email_cad" class="form-control input-md" Onblur="valida_form (this.value)" required>
                                                </div>
                                                <small> Seu E-mail está sendo usado para garantir a segurança de sua conta, autorização e recuperação de acesso. </small> </div>
                                        </div>

                                        <!-- cadastro senha -->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Senha <span class="text-danger">*</span></label>
                                            <div class="col-md-5 col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                    <input class="form-control" placeholder="Escolha uma senha (8 caracteres)" id="senha_cad" name="senha_cad" type="password" placeholder="Senha" maxlength="8" minlength="8" onKeyUp="TestaSenha(this.value);" required>              
                                                </div>
                                                <small><p id="seguranca"></p></small>   
                                            </div>
                                        </div>

                                        <!-- confirmar senha -->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Confirma Senha <span class="text-danger">*</span></label>
                                            <div class="col-md-5 col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                    <input class="form-control" placeholder="Confirmar a senha" id="senha2_cad" name="senha2_cad" type="password" maxlength="8" minlength="8" required>
                                                </div>  
                                            </div>
                                        </div>

                                        <!-- cadastro nome-->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Nome Completo <span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-sm-9">
                                                <input class="form-control" placeholder="Digite o nome completo" id="nome_cad" name="nome_cad" type="text" required>
                                            </div>
                                        </div>

                                        <!--SEXO -->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Sexo<span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-sm-9">
                                                <label>
                                                    <input name="sexo_cad" id="sexo_cad" type="radio" value="M" checked>
                                                    Masculino </label>
                                                   
                                                <label>
                                                    <input name="sexo_cad" id="sexo_cad" type="radio" value="F" >
                                                    Feminino </label>
                                            </div>
                                        </div>

                                        <!--Data de aniversario-->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Data de aniversário<span class="text-danger">*</span></label>
                                            <div class="col-md-4 col-sm-9">
                                                <input type="date" class="form-control" id="niver_cad" name="niver_cad" class="form-control input-md" placeholder="Data de aniversário" required>
                                            </div>
                                        </div>
                                        <!-- foto de perfil -->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Foto de perfil<span class="text-danger">*</span><br>
                                            </label>
                                            <div class="col-md-6 col-sm-8">
                                                <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
                                                    <input class="form-control upload" id="img_cad" name="img_cad" type="file" maxlength="1" required aria-describedby="file_upload">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-offset-3 col-md-8 col-sm-9">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-offset-3 col-xs-10">
                                                <input class="btn btn-primary" id="cadastrar_cad" name="cadastrar_cad" type="submit" onClick="return validarSenha()">
                                                <button id="limpar_cad" name="limpar_cad" class="btn btn-default" type="reset">Limpar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>