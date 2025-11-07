<?php
include 'conecta.php';

// 1. Receber os dados do formulário via POST
$id_livro = $_POST['id_livro'];
$titulo = $_POST['txtTitulo'];
$isbn = $_POST['txtIsbn'];
$ano = $_POST['txtAno'];
$id_autor = $_POST['txtAutor'];

// 2. Montar o SQL de UPDATE
// (Troque 'aquiles_ascar' pelo seu esquema)
$sql = "UPDATE aquiles_ascar.livro 
		SET 
			titulo = '$titulo', 
			isbn = '$isbn', 
			ano_publicacao = '$ano', 
			id_autor = '$id_autor'
		WHERE 
			id_livro = $id_livro";

$result = pg_query($conexao, $sql);

$status_message = "";
if(!$result){
	$status_message = "<h3 style='color: red;'>Erro ao salvar alterações: " . pg_last_error($conexao) . "</h3>";
} else {
	$status_message = "<h3 style='color: blue;'>Livro '" . htmlspecialchars($titulo) . "' atualizado com sucesso!</h3>";
}

pg_close($conexao);
?>
<html>
	<head>
		<title>Status da Edição</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<?php echo $status_message; ?>
			
			<div class="button-group">
				<input type="button" value="Voltar para Listagem" class="btn-listar" 
					   onclick="window.location.href='listar_livros_autores.php';"/>
			</div>
		</div>
	</body>
</html>