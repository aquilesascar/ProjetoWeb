<?php
include 'conecta.php';

$sql_autores = "SELECT * FROM aquiles_ascar.autor ORDER BY nome";
$result_autores = pg_query($conexao, $sql_autores);
if (!$result_autores) {
    die("Erro ao buscar autores: " . pg_last_error($conexao));
}
?>
<html>
	<head>
		<title>Cadastro de Livros</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<form method="POST" name="frmCadastro" id="frmCadastro" action="cadastrar_livro.php">
				<h3>Cadastro de Livro</h3>

				<div class="form-group">
					<label for="txtTitulo">Título:</label>
					<input type="text" id="txtTitulo" name="txtTitulo" placeholder="Título do livro" required/>
				</div>

				<div class="form-group">
					<label for="txtIsbn">ISBN:</label>
					<input type="text" id="txtIsbn" name="txtIsbn" placeholder="ISBN (13 dígitos)"/>
				</div>

				<div class="form-group">
					<label for="txtAno">Ano de Publicação:</label>
					<input type="number" id="txtAno" name="txtAno" placeholder="Ex: 2023"/>
				</div>
				
				<div class="form-group">
					<label for="txtAutor">Autor:</label>
					<select id="txtAutor" name="txtAutor" required>
						<option value="">Selecione um autor</option>
						<?php
							while($linha_autor = pg_fetch_assoc($result_autores)){
								echo "<option value='" . $linha_autor['id_autor'] . "'>" . htmlspecialchars($linha_autor['nome']) . "</option>";
							}
						?>
					</select>
				</div>
				
				<div class="button-group">
					<input type="submit" value="Cadastrar Livro"/>
					<input type="button" value="Cadastrar Autor" class="btn-nav" onclick="window.location.href='cad_autor.php';" />
					<input type="button" value="Listar Livros" class="btn-listar" onclick="window.location.href='listar_livros_autores.php';" />
				</div>
			</form>
		</div>
	</body>
</html>
<?php
pg_close($conexao);
?>