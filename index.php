<?php

require_once ("config.php");

//Carrega uma lista de usuários
/*$lista = Usuario::getLista();
echo json_encode($lista);*/

//Carrega um usuário por ID
$root = new Usuario(); 
$root->loadById(3);
echo($root) ;

//Realiza uma busca na tabela
/*$busca = Usuario::search("ro");
echo json_encode($busca);*/

//Carrega um usuário usando o login e senha
/*$user = new Usuario;
$user->login("Gustavo",2014);
echo $user;*/



/*$result = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($result);*/