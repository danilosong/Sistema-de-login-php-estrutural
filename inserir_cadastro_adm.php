<?php

// Conexão com o banco de dados
require 'conexao.php';
require_once ("Classes/Pessoa.class.php");

// Se o usuário clicou no botão cadastrar efetua as ações
if (isset($_POST['cadastrar_cad'])) {

    // Recupera os dados dos campos
    $nome = $_POST['nome_cad'];
    $email = $_POST['email_cad'];
    $senha = $_POST['senha_cad'];
    $senhaConfirma = $_POST['senha2_cad'];
    $niver = $_POST['niver_cad'];
    $foto = $_FILES["img_cad"];
    $sexo = $_POST['sexo_cad'];

    // Se a foto estiver sido selecionada
    if (!empty($foto["name"])) {

        // Largura máxima em pixels
        $largura = 1920;
        // Altura máxima em pixels
        $altura = 1080;
        // Tamanho máximo do arquivo em bytes
        $tamanho = 1000000;

        $error = array();

//Fim
        // Verifica se o arquivo é uma imagem
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
            $error[1] = "Isso não é uma imagem.";
        }

        // Pega as dimensões da imagem
        $dimensoes = getimagesize($foto["tmp_name"]);

        // Verifica se a largura da imagem é maior que a largura permitida
        if ($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
        }

        // Verifica se a altura da imagem é maior que a altura permitida
        if ($dimensoes[1] > $altura) {
            $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
        }

        // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if ($foto["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
        }

        //Verificando se algo foi digitado:
        if ($email != "") {
            $query = mysqli_query($conn, "SELECT * FROM usuario WHERE EMAIL = '" . $email . "'");

            if ($query == $email) {
                $error[5] = "Existe email cadastrado";  //existe imagem
            }
        }
        // Se não houver nenhum erro
        if (count($error) == 0) {

            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

            // Caminho de onde ficará a imagem
            $caminho_imagem = "fotos/" . $nome_imagem;

            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);

            // Insere os dados no banco
            $sql = mysqli_query($conn, " INSERT INTO usuario ( NOME, EMAIL, SENHA, SENHA2, DATA_NASC, IMG, NIVEL, CADASTRO, ATIVO, SEXO ) VALUES ( '" . $nome . "','" . $email . "',SHA1('" . $senha . "'),SHA1('" . $senhaConfirma . "'),'" . $niver . "',
			'" . $nome_imagem . "', 2,NOW(), 1, '" . $sexo . "' ) ");

            // Se os dados forem inseridos com sucesso
            if ($sql) {
                echo "<script> alert('Você foi cadastrado com sucesso.')</script>";
                echo '<meta http-equiv="refresh" content="0, URL=index.php">';
            }
        }

        // Se houver mensagens de erro, exibe-as
        if (count($error) != 0) {
            foreach ($error as $erro) {
                print "<script>alert('$erro');</script>";
                echo '<meta http-equiv="refresh" content="0, URL=cadastro.php">';
            }
        }
    }
}
?>