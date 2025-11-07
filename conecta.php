<?php
// conexao.php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$host = '200.18.128.54';
$porta = '5432';
$db = 'aula';
$usuario = 'aula';
$senha = 'aula';
$conexao="";

$conexao = pg_connect("host=$host dbname=$db user=$usuario password=$senha");

if(!$conexao){
	die("Erro na conexão");
}
?>