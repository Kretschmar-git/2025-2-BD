<?php
include 'conexao.php';
$sql = $pdo->query("SELECT * FROM Aluno");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Página Principal</title>
</head>

<body>

    <div class="container">
        <h1>Página Principal</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Data de nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <th scope="row"><?php echo $linha['id'] ?></th>
                        <td><?php echo $linha['nome'] ?></td>
                        <td><?php echo $linha['email'] ?></td>
                        <td><?php
                            $partes = explode('-', $linha['data_nascimento']);
                            $data = "" . $partes[2] . "/" . $partes[1] . "/" . $partes[0];
                            echo $data
                            ?>
                        </td>
                        <td>
                            <form action="editar.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">

                                <input type="submit" name="btnEditar" value="Editar" class="btn btn-primary">
                            </form>
                        </td>
                        <td>
                        <td>
                            <form action="excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">

                                <input type="submit" name="btnExcluir" value="Excluir" class="btn btn-danger">
                            </form>
                        </td>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="adicionar.php" method="post" class="text-center">
            <input type="text" name="txtNome" placeholder="Digite o nome do aluno" required><br>

            <input type="email" name="txtEmail" placeholder="Digite o email" required><br>

            <input type="date" name="txtData" placeholder="Digite a data de nascimento"><br>

            <input type="submit" value="salvar" name="btnSalvar" class="btn btn-success">

        </form>
    </div>
</body>

</html>