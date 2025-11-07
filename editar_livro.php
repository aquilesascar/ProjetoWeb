<?php
include 'conecta.php';

// 1. Verificar se o ID foi recebido
if(!isset($_GET['id'])) {
	die("ID do livro não fornecido.");
}

$id_livro = $_GET['id'];

// 2. Buscar os dados do livro que será editado
// (Troque 'aquiles_ascar' pelo seu esquema)
$sql_livro = "SELECT * FROM aquiles_ascar.livro WHERE id_livro = $id_livro";
$res_livro = pg_query($conexao, $sql_livro);

if(!$res_livro || pg_num_rows($res_livro) == 0) {
	die("Livro não encontrado.");
}
// Armazena os dados do livro
$livro = pg_fetch_assoc($res_livro);


// 3. Buscar todos os autores para o dropdown (como em cad_livro.php)
// (Troque 'aquiles_ascar' pelo seu esquema)
$sql_autores = "SELECT * FROM aquiles_ascar.autor ORDER BY nome";
$res_autores = pg_query($conexao, $sql_autores);

?>
<html>
	<head>
		<title>Editar Livro</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<form method="POST" name="frmCadastro" id="frmCadastro" action="salvar_livro.php">
			
				<input type="hidden" name="id_livro" value="<?php echo $livro['id_livro']; ?>" />
			
				<h3>Editando Livro: <?php echo htmlspecialchars($livro['titulo']); ?></h3>

				<div class="form-group">
					<label for="txtTitulo">Título:</label>
					<input type="text" id="txtTitulo" name="txtTitulo" required
						   value="<?php echo htmlspecialchars($livro['titulo']); ?>" />
				</div>

				<div class="form-group">
					<label for="txtIsbn">ISBN:</label>
					<input type="text" id="txtIsbn" name="txtIsbn" 
						   value="<?php echo htmlspecialchars($livro['isbn']); ?>" />
				</div>

				<div class="form-group">
					<label for="txtAno">Ano de Publicação:</label>
					<input type="number" id="txtAno" name="txtAno" 
						   value="<?php echo htmlspecialchars($livro['ano_publicacao']); ?>" />
				</div>
				
				<div class="form-group">
					<label for="txtAutor">Autor:</label>
					<select id="txtAutor" name="txtAutor" required>
						<option value="">Selecione um autor</option>
						<?php
							// Popula o <select> com os autores
							while($autor = pg_fetch_assoc($res_autores)){
								$id_autor_db = $autor['id_autor'];
								$nome_autor_db = $autor['nome'];
								
								// Adiciona 'selected' se o ID do autor for igual ao do livro
								$selecionado = ($id_autor_db == $livro['id_autor']) ? 'selected' : '';
								
								echo "<option value='$id_autor_db' $selecionado>" . htmlspecialchars($nome_autor_db) . "</option>";
							}
						?>
					</select>
				</div>
				
				<div class="button-group">
					<input type="submit" value="Salvar Alterações"/>
					<input type="button" value="Cancelar" class="btn-delete" 
						   onclick="window.location.href='listar_livros_autores.php';" />
				</div>
			</form>
		</div>
	</body>
</html>
<?php
pg_close($conexao);
?>