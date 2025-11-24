<?php
    $id = $_GET['id'];  //pega o id da página anterior
    require('conexao.php');
    //verificando se o formulário foi submetido via post
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //capturando os dados do formulario
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $editora = $_POST['editora'];
        $dataLancamento = $_POST['dataLancamento'];
        $categoria = $_POST['categoria'];
        $sinopse = $_POST['sinopse'];

        //verificando se os campos existem
        if(!isset($_POST['titulo'], $_POST['autor'], $_POST['editora'], $_POST['dataLancamento'], $_POST['categoria'], $_POST['sinopse'])){
            die("Erro 1001: Algum campo não foi preenchido corretamente.");
        }
        //verificando se os campos estão preenchidos
        if(empty($titulo) || empty($autor) || empty($editora) || empty($dataLancamento) || empty($categoria) || empty($sinopse)){
            die("Erro 1002: Algum campo está vazio");
        }

        //converter data para timestamp´
        $dataLivro = explode("-",$dataLancamento);
        $mktimeLivro = mktime(0,0,0, $dataLivro[1],$dataLivro[2],$dataLivro[0]);
        //realizando o update
        $sqlUpdate = "UPDATE livros 
                          SET titulo = ?, autor = ?, editora = ?, dataLancamento = ?, categoria = ?, sinopse = ?
                          WHERE id = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param("sssissi", $titulo,  $autor, $editora, $mktimeLivro, $categoria, $sinopse, $id );
        $stmt->execute();//executa

        //fecha a conexão depois do update
        $stmt->close();
        $conn->close();

        // Redireciona após salvar
        header("Location: ../../index.php?retorno_livro=livro_update_ok");
        exit();
    }
?>