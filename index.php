<?php
/* aqui vamos conectar o banco de dados */
$servername = "localhost";
$database = "gr";
$username = "root";
$password = "";

$conexao = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

if (!$conexao) {
    die("Falha na conexão" . mysqli_connect_error());
}

// echo "Conectado com sucesso";

$id = $_POST["id"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cargo = $_POST["cargo"];
$salario = $_POST["salario"];
$cidade = $_POST["cidade"];
$contratado = $_POST["contratado"];
$botao = $_POST["botao"];

if (empty($botao)) {
} else if ($botao == "Cadastrar") {
    $sql = "INSERT INTO colaboradores
    (id, nome, cpf, telefone, email, cargo, salario, cidade, contratado) VALUES ('', '$nome', '$cpf', '$telefone', '$email', '$cargo', '$salario', '$cidade', '$contratado')";
} else if ($botao == "Excluir") {
    $sql = "DELETE FROM colaboradores WHERE id = $id";
} else if ($botao == "Alterar") {
    $sql = "UPDATE colaboradores SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', email = '$email', cargo = '$cargo', salario = '$salario', cidade = '$cidade', contratado = '$contratado' WHERE id = $id";
} else if ($botao == "Recuperar") {
    $sql = "SELECT * FROM colaboradores WHERE nome LIKE '%$pesquisa%' OR cpf LIKE '%$pesquisa%' OR telefone LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%' OR cargo LIKE '%$pesquisa%' OR salario LIKE '%$pesquisa%' OR cidade LIKE '%$pesquisa%' OR contratado LIKE '%$pesquisa%'";
}

// tratando erros das operações C.E.R.A
if (!empty($sql)) {
    if (mysqli_query($conexao, $sql)) {
        echo "Operação realizada com sucesso";
    } else {
        echo "Houve um erro na operação: <br />";
        echo mysqli_error($conexao);
    }
}

$selecionado = $_GET["id"];

if (!empty($selecionado)) {
    $sql_selecionado = "SELECT * FROM colaboradores WHERE id = $selecionado";

    $resultado = mysqli_query($conexao, $sql_selecionado);

    while ($linha = mysqli_fetch_assoc($resultado)) {
        $id = $_linha["id"];
        $nome =  $_linha["nome"];
        $cpf =  $_linha["cpf"];
        $telefone =  $_linha["telefone"];
        $email =  $_linha["email"];
        $cargo =  $_linha["cargo"];
        $salario =  $_linha["salario"];
        $cidade =  $_linha["cidade"];
        $contratado =  $_linha["contratado"];
        $botao =  $_linha["botao"];
    }
}

// demonstração de como imprimir valores na tela
// echo $id." ".$nome." ".$cpf." ".$botao

?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GR</title>
    <link rel="stylesheet" href="assets/lib/bootstrap-5.3.0/css/bootstrap.css">
</head>

<body>
    <div class="container-fluid">

    <form name="func" method="POST">
        <div class="form-group">
            <label>
                ID
                <input type="text" name="idi" value="<?php echo $id; ?>" disabled class="form-control" /><br />
                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control" />
            </label>
            <label>Nome<input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control" /></label>
        </div> <br />
        <div class="form-group">
            <label>CPF<input type="text" name="cpf" value="<?php echo $cpf; ?>" class="form-control cpf" /></label>
            <label>Telefone<input type="text" name="telefone" value="<?php echo $telefone; ?>" class="form-control phone_with_ddd" /></label>
            <label>Email<input type="text" name="email" value="<?php echo $email; ?>" class="form-control email" /></label>
        </div> <br />
        <div class="form-group">
            <label>Cargo<input type="text" name="cargo" value="<?php echo $cargo; ?>" class="form-control" /></label>
            <label>Salário<input type="text" name="salario" value="<?php echo $salario; ?>" class="form-control money" /></label>
            <label>Cidade<input type="text" name="cidade" value="<?php echo $cidade; ?>" class="form-control" /></label>
            <label>Contratado<input type="text" name="contratado" value="<?php echo $contratado; ?>" class="form-control date" /></label>
        </div> <br />


        <input type="submit" name="botao" value="Atualizar" />
        <input type="submit" name="botao" value="Excluir" />
        <input type="submit" name="botao" value="Cadastrar" />
        <br />
        <input type="text" class="form-control" name="pesquisa" />
        <input type="submit" name="botao" value="Recuperar" />

    </form>

    <table class="table table-dark">
        <tr>
            <td></td>
            <td>ID</td>
            <td>Nome</td>
            <td>CPF</td>
            <td>Telefone</td>
            <td>Email</td>
            <td>Cargo</td>
            <td>Salário</td>
            <td>Cidade</td>
            <td>Contrato</td>
        </tr>
        <?php
        if(empty($pesquisa)){
            $sql_mostra_cad = "SELECT * FROM colaboradores ORDER BY id desc limit 0,10 ";
        }
        $resultado = mysqli_query($conexao, $sql_mostra_cad);

        while ($linha = mysqli_fetch_assoc($resultado))
            echo "
                <tr>
                    <td>
                        <a href='?id=" . $linha["id"] . "'>Selecionar</a>
                    </td>
                    <td>" . $linha["id"] . "</td>
                    <td>" . $linha["nome"] . "</td>
                    <td>" . $linha["cpf"] . "</td>
                    <td>" . $linha["telefone"] . "</td>
                    <td>" . $linha["email"] . "</td>
                    <td>" . $linha["cargo"] . "</td>
                    <td>" . $linha["salario"] . "</td>
                    <td>" . $linha["cidade"] . "</td>
                    <td>" . $linha["contratado"] . "</td>
                </tr>
            ";

        ?>
    </table>
    </div>

    <script src="assets/lib/bootstrap-5.3.0/js/bootstrap.js"></script>
    <script src="assets/lib/jquery-3.7.0/script.js"></script>
    <script src="assets/lib/jquery-mask-plugin-1.14.16/src/jquery.mask.js"></script>
    <script src="assets/js/mascara.js"></script>

</body>

</html>
