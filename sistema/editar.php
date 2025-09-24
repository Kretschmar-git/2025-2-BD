<?php

// 1. Inclui o arquivo de conexão com o banco de dados.
// Este passo é crucial para ter acesso à variável $pdo, que representa a conexão.
include 'conexao.php';

// 2. Captura o ID enviado de um formulário.
// A variável superglobal $_POST['id'] pega o valor do campo com name="id"
// que foi submetido via método POST.
$id = $_POST['id'];

// 3. Prepara a instrução SQL para evitar SQL Injection.
// O comando seleciona todas as colunas (*) da tabela 'Aluno' onde o 'id' corresponde
// ao valor que será fornecido. O '?' é um placeholder seguro.
$sql = $pdo->prepare("SELECT * FROM Aluno WHERE id = ?");

// 4. Executa a instrução SQL preparada.
// O valor da variável $id é passado de forma segura para substituir o placeholder '?'.
$sql->execute([$id]);

// 5. Busca o resultado da consulta.
// fetch() pega a linha encontrada e PDO::FETCH_ASSOC a formata como um array
// onde as chaves são os nomes das colunas (ex: $linha['nome']).
$linha = $sql->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Editar...</title>
</head>
<body>
    <h1>Editar aluno: <?php echo $linha['nome']?></h1>

    <div class="container">

    <form action="atualizar.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $linha['id']?>">

        <input type="text" name="nome" value="<?php echo $linha['nome']?>">

        <input type="email" name="email" value="<?php echo $linha['email']?>">

        <input type="data" name="data" value="<?php echo $linha['data_nascimento']?>">

        <input type="submit" name="btnSalvar" class="btn btn-primary">
    </form>

    </div>

</body>
</html>
