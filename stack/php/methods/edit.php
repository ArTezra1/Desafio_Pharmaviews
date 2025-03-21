<?php

include_once('../db/Db.php');

if (!empty($_GET['id'])) {


    $id = $_GET['id'];

    $sqlselect = "SELECT * FROM acao WHERE id = $id";

    $result = $connex->query($sqlselect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $acao = $user_data['codigo_acao'];
            $data_prevista = $user_data['data_prevista'];
            $investimento_previsto = $user_data['investimento'];
        }

    } else {
        header('Location: ../../index.php');
    }
}

$sql_tipo_acao = "SELECT * FROM tipo_acao ORDER BY codigo_acao DESC";

$result_tipo_acao = $connex->query($sql_tipo_acao);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            background: darkgray;
            text-align: center;
        }

        form {

            background: black;
            color: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            display: inline-block;
            background: black;
        }

        input {
            margin-top: 10px;
            margin-bottom: 10px;
            background: white;
            padding: 10px;
            border-radius: 10px;
        }


        a {
            display: inline-block;
            background: black;
            padding: 10px;
            color: white;
            border-radius: 10px 10px 0px 0px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <h1>Editar</h1>

    <a href="sistema.php">
        voltar
    </a>

    <form action="save.php" method="POST">
        <label for="acao"> Ação</label>
        <select name="tipo_acao" id="select" required>
            <option value="" disabled selected>Selecione o tipo de ação</option>
            <?php

            while ($dados = mysqli_fetch_assoc($result_tipo_acao)) {
                echo "<option value='" . $dados['codigo_acao'] . "'>" . $dados['nome_acao'] . "</option>";
            }

            ?>
            <label for="data_prevista">Data Prevista</label>
            <input type="date" name="data_prevista" id="data_prevista" value="<?php echo $data_prevista ?>">

            <label for="investimento_previsto">Investimento Previsto</label>
            <input type="text" name="investimento_previsto" id="investimento_previsto" value="<?php echo $investimento_previsto ?>">

            <input type="hidden" name="id" value="<?php echo $id ?>">

            <input type="submit" name="update" id="update">
    </form>
</body>

</html>