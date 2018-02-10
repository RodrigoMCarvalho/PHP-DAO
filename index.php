<?php

require_once ("config.php");

$root = new Usuario();
$root->loadById(7);
echo($root) ;


/*$result = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($result);*/