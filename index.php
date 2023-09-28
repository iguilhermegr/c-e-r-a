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
    $sql = "INSERT INTO colaboradores(id, nome, cpf) VALUES ('', '$nome', '$cpf')";
}

// tratando erros das operações C.E.R.A
if (!empty($sql)){
    if(mysqli_query($conexao, $sql)){
        echo "Operação realizada com sucesso";
    } else {
        echo "Houve um erro na operação: <br />";
        echo mysqli_error($conexao);
    }
}

// echo $id." ".$nome." ".$cpf." ".$botao

?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GR</title>
</head>

<body>

    <form name="func" method="POST">

        <label>ID<input type="text" name="id" /></label>
        <label>Nome<input type="text" name="nome" /></label>
        <label>CPF<input type="text" name="cpf" /></label>

        <input type="submit" name="botao" value="Cadastrar" />
        <input type="reset" name="botao" value="Cancelar" />

    </form>

</body>

</html>