<?php
     require('conexao.php');

    // Verifica se ID existe
    if (!isset($_GET['id'])) {
        die("ID do livro não informado.");
    }

    $id = intval($_GET['id']);

    // Consulta segura
    $stmt = $conn->prepare("SELECT titulo, autor, editora, dataLancamento, categoria, sinopse FROM livros WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($titulo, $autor, $editora, $dataLancamento, $categoria, $sinopse);
    $stmt->fetch();
    $stmt->close();

    // Converte data para o input date (Y-m-d)
    $dataInput = date("Y-m-d",$dataLancamento);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar dados do Livro</title>
    <link rel="stylesheet" href="../../src/css/output.css">
</head>
<body class="bg-gray-300">
    <h1 class="text-center text-blue-600 font-bold mt-3 text-2xl">
        <?php echo $titulo?>
    </h1>
    <div class="mx-auto max-w-5xl m-auto">
        <div class="w-[90%] sm:w-1/2 m-auto bg-white borde-2 rounded-lg">
            <form action="updatelivro.php?id=<?php echo $id; ?>" class="flex flex-col mt-5 p-6 sm:p-8" name="cadastrolivros" id="cadastrolivro" method="post">
                <label for="titulo">Título:</label>
                <input type="text" aria-label="titulo" id="titulo" name="titulo" class="border-2 border-blue-200 p-2 rounded" value="<?php echo $titulo;?>">

                <label for="autor" class="mt-4">Autor(a):</label>
                <input type="text" aria-label="autor" id="autor" name="autor" class="border-2 border-blue-200 p-2 rounded" value="<?php echo $autor;?>">

                <label for="editora" class="mt-4">Editora:</label>
                <input type="text" aria-label="editora" id="editora" name="editora"  class="border-2 border-blue-200 p-2 rounded" value="<?php echo $editora;?>">

                <label for="dataLancamento" class="mt-4">Data de Lançamento:</label>
                <input type="date" aria-label="dataLancamento" id="dataLancamento" name="dataLancamento"  class="border-2 border-blue-200 p-2 rounded" value="<?php echo $dataInput?>">

                <label for="categoria" class="mt-4">Categoria:</label>
                <input type="text" aria-label="categoria" id="categoria" name="categoria"  class="border-2 border-blue-200 p-2 rounded" value="<?php echo $categoria?>">

                <label for="sinopse" class="mt-4">Sinopse:</label>
                <textarea name="sinopse" id="sinopse"aria-label="sinopse" class="border-2 border-blue-200 p-2 rounded w-full resize-none" rows="10"><?php echo $sinopse?></textarea>
                <div class="flex justify-center items-center mt-4">
                    <div class="flex gap-3">
                        <input type="submit" value="Salvar alteraçoes" class="bg-blue-500 text-white font-bold p-2 rounded-md hover:bg-blue-700">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>