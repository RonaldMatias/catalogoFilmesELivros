<?php
    require('conexao.php');

    //verifica se o form é post, se não for não faz o envio
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Pegando os dados
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editora= $_POST['editora'];
        $dataLancamento = $_POST['dataLancamento'];
        $categoria = $_POST['categoria'];
        $sinopse = $_POST['sinopse'];

        // Verifica se existe
        if (!isset($_POST['titulo'], $_POST['autor'], $_POST['dataLancamento'], $_POST['categoria'], $_POST['sinopse'])) {
            die("Erro 101: Algum campo não foi preenchido corretamente");
        }

        // Verifica se está vazio
        if (empty($titulo) || empty($autor) || empty($dataLancamento) || empty($categoria) || empty($sinopse)) {
            die("Erro 102: Algum campo está vazio");
        }

        // Converter data  → timestamp
        $data = explode("-", $dataLancamento);
        // $data[0] = ano, $data[1] = mês, $data[2] = dia
        $mktime = mktime(0, 0, 0, $data[1], $data[2], $data[0]);
        
        //verificando se o livro ja esta cadastrado no banco de dados
        $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM filmes WHERE titulo = ?");
        $stmt->bind_param("s", $titulo);
        $stmt->execute();
        $result = $stmt->get_result(); // bind_result($contagem)- alternativa;
        $row = $result->fetch_assoc();

        //retorna a quantidade de registros encontrados
        $contagem = $row['total'];
        if($contagem ==0){
            // Inserção segura
            $stmt = $conn->prepare("INSERT INTO livros (titulo, autor, editora, dataLancamento, categoria, sinopse) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiss", $titulo, $autor, $editora, $mktime, $categoria, $sinopse);

            //fecha a conexão depois do insert
            $stmt->execute();
            $stmt->close();
            $conn->close();

            // Redireciona após salvar
            header("Location: ../../index.php?retorno_livro=ok");
            exit();
        }else{
            die("O livro $titulo já esta cadastrado");
        }
    }
?>
