<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Busca</title>
    <link rel="stylesheet" href="../../src/css/output.css">
</head>
<body class="bg-gray-300">
    <div class="w-full max-w-6xl mx-auto mt-6 px-2">
        <div class="hidden md:block bg-white rounded-lg shadow">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-600 text-white uppercase text-xs sm:text-sm leading-normal">
                        <th class="py-2 px-3 text-left whitespace-nowrap">ID</th>
                        <th class="py-2 px-3 text-left whitespace-nowrap">Título</th>
                        <th class="py-2 px-3 text-left whitespace-nowrap">Diretor</th>
                        <th class="py-2 px-3 text-left whitespace-nowrap">Gênero</th>
                        <th class="py-2 px-3 text-left whitespace-nowrap">Data de Lançamento</th>
                        <th class="py-2 px-3 text-left whitespace-nowrap">Sinopse</th>
                        <th class="py-2 px-3 text-left whitespace-nowrap">Editar</th>
                        <th class="py-2 px-3 text-left whitespace-nowrap">Excluir</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    <?php 
                        require('conexao.php');
                        $result = null; // sempre vai iniciar nula para funcionar corretamente na versão mobile e desktop
                        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                            $titulo = $_POST['buscarfilmes'];
                            //verificando se o campo existe
                            if(!isset($_POST['buscarfilmes'])){
                                die("Erro:1 O campo título não foi preenchido corretamente");
                            }
                            //verificando se o campo está vazio
                            if(empty($titulo)){
                                die("Erro:2 O campo título não pode estar vazio");
                            }
                            //preparando a consulta 
                            $stmt = $conn->prepare("SELECT * FROM filmes WHERE titulo = ?");
                            $stmt->bind_param("s", $titulo);
                            $stmt->execute(); // executando a consulta
                            //obtendo os resultados da consulta
                            $result = $stmt->get_result();
                            //trazendo os resultado
                            if($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()) {
                                    // Formata o timestamp
                                    $dataFormatada = date("d/m/Y", $row['dataLancamentoFilme']);
                                    $sinopse = htmlspecialchars($row['sinopseFilme']);
                                    echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                                    echo "<td class='py-3 px-4 whitespace-nowrap'>{$row['id']}</td>";
                                    echo "<td class='py-3 px-4 break-words max-w-xs'>{$row['titulo']}</td>";
                                    echo "<td class='py-3 px-4 break-words max-w-xs'>{$row['diretor']}</td>";
                                    echo "<td class='py-3 px-4 break-words max-w-xs'>{$row['genero']}</td>";
                                    echo "<td class='py-3 px-4 whitespace-nowrap'>{$dataFormatada}</td>";
                                    echo "<td class='py-3 px-4 break-words max-w-sm'>{$sinopse}</td>";
                                    echo "<td class='py-8 px-4'><a href='alterarfilme.php?id={$row["id"]}'><img src='../../src/img/edit.png' alt='Editar'></a></td>";
                                    echo "<td class='py-8 px-4'><a href='deletefilme.php?id={$row["id"]}'><img src='../../src/img/remove.png' alt='Remover'></a></td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr><td colspan='8' class='py-3 px-4 text-center'>Nenhum registro encontrado.</td></tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>    
     <!-- CARDS (modo celular) -->
    <div class="md:hidden space-y-4 mt-4">
        <?php
            if($result && $result->num_rows > 0){ // reaproveitado o select acima
                $result->data_seek(0); // como o result ja foi usado uma vez, reinicia o ponteiro
                while($row = $result->fetch_assoc()) {
                    // Formata o timestamp
                    $dataFormatada = date("d/m/Y", $row['dataLancamentoFilme']);
                    $sinopseFilme = htmlspecialchars($row['sinopseFilme']);
                    $sinopseCurta = substr($sinopseFilme, 0, length: 120) . "...";
                    echo "
                        <div class='bg-white p-4 rounded-xl shadow break-words overflow-hidden'>
                            <p><span class='font-bold text-center'>ID:</span> {$row['id']}</p>
                            <p><span class='font-bold text-center'>Título:</span> {$row['titulo']}</p>
                            <p><span class='font-bold text-center'>Diretor:</span> {$row['diretor']}</p>
                            <p><span class='font-bold text-center'>Gênero:</span> {$row['genero']}</p>
                            <p><span class='font-bold text-center'>Lançamento:</span> {$dataFormatada}</p>
                            <p class='font-bold mt-2'>Sinopse:</p>
                            <p class='text-gray-700 sinopse-curta break-words'>{$sinopseCurta}</p>
                            <p class='text-gray-700 sinopse-completa hidden break-words'>{$sinopseFilme}</p>
                            <button class='mt-1 text-blue-600 underline mostrar-mais text-bold'>
                                mostrar mais
                            </button>
                            <br><br>
                            <div class='flex gap-5'>
                                <a href='alterarfilme.php?id={$row["id"]}'><img src='../../src/img/edit.png' alt='Editar'></a>
                                <a href='deletefilme.php?id={$row["id"]}'><img src='../../src/img/remove.png' alt='Remover'</a>
                            </div>
                        </div>";
                }
            }else{
                echo "<tr><td colspan='7' class='py-3 px-4 text-center'>Nenhum registro encontrado.</td></tr>";
            }
        ?>
    </div>
    <div class="w-full flex justify-center mt-6 mb-10">
        <a href="../../index.php" 
           class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow hover:bg-blue-700 transition">
            Página Inicial
        </a>
    </div>
    <script>
        // Expansor de sinopse no celular
        document.addEventListener("click", function(e){
            if(e.target.classList.contains("mostrar-mais")){
                const card = e.target.closest("div");

                const curta = card.querySelector(".sinopse-curta");
                const completa = card.querySelector(".sinopse-completa");

                curta.classList.toggle("hidden");
                completa.classList.toggle("hidden");

                e.target.textContent =
                    e.target.textContent === "mostrar menos" ? "mostrar mais" : "mostrar menos";
            }
        });
    </script>
</body>
</html>