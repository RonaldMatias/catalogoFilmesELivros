<?php
      $id = $_GET['id'];  //pega o id da página anterior
      require('conexao.php');
      //verificando se o formulário foi submetido via post
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

            //realizando o update
            $sqlUpdate = "UPDATE filmes 
                          SET titulo = ?, diretor = ?, genero = ?, dataLancamentoFilme = ?, sinopseFilme = ?
                          WHERE id = ?";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->bind_param("sssisi", $titulo,  $diretor, $genero, $mktimeFilme, $sinopseFilme, $id );
            $stmt->execute();//executa

            //fecha a conexão depois do update
            $stmt->close();
            $conn->close();

            // Redireciona após salvar
            header("Location: ../../index.php?retorno_filme=filme_update_ok");
            exit();

       }

?>