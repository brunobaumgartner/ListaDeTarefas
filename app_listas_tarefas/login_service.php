<?php
class LoginService{
     private $conexao;
     private $login;
     public function __construct(Conexao $conexao, login $login){
          $this->conexao = $conexao->conectar();
          $this->login = $login;
     }
     public function recuperar(){
          $query = 'select a.id, a.nome, a.email, a.senha, a.id_perfil, b.perfil from tb_usuarios a join tb_perfil b where b.id = a.id_perfil';
          $stmt = $this->conexao->prepare($query);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
}
?>