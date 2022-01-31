<?php
class Login {
     private $id;
     private $nome;
     private $email;
     private $senha;
     private $id_perfil;
     public function __get($atributo) {
          return $this->$atributo;
     }
     public function __set($atributo, $valor) {
          $this->$atributo = $valor;
     }
}
?>