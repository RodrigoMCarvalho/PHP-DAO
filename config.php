<?php
spl_autoload_register(function($nomeClasse){
	require_once "class".DIRECTORY_SEPARATOR.$nomeClasse.".php";
});

