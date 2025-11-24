<?php
    require('conexao.php');
    //verifica se o formulário exsiste

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // recebendo os dados do form.
        $titulo = $_POST['tituloFilme'];
        $diretor = $_POST['diretor'];
        $genero = $_POST['generoFilme'];
        $dataLancamentoFilme = $_POST['dataLancamentoFilme'];
        $sinopseFilme = $_POST['sinopseFilme'];

        //verificando se os campos existem
        if(!isset($_POST['tituloFilme'], $_POST['diretor'], $_POST['generoFilme'], $_POST['dataLancamentoFilme'], $_POST['sinopseFilme'])){
            die("Erro 1001: Algum campo não foi preenchido corretamente.");
        }
        //verificando se os campos estão preenchidos
        if(empty($titulo) || empty($diretor) || empty($genero) || empty($dataLancamentoFilme) || empty($sinopseFilme)){
            die("Erro 1002: Algum campo está vazio");
        }

        //converter data para timestamp´
        $dataFilme = explode("-",$dataLancamentoFilme);
        $mktimeFilme = mktime(0,0,0, $dataFilme[1],$dataFilme[2],$dataFilme[0]);

        //verificando se tem filmes com o mesmo nome
        $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM filmes WHERE titulo = ?");
        $stmt->bind_param("s", $titulo);
        $stmt->execute();
        $result = $stmt->get_result(); // bind_result($contagem)- alternativa;
        $row = $result->fetch_assoc();
        
        // Pega o número de filmes encontrados
        $contagem = $row['total'];

        if($contagem == 0){
            // Inserção segura
            $stmt = $conn->prepare("INSERT INTO filmes (titulo, diretor, genero, dataLancamentoFilme, sinopseFilme) VALUES (?, ?, ?, ?, ?)"); $stmt->bind_param("sssis", $titulo, $diretor, $genero, $mktimeFilme,$sinopseFilme);

            //fecha a conexão depois do insert
            $stmt->execute();
            $stmt->close();
            $conn->close();

            // Redireciona após salvar
            header("Location: ../../index.php?retorno_filme=filme_ok");
            exit();
            
        }else{
            die("O filme $titulo já esta cadastrado");
        }
        
    }
?>