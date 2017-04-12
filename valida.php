<?php
// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
if (!empty($_POST) AND ( empty($_POST['email_login']) OR empty($_POST['senha_login']))) {
    header("Location:index.php");
    exit;
}

require 'conexao.php';

$usuario = mysqli_real_escape_string($conn, $_POST['email_login']);
$senha = mysqli_real_escape_string($conn, $_POST['senha_login']);

// Validação do usuário/senha digitados
$sql = "SELECT * FROM usuario WHERE EMAIL = '" . $usuario . "' AND SENHA = '" . sha1($senha) . "' AND ativo = 1 LIMIT 1";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "<script>alert('Login ou senha inválido! Tente novamente')</script>";
    echo '<meta http-equiv="refresh" content="0, URL=index.php">';
    exit;
} else {
    // Salva os dados encontados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
}
// Se a sessão não existir, inicia uma
?>
<?php
session_start();

// Salva os dados encontrados na sessão
$_SESSION['UsuarioID'] = $resultado['id'];
$_SESSION['UsuarioNome'] = $resultado['NOME'];
$_SESSION['UsuarioNivel'] = $resultado['nivel'];
$_SESSION['UsuarioImagem'] = $resultado['IMG'];
$_SESSION['UsuarioData'] = $resultado['cadastro'];

// Redireciona o visitante
if ($_SESSION['UsuarioNivel'] == 1) {
    header("Location:logon.php");
    exit;
} else {
    header("Location:adm.php");
    exit;
}
?>