<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo de Livros e Filmes</title>
  <link rel="stylesheet" href="./src/css/output.css">
</head>
<body class="bg-gray-300">
  <main>
    <h1 class="text-blue-500 font-bold text-3xl text-center mt-3.5 sm:text-3xl md:text-4xl lg:text-5xl">
      Catálogo de Livros e Filmes
    </h1>
    <?php
      if(isset($_GET['retorno_livro']) && $_GET['retorno_livro'] === "ok"){
        echo "<div style='color:green;font-weight:bold;text-align:center; margin-top:10px'>Livro cadastrado com sucesso!</div>";
      }
      if(isset($_GET['retorno_livro']) && $_GET['retorno_livro'] === "livro_update_ok"){
        echo "<div style='color:green;font-weight:bold;text-align:center; margin-top:10px'>Livro alterado com sucesso!</div>";
      }
      if(isset($_GET['retorno_livro']) && $_GET['retorno_livro'] === "livro_delete_ok"){
        echo "<div style='color:red;font-weight:bold;text-align:center; margin-top:10px'>Livro deletado com sucesso!</div>";
      }
      if(isset($_GET['retorno_filme']) && $_GET['retorno_filme'] === "filme_ok"){
        echo "<div style='color:green;font-weight:bold;text-align:center; margin-top:10px'>Filme cadastrado com sucesso!</div>";
      }
      if(isset($_GET['retorno_filme']) && $_GET['retorno_filme'] === "filme_update_ok"){
        echo "<div style='color:green;font-weight:bold;text-align:center; margin-top:10px'>Filme atualizado com sucesso!</div>";
      }
      if(isset($_GET['retorno_filme']) && $_GET['retorno_filme'] === "filme_delete_ok"){
        echo "<div style='color:red;font-weight:bold;text-align:center; margin-top:10px'>Filme deletado com sucesso!</div>";
      }
    ?>
    <div class="max-w-5xl m-auto">
        <nav class="flex flex-col lg:flex-row justify-center items-center gap-3 mt-5">
          <div class="text-center mt-3.5">
              <a href="cadastrarLivros.php" class="bg-blue-500 text-white font-bold p-2 rounded-md hover:bg-blue-700">Cadastrar Livros</a>
          </div>
          <div class="text-center mt-3.5">
              <a href="cadastrarFilmes.php" class="bg-blue-500 text-white font-bold p-2 rounded-md hover:bg-blue-700">Cadastrar Filmes</a>
          </div>
          <div class="text-center mt-3.5">
              <a href="./src/php/listalivros.php" class="bg-blue-500 text-white font-bold p-2 rounded-md hover:bg-blue-700">Livros Cadastrados</a>
          </div>
          <div class="text-center mt-3.5">
              <a href="./src/php/listafilmes.php" class="bg-blue-500 text-white font-bold p-2 rounded-md hover:bg-blue-700">Filmes Cadastrados</a>
          </div>
        </nav>
        <div class="flex justify-center items-center mt-14 bg-white w-full sm:w-1/2 m-auto p-2.5">
          <form action="./src/php/buscarLivros.php" class="flex justify-center items-center w-full gap-3.5 sm:flex-row flex-col" name="livros" id="livros" method="post">
              <input type="text" aria-label="livros" placeholder="Buscar por Livros" name="buscar" id="buscar" class="border-2 border-blue-200 w-full sm:w-[80%] px-3 py-2 mb-3 sm:mb-0">
              <input type="submit" value="Buscar" class="bg-blue-500 p-2 rounded-md text-white font-bold hover:cursor-pointer hover:bg-blue-700 w-full sm:w-auto">
          </form>
        </div>
        <div class="flex justify-center items-center mt-14 bg-white w-full sm:w-1/2 m-auto p-2.5">
          <form action="./src/php/buscarFilmes.php" class="flex justify-center items-center w-full gap-3.5 sm:flex-row flex-col" name="filmes" id="filmes" method="post">
              <input type="text" aria-label="filmes" placeholder="Buscar por Filmes" name="buscarfilmes" id="buscarfilmes" class="border-2 border-blue-200 w-full sm:w-[80%] px-3 py-2 mb-3 sm:mb-0">
              <input type="submit" value="Buscar" class="bg-blue-500 p-2 rounded-md text-white font-bold hover:cursor-pointer hover:bg-blue-700 w-full sm:w-auto">
          </form>
        </div>
        
    </div>
  </main>
    <!-- MODAL DE ERRO ( valida buscar filmes) -->
    <div id="modalErro" class="fixed inset-0 hidden items-center justify-center z-50">
      <!-- Fundo escuro -->
      <div id="backdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
      <!-- Conteúdo do modal -->
      <div class="relative bg-white w-[40%] min-w-[300px] mx-auto p-6 rounded-2xl shadow-xl animate-fadeIn">
        <!-- Botão X -->
        <button id="fecharModal" 
          class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl font-bold">
          &times;
        </button>
        <!-- Título -->
        <h2 class="text-xl font-bold text-center mb-4">
          Campo obrigatório!
        </h2>
        <!-- Mensagem -->
        <p class="text-center text-gray-700">
          Por favor, preencha o campo <strong>Filmes</strong> antes de buscar.
        </p>
      </div>
    </div>

    <!-- MODAL DE ERRO ( valida buscar livros) -->
    <div id="modalErroLivros" class="fixed inset-0 hidden items-center justify-center z-50">
        <div id="backdrop" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        <!-- Conteúdo do modal -->
      <div class="relative bg-white w-[40%] min-w-[300px] mx-auto p-6 rounded-2xl shadow-xl animate-fadeIn">
        <button id="fecharModalLivros" 
          class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl font-bold">
          &times;
        </button>
        <h2 class="text-xl font-bold  text-center mb-4">
          Campo obrigatório!
        </h2>
        <p class="text-center text-gray-700">
          Por favor, preencha o campo <strong>Livros</strong> antes de buscar.
        </p>
      </div>
    </div>
  <script src="./src/js/buscarfilmes.js"></script>
  <script src="./src/js/buscarlivros.js"></script>
</body>
</html>
