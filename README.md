
 Exercício Prático de Desenvolvimento WEB
 Projeto: Sistema de Gerenciamento de Livraria (CRUD Completo)
===================================================================

Este documento descreve o projeto desenvolvido para a disciplina de 
Programação WEB, detalhando o tema escolhido, a arquitetura do 
banco de dados e as instruções para a sua correta execução.

-------------------------------------------------------------------

## 📚 1. Tema Escolhido e Entidades

O tema escolhido foi um **Sistema de Gerenciamento de Livraria**, focado no cadastro de Livros e seus respetivos Autores.

Este tema cumpre o requisito de envolver pelo menos duas entidades 
com um relacionamento entre si:

* **Entidade 1: `autor`**
    * Descrição: Armazena os dados cadastrais dos autores.
    * Campos: `id_autor` (Chave Primária), `nome`, `data_nascimento`.

* **Entidade 2: `livro`**
    * Descrição: Armazena os dados dos livros.
    * Campos: `id_livro` (Chave Primária), `titulo`, `isbn`, `ano_publicacao`, `id_autor` (Chave Estrangeira).

O relacionamento entre elas é de **1:N (Um-para-Muitos)**, onde um Autor pode ter escrito múltiplos Livros, mas cada Livro só pode pertencer a um Autor.

-------------------------------------------------------------------

## 🔧 2. Funcionamento do Sistema (CRUD)

O sistema foi desenvolvido em PHP e implementa as quatro operações 
básicas do CRUD (Create, Read, Update, Delete), conforme solicitado.

* **CREATE (Criar):**
    * `cad_autor.php`: Formulário para inserir novos autores.
    * `cadastrar_autor.php`: Processa a inserção do autor no banco (`INSERT`).
    * `cad_livro.php`: Formulário para inserir novos livros.
    * `cadastrar_livro.php`: Processa a inserção do livro no banco (`INSERT`).

* **READ (Ler):**
    * `listar_livros_autores.php`: Exibe uma lista de todos os livros cadastrados, buscando o nome do autor através de um `JOIN` com a tabela `autor`.
    * `cad_livro.php`: Realiza uma consulta (`SELECT`) na tabela `autor` para preencher o menu dropdown de seleção de autor.

* **UPDATE (Atualizar):**
    * `editar_livro.php`: Formulário pré-preenchido com os dados do livro a ser editado (busca os dados via `SELECT ... WHERE id_livro = ?`).
    * `salvar_livro.php`: Processa a atualização do livro no banco (`UPDATE ... WHERE id_livro = ?`).

* **DELETE (Excluir):**
    * `excluir_livro.php`: Recebe o ID do livro (a partir da página de listagem) e o remove do banco (`DELETE ... WHERE id_livro = ?`).

-------------------------------------------------------------------

## 🗄️ 3. Banco de Dados e Conexão

Esta é a parte mais importante da configuração. O sistema não cria 
um novo banco de dados, mas sim se conecta a um banco existente 
chamado `aula` e cria um esquema próprio dentro dele.

* **Banco de Dados:** `aula`
* **Esquema (Schema):** `aquiles_ascar` (ou o seu nome de usuário, conforme Requisito R3)
* **Tabelas:** `aquiles_ascar.autor` e `aquiles_ascar.livro`

#### Como se Conectar ao Banco (DBeaver / pgAdmin)

Para executar o script SQL, você precisa se conectar ao servidor 
PostgreSQL usando um cliente de banco de dados, como o DBeaver.

Use as seguintes configurações na tela de conexão:

* **Host (Servidor de Casa):** `200.18.128.54`
* **Host (Servidor do Laboratório):** `10.90.24.54`
* **Banco de dados:** `aula`
* **Nome de usuário:** `aula`
* **Senha:** `aula`

#### Conexão pelo PHP

O ficheiro `conecta.php` é o responsável por estabelecer a conexão 
entre o servidor web (PHP) e o servidor de banco de dados (PostgreSQL) 
usando os dados acima.

-------------------------------------------------------------------

## 🚀 4. Como Executar o Sistema

Siga estes passos para executar o projeto localmente.

#### Parte A: Configuração do Banco de Dados

1.  **Conecte-se** ao banco de dados `aula` usando o DBeaver (ou pgAdmin) com as credenciais listadas acima.
2.  **Abra** uma "Ferramenta de Consulta" (Query Tool).
3.  **Execute** o script `script_livraria.sql` (incluído no .zip). 
    * *Nota: O script já está configurado para criar o esquema `aquiles_ascar` e as tabelas `aquiles_ascar.autor` e `aquiles_ascar.livro`.*

#### Parte B: Configuração do Servidor Web (XAMPP)

1.  **Instale o XAMPP** (ou outro servidor Apache/PHP).
2.  **Copie** todos os ficheiros do projeto (.php, .css) para uma pasta dentro do diretório `htdocs` do XAMPP (ex: `C:\xampp\htdocs\ProjetoWeb\`).
3.  **Habilite o driver PostgreSQL:**
    * Abra o Painel de Controle do XAMPP.
    * Na linha do "Apache", clique em `Config` > `PHP (php.ini)`.
    * No Bloco de Notas, procure (Ctrl+F) por `;extension=pgsql`.
    * **Apague o ponto-e-vírgula (`;`)** do início da linha.
    * Salve o ficheiro `php.ini`.
4.  **Inicie o Apache:** No painel do XAMPP, clique em **"Start"** na linha do módulo "Apache". (Se já estava iniciado, clique em "Stop" e "Start" novamente).
5.  **Acesse o Sistema:** Abra o seu navegador e acesse o URL correspondente à sua pasta:
    
    `http://localhost/ProjetoWeb/cad_autor.php`

O sistema estará pronto para uso.
