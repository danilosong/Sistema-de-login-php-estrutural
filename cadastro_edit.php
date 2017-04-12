<?php
// A sessão precisa ser iniciada em cada página diferente
session_start();

$nivel_necessario = 1;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ( $_SESSION['UsuarioNivel'] < $nivel_necessario)) {
    $_SESSION['UsuarioNivel'] = $_SESSION['UsuarioNivel'];
    // Redireciona o visitante de volta pro login
    header("Location:index.php");
    exit;
}
?>
<?php
    require 'conexao.php';
    $iduser = $_SESSION['UsuarioID'];
    $query = mysqli_query($conn, "SELECT id, NOME,EMAIL,DATA_NASC,IMG FROM usuario WHERE id = '".$iduser."';");
    $consulta = mysqli_fetch_array($query);
    $_SESSION['img'] = $consulta['IMG'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
        <title>Cadastro Beta Labs</title>
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
                            html,body {
                        height: 100%;
                        background-repeat: no-repeat;
                        background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 71, 97));
                    }
    </style>
   
                <link href="estilos/cadastro.css" rel="stylesheet">
                <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            </head>
            <body>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <section>
                                <p align="center"><a href="index.php" ><img id="profile-img" class="profile-img-card" img src='fotos\beta.png' /></a></p>
                                <div class="card">
                                    <form class="form-horizontal" name="formuser" enctype="multipart/form-data" action="inserir_alteracao.php" method="post"> 

                                        <!-- cadastro email -->       
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Email ID <span class="text-danger">*</span></label>
                                            <div class="col-md-8 col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                    <input type="email" placeholder="Entre com seu Email" id="email_cad" name="email_cad" class="form-control input-md" value="<?php echo $consulta['EMAIL'] ?>" readonly>
                                                </div>
                                                </div>
                                        </div>

                                        <!-- cadastro senha -->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Nova senha <span class="text-danger">*</span></label>
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
                                                <input class="form-control" placeholder="Digite o nome completo" id="nome_cad" name="nome_cad" type="text" value="<?php echo $consulta['NOME'];?>" required>
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
                                                <input type="date" class="form-control" id="niver_cad" name="niver_cad" class="form-control input-md" placeholder="Data de aniversário" value="<?php echo $consulta['DATA_NASC'];?>" required>
                                            </div>
                                        </div>
                                        <!-- foto de perfil -->
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Foto de perfil<br>
                                            </label>
                                            <div class="col-md-6 col-sm-8">
                                                <div class="input-group"> <span class="input-group-addon" id="file_upload"><i class="glyphicon glyphicon-upload"></i></span>
                                                    <input class="form-control upload" id="img_cad" name="img_cad" type="file" maxlength="1" aria-describedby="file_upload" >
                                                </div>
                                            </div>
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