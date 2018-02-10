<?php

require_once ("config.php");

//Carrega um usuário por ID
/*$root = new Usuario(); 
$root->loadById(3);
echo($root) ;*/

//Realiza uma busca na tabela
/*$busca = Usuario::search("ro");
echo json_encode($busca);*/

//Carrega um usuário usando o login e senha
/*$user = new Usuario;
$user->login("Gustavo",2014);
echo $user;*/

/*$aluno3 = new Usuario("aluno3","@#$e%");
$aluno3->insert();
echo $aluno3;*/

/*$user = new Usuario();
$user->loadById(13);
$user->update("professor","#%Fs%");
echo $user;*/

$user = new Usuario();
$user->loadById(18);
echo $user;
$user->delete();
echo $user;


//Carrega uma lista de usuários
/*$lista = Usuario::getLista();
echo json_encode($lista);*/