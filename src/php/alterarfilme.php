<?php 
    require('conexao.php');

    // Verifica se ID existe
    if (!isset($_GET['id'])) {
        die("ID do filme não informado.");
    }

    $id = intval($_GET['id']);

    // Consulta segura
    $stmt = $conn->prepare("SELECT titulo, diretor, genero, dataLancamentoFilme, sinopseFilme FROM filmes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($titulo, $diretor, $genero, $dataLancamentoFilme, $sinopseFilme);
    $stmt->fetch();
    $stmt->close();

    // Converte data para o input date (Y-m-d)
    $dataInput = date("Y-m-d",$dataLancamentoFilme);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar dados do Filme</title>
    <link rel="stylesheet" href="../../src/css/output.css">
</head>
<body class="bg-gray-300">
    <div class="mx-auto max-w-5xl m-auto">
        <h1 class="text-center text-blue-600 font-bold mt-3 text-2xl">
            <?php echo $titulo?>
        </h1>
        <div class="w-[90%] sm:w-1/2 m-auto bg-white borde-2 rounded-lg">
            <form action="updatefilme.php?id=<?php echo $id; ?>"method="post" class="flex flex-col mt-12 p-6 sm:p-8" name="cadastrofilmes" id="cadastrofilmes">
                <label for="tituloFilme">Título:</label>
                <input type="text" aria-label="tituloFilme" id="tituloFilme" name="tituloFilme" class="border-2 border-blue-200 p-2 rounded" value="<?php echo $titulo?>">

                <label for="diretor" class="mt-4">Diretor:</label>
                <input type="text" aria-label="diretor" id="diretor" name="diretor" class="border-2 border-blue-200 p-2 rounded" value="<?php echo $diretor?>">

                <label for="generoFilme" class="mt-4">Gênero:</label>
                <input type="text" aria-label="generoFilme" id="generoFilme" name="generoFilme" class="border-2 border-blue-200 p-2 rounded" value="<?php echo $genero?>">

                <label for="dataLancamentoFilme" class="mt-4">Data de Lançamento:</label>
                <input type="date" aria-label="dataLancamentoFilme" id="dataLancamentoFilme" name="dataLancamentoFilme" class="border-2 border-blue-200 p-2 rounded" value="<?php echo $dataInput?>">

                <label for="sinopseFilme" class="mt-4">Sinopse:</label>
                <textarea rows="10" name="sinopseFilme" id="sinopseFilme"aria-label="sinopseFilme"class="border-2 border-blue-200 p-2 rounded w-full resize-none"><?php echo $sinopseFilme?></textarea>
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
