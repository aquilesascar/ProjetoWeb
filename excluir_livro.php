<?php
include 'conecta.php';

// Verifica se o ID foi enviado via POST
if(isset($_POST['id'])) {
	$id_livro = $_POST['id'];

	// (Troque 'aquiles_ascar' pelo seu esquema)
	$sql = "DELETE FROM aquiles_ascar.livro WHERE id_livro = $id_livro";
	
	$result = pg_query($conexao, $sql);
	
	if(!$result) {
		echo "Erro ao excluir: " . pg_last_error($conexao);
	}
}

// Redireciona de volta para a listagem
header('Location: listar_livros_autores.php');
exit;
?>