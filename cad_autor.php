<html>
	<head>
		<title>Cadastro de Autores</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<form method="POST" name="frmCadastro" id="frmCadastro" action="cadastrar_autor.php">
				<h3>Cadastro de Autor</h3>
				
				<div class="form-group">
					<label for="txtNome">Nome:</label>
					<input type="text" id="txtNome" name="txtNome" placeholder="Nome do autor" required/>
				</div>
				
				<div class="form-group">
					<label for="txtDataNascimento">Data de Nascimento:</label>
					<input type="date" id="txtDataNascimento" name="txtDataNascimento"/>
				</div>

				<div class="button-group">
					<input type="submit" value="Cadastrar Autor"/>
					<input type="button" value="Cadastrar Livro" class="btn-nav" onclick="window.location.href='cad_livro.php';" />
					<input type="button" value="Listar Livros" class="btn-listar" onclick="window.location.href='listar_livros_autores.php';" />
				</div>
			</form>
		</div>
	</body>
</html>