<?php
session_start();
require "../../app_listas_tarefas/login.model.php";
require "../../app_listas_tarefas/login_service.php";
require "../../app_listas_tarefas/conexao.php";
$user_auth = false;
$user_id = null;
$user_perfil_id = null;
$name = null;
$login = new Login();
$conexao = new Conexao();
$loginService = new LoginService($conexao, $login);
$logins = $loginService->recuperar();
echo '<pre>';
print_r($logins);
echo '<pre>';
foreach ($logins as $user) {
     if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['password']) {
          $user_auth = true;
          $user_id = $user['id'];
          $id_perfil = $user['id_perfil'];
          $name = $user['nome'];
     }
}
if ($user_auth) {
     $_SESSION['authenticated'] = 'Y';
     $_SESSION['id'] = $user_id;
     $_SESSION['id_perfil'] = $id_perfil;
     $_SESSION['nome'] = $name;

     header('Location: ../home.php');
} else {
     $_SESSION['authenticated'] = 'N';
     header('Location: ../index.php?login=erro');
}
