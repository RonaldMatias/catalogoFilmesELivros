<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Filmes</title>
    <link rel="stylesheet" href="./src/css/output.css">
</head>
<body class="bg-gray-300">
    <main>
        <h1 class="text-blue-500 font-bold text-3xl text-center mt-3.5 sm:text-3xl md:text-4xl lg:text-5xl">
            Cadastre seu Filme
        </h1>
        <div class="mx-auto max-w-5xl m-auto">
            <div class="w-[90%] sm:w-1/2 m-auto bg-white borde-2 rounded-lg">
                <form action="src/php/cadastrarfilmes.php" method="post" class="flex flex-col mt-5 p-6 sm:p-8" name="cadastrofilmes" id="cadastrofilmes">
                    <label for="tituloFilme">Título:</label>
                    <input type="text" aria-label="tituloFilme" id="tituloFilme" name="tituloFilme" placeholder="Título do Filme" class="border-2 border-blue-200 p-2 rounded">

                    <label for="diretor" class="mt-4">Diretor:</label>
                    <input type="text" aria-label="diretor" id="diretor" name="diretor" placeholder="Diretor do Filme" class="border-2 border-blue-200 p-2 rounded">

                    <label for="generoFilme" class="mt-4">Gênero:</label>
                    <input type="text" aria-label="generoFilme" id="generoFilme" name="generoFilme" placeholder="Gênero do Filme" class="border-2 border-blue-200 p-2 rounded">

                    <label for="dataLancamentoFilme" class="mt-4">Data de Lançamento:</label>
                    <input type="date" aria-label="dataLancamentoFilme" id="dataLancamentoFilme" name="dataLancamentoFilme" placeholder="Data de Lançamento" class="border-2 border-blue-200 p-2 rounded">

                    <label for="sinopseFilme" class="mt-4">Sinopse:</label>
                    <textarea name="sinopseFilme" id="sinopseFilme"aria-label="sinopseFilme"placeholder="Sinopse"class="border-2 border-blue-200 p-2 rounded w-full resize-none"></textarea>

                    <div class="flex justify-center items-center mt-4">
                        <div class="flex gap-3">
                            <input type="submit" value="Cadastrar" class="bg-blue-500 text-white font-bold p-2 rounded-md hover:bg-blue-700">
                            <input type="reset" value="Limpar dados" class="bg-blue-500 text-white font-bold p-2 rounded-md hover:bg-blue-700">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- MODAL DE ERRO -->
  <div id="modalErro" class="fixed inset-0 z-50 hidden items-center justify-center">
      <!-- Fundo escuro -->
      <div id="modalBackdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>
      <!-- Caixa do Modal -->
      <div class="relative bg-white w-[90%] sm:w-[60%] lg:w-[40%] rounded-2xl shadow-xl p-6 animate-fade-in">
      <!-- Botão X -->
      <button id="modalClose" class="absolute top-3 right-3 text-gray-500 text-2xl">
          &times;
       </button>
       <h2 class="text-xl font-bold text-red-600 text-center mb-4">
          Todos os Campos são Obrigatórios
        </h2>
        <p id="modalMensagem" class="text-center text-gray-700">
            <!--O js exibe a menssagem aqui-->
        </p>
        <div class="text-center mt-6">
            <button id="modalFecharBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
                Fechar
            </button>
        </div>
      </div>
  </div>
<script src="./src/js/cadastrarfilmes.js"></script>
</body>
</html>