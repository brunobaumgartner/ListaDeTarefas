<?php
class Tarefa {
     private $id;
     private $id_status;
     private $tarefas;
     private $data_cadastro;
     private $id_user;
     private $id_perfil;
     public function __get($atributo) {
          return $this->$atributo;
     }
     public function __set($atributo, $valor) {
          $this->$atributo = $valor;
     }
}
?>