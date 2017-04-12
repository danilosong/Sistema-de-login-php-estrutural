<?php
class Pessoa{
    //Atributos
    
    private $_nome;
    private $_email;
    private $_senha;
    private $_senhaConfirma;
    private $_niver;
    private $_imagem;
    
    //metodos
    
    public function setNome($nome) {
        $this->_nome = $nome;   
    }
    
    public function getNome() {
      return $this->_nome;   
    }
    
    public function setEmail($email) {
        $this->_email = $email;   
    }
    
    public function getEmail() {
      return $this->_email;
    }
    
    public function setSenha() {
        return $this->_senha;
    }
    
    public function getSenha() {
        return $this->_senha;
    }
    public function setSenhaConfirma($senhaConfirma) {
        $this->_senhaConfirma = $senhaConfirma;
    }

    public function getSenhaConfirma() {
        return $this->_senhaConfirma;
    }

    public function setNiver($niver) {
        $this->_niver = $niver;
    }

    public function getNiver() {
        return $this->_niver;
    }

    public function setImagem($imagem) {
        $this->_imagem = $imagem;
    }

    public function getImagem() {
        return $this->_imagem;
    }
    
}
   ?> 