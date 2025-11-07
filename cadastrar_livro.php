<?php
include 'conecta.php';

$titulo = $_POST['txtTitulo'];
$isbn = $_POST['txtIsbn'];
$ano = $_POST['txtAno'];
$id_autor = $_POST['txtAutor']; 

$sql = "INSERT INTO aquiles_ascar.livro (titulo, isbn, ano_publicacao, id_autor) VALUES
	('$titulo', '$isbn', '$ano', '$id_autor');";

$result = pg_query($conexao, $sql);

$status_message = "";
if(!$result){
	$status_message = "<h3 style='color: red;'>Erro no cadastro do livro: " . pg_last_error($conexao) . "</h3>";
} else {
	$status_message = "<h3 style='color: blue;'>Livro " . htmlspecialchars($titulo) . " cadastrado com sucesso!</h3>";
}

pg_close($conexao);
?>
<html>
	<head>
		<title>Status do Cadastro</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<?php echo $status_message; ?>
			
			<div class="button-group">
				<input type="button" value="Cadastrar outro Livro" class="btn-nav" onclick="window.location.href='cad_livro.php';"/>
				<input type="button" value="Ir para Listagem" class="btn-listar" onclick="window.location.href='listar_livros_autores.php';"/>
			</div>
		</div>
	</body>
</html>