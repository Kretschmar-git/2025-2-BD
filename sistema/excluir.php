<?php
    include 'conexao.php';

    $id = $_POST['id'];

    //apagar matricula se existir
    $sql =  $pdo->prepare("DELETE FROM matricula WHERE aluno = ?");
    $sql->execute([$id]);



    //apagar o aluno
    $sql = $pdo->prepare("DELETE FROM Aluno WHERE id = ?");
    $sql->execute([$id]);

    header("Location: index.php");
    exit;


?>