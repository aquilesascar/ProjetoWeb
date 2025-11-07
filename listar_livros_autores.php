<?php
include 'conecta.php';

// (Troque 'aquiles_ascar' pelo seu esquema)
$sql = "SELECT 
			l.id_livro, -- PRECISAMOS DO ID AGORA
			l.titulo, 
			l.ano_publicacao, 
			a.nome AS nome_autor 
		FROM 
			aquiles_ascar.livro l
		JOIN 
			aquiles_ascar.autor a ON l.id_autor = a.id_autor
		ORDER BY
			l.titulo";

$result = pg_query($conexao, $sql);
?>
<html>
	<head>
		<title>Listagem de Livros</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			<h2>Livros Cadastrados</h2>
			
			<div id="listaItens">
				<?php
				if($result && pg_num_rows($result) > 0){
					while($linha = pg_fetch_assoc($result)){
						$id_livro_atual = $linha['id_livro'];
						
						echo "<div class='list-item'>";
						echo "<h3>" . htmlspecialchars($linha['titulo']) . "</h3>";
						echo "<p><strong>Autor:</strong> " . htmlspecialchars($linha['nome_autor']) . "</p>";
						echo "<p><strong>Ano:</strong> " . htmlspecialchars($linha['ano_publicacao']) . "</p>";
						
						// --- INÍCIO DAS MUDANÇAS ---
						// Botões de Ação (Editar e Excluir)
						echo "<div class='action-buttons'>";
						
						// 1. Botão Editar (Update)
						//    Cria um formulário que envia o ID para 'editar_livro.php'
						echo "<form action='editar_livro.php' method='GET' style='flex: 1;'>
								<input type='hidden' name='id' value='$id_livro_atual' />
								<input type='submit' value='Editar' class='btn-edit' style='width: 100%;' />
							  </form>";
						
						// 2. Botão Excluir (Delete)
						//    Cria um formulário que envia o ID para 'excluir_livro.php'
						echo "<form action='excluir_livro.php' method='POST' style='flex: 1;'>
								<input type='hidden' name='id' value='$id_livro_atual' />
								<input type='submit' value='Excluir' class='btn-delete' style='width: 100%;' 
								       onclick=\"return confirm('Tem certeza que deseja excluir este livro?');\" />
							  </form>";
						
						echo "</div>"; // Fim de .action-buttons
						// --- FIM DAS MUDANÇAS ---
						
						echo "</div>"; // Fim de .list-item
					}
				} else if (!$result) {
					echo "<p>Erro ao listar livros: " . pg_last_error($conexao) . "</p>"; 
				} else {
					echo "<p>Nenhum livro cadastrado.</p>";
				}
				?>
			</div>
			
			<div class="button-group">
				<input type="button" value="Cadastrar Novo Livro" class="btn-nav" onclick="window.location.href='cad_livro.php'" />
				<input type="button" value="Cadastrar Novo Autor" class="btn-nav" onclick="window.location.href='cad_autor.php'" />
			</div>
		</div>
	</body>
</html>
<?php
pg_close($conexao);
?>