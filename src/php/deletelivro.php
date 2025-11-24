<?php
    $id = $_GET['id'];  //pega o id da página anterior
    require('conexao.php');

    //realizando o delete
        $sqldelete = "DELETE FROM livros WHERE id = ?";
        $stmt = $conn->prepare($sqldelete);
        $stmt->bind_param("i", $id);
        $stmt->execute(); //executa
        //fecha a conexão depois do update
        $stmt->close();
        $conn->close();

        // Redireciona após salvar
        header("Location: ../../index.php?retorno_livro=livro_delete_ok");
        exit();
?>