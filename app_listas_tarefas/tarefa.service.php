<?php
class TarefaService{
     private $conexao;
     private $tarefa;
     public function __construct(Conexao $conexao, Tarefa $tarefa){
          $this->conexao = $conexao->conectar();
          $this->tarefa = $tarefa;
     }
     public function inserir(){
          session_start();
          $query = 'insert into tb_tarefas(tarefa, id_user, id_perfil)values(:tarefa, :id_user, :id_perfil)';
          $stmt = $this->conexao->prepare($query);
          $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
          $stmt->bindValue(':id_user', $_SESSION['id']);
          $stmt->bindValue(':id_perfil', $_SESSION['id_perfil']);
          $stmt->execute();
     }
     public function recuperar(){
          $query = 'select    a.id,
                              a.tarefa, 
                              a.id_status, 
                              a.id_user, 
                              b.status, 
                              a.id_perfil 
                    from tb_tarefas a 
                    join tb_status b
                    where b.id = a.id_status;';
          $stmt = $this->conexao->prepare($query);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     public function atualizar(){
          $query = 'update tb_tarefas set tarefa = :tarefa where id = :id';
          $stmt = $this->conexao->prepare($query);
          $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
          $stmt->bindValue(':id', $this->tarefa->__get('id'));
          $stmt->execute();
     }
     public function remover(){
          $query = 'delete from tb_tarefas where id = :id';
          $stmt = $this->conexao->prepare($query);
          $stmt->bindValue(':id', $this->tarefa->__get('id'));
          $stmt->execute();
     }
     public function marcarRealizada(){
          $query = 'update tb_tarefas set id_status = :id_status where id = :id';
          $stmt = $this->conexao->prepare($query);
          $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
          $stmt->bindValue(':id', $this->tarefa->__get('id'));
          return $stmt->execute();
     }
}