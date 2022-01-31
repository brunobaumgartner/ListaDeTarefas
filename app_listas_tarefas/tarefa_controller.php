<?php
require "../app_listas_tarefas/tarefa.model.php";
require "../app_listas_tarefas/tarefa.service.php";
require "../app_listas_tarefas/conexao.php";
//Verifica se recebeu um valor de acao pelo GET. Se não recebeu, adicio o valor $acao
$acao = isset($_GET["acao"]) ? $_GET["acao"] : $acao;
// Insere uma tarefa no banco de dados
if ($acao == 'inserir') {
     $tarefa = new Tarefa();
     $tarefa->__set('tarefa', $_POST['tarefa']);
     $conexao = new Conexao();
     $tarefaService = new TarefaService($conexao, $tarefa);
     $tarefaService->inserir();
     header('Location: nova_tarefa.php?inclusao=1');
}
//Busca as tarefas no banco 
else if ($acao == 'recuperar') {
     $tarefa = new Tarefa();
     $conexao = new Conexao();
     $tarefaService = new TarefaService($conexao, $tarefa);
     $tarefas = $tarefaService->recuperar();
} 
else if ($acao == 'atualizar') {
     $tarefa = new Tarefa();
     $tarefa->__set('id', $_POST['id']);
     $tarefa->__set('tarefa', $_POST['tarefa']);
     $conexao = new Conexao();
     $tarefaService = new TarefaService($conexao, $tarefa);
     $tarefaService->atualizar();
     if (isset($_GET['pag']) && $_GET['pag'] == 'home') {
          header('Location: home.php');
     } else {
          header('Location: todas_tarefas.php');
     }
} 
else if ($acao == 'remover') {
     $tarefa = new Tarefa();
     $tarefa->__set('id', $_GET['id']);
     $conexao = new Conexao();
     $tarefaService = new TarefaService($conexao, $tarefa);
     $tarefaService->remover();
     if (isset($_GET['pag']) && $_GET['pag'] == 'home') {
          header('Location: home.php');
     } else {
          header('Location: todas_tarefas.php');
     }
} 
else if ($acao == 'marcarRealizada') {
     $tarefa = new tarefa();
     $tarefa->__set('id', $_GET['id']);
     $tarefa->__set('id_status', 2);
     $conexao = new Conexao();
     $tarefaService = new TarefaService($conexao, $tarefa);
     $tarefaService->marcarRealizada();
     if (isset($_GET['pag']) && $_GET['pag'] == 'home') {
          header('Location: home.php');
     } else {
          header('Location: todas_tarefas.php');
     }
}
