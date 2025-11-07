<?php
include 'conecta.php';

$nome = $_POST['txtNome'];
$data_nascimento = $_POST['txtDataNascimento'];


$sql = "INSERT INTO aquiles_ascar.autor (nome, data_nascimento) VALUES
	('$nome', '$data_nascimento');";

$result = pg_query($conexao, $sql);

$status_message = "";
if(!$result){
	$status_message = "<h3 style='color: red;'>Erro no cadastro do autor: " . pg_last_error($conexao) . "</h3>";
} else {
	$status_message = "<h3 style='color: blue;'>Autor " . htmlspecialchars($nome) . " cadastrado com sucesso!</h3>";
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
				<input type="button" value="Cadastrar outro Autor" class="btn-nav" onclick="window.location.href='cad_autor.php';"/>
				<input type="button" value="Ir para Listagem" class="btn-listar" onclick="window.location.href='listar_livros_autores.php';"/>
			</div>
		</div>
	</body>
</html>