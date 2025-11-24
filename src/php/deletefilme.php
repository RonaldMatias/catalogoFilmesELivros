<?php
    $id = $_GET['id'];  //pega o id da página anterior
    require('conexao.php');

    //realizando o delete
        $sqldelete = "DELETE FROM filmes WHERE id = ?";
        $stmt = $conn->prepare($sqldelete);
        $stmt->bind_param("i", $id);
        $stmt->execute(); //executa
        //fecha a conexão depois do delete
        $stmt->close();
        $conn->close();

        // Redireciona após salvar
        header("Location: ../../index.php?retorno_filme=filme_delete_ok");
        exit();
?>