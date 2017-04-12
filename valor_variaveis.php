<?php
require 'inserir_cadastro.php';
require_once ("Classes/Pessoa.class.php");
 $user = new Pessoa();
 $user ->getNome();
?>