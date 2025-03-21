<?php

include_once("./php/db/Db.php");

$sql = "SELECT a.id, a.codigo_acao, t.nome_acao, a.investimento, a.data_prevista FROM acao a JOIN tipo_acao t ON a.codigo_acao = t.codigo_acao";

$result = mysqli_query($connex, $sql);

$sql_tipo_acao = "SELECT * FROM tipo_acao ORDER BY codigo_acao DESC";

$result_tipo_acao = $connex->query($sql_tipo_acao);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
        Bootstrap links
    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!--
        Jquery links
    -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!--
        JavaScript links
    -->
    <script src="js/tabela.js"></script>
    <script src="js/formButtons.js" defer></script>

    <!--
        CSS links
    -->
    <link rel="stylesheet" href="./css/index.css">
    <title>Pharmaviews</title>
</head>

<body>
    <header id="header">
        <div class="top_header">
            <div class="icons">
                <i class="bi bi-list"></i>
            </div>
            <img src="images/logo.png" alt=" Logo Pharmaviews" id="logo">
        </div>
        <div class="bottom_header">
            <div>
                Gestão de Verbas
            </div>
        </div>
    </header>

    <main>
        <section id="container_form">
            <form action="" method="POST" autocomplete="off" id="formulario_verbas">
                <section id="inputs_actions">
                    <div class="section_action">
                        <p>Ação</p>
                        <select name="tipo_acao" id="select" required>
                            <option value="" disabled selected>Selecione o tipo de ação</option>
                            <?php

                            while ($dados = mysqli_fetch_assoc($result_tipo_acao)) {
                                echo "<option value='" . $dados['nome_acao'] . "'>" . $dados['nome_acao'] . "</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="section_action">
                        <p>Data prevista</p>
                        <input type="date" name="data_prevista" id="data_prevista" required>
                    </div>
                    <div class="section_action">
                        <p>Investimento previsto</p>
                        <div class="investimento_container">
                            <div class="moeda">
                                R$
                            </div>
                            <input type="text" name="investimento_previsto" id="investimento_previsto" placeholder="0,00" required>
                        </div>
                    </div>
                </section>
            </form>

            <section id="buttons_actions">
                <p>Controles</p>
                <div class="buttons">
                    <button class="btn btn-success" id="adicionar" type="submit" name="submit">
                        <i class="bi bi-plus"></i>
                        Adicionar
                    </button>
                    <button class="btn btn-warning" id="limpar" type="submit" name="delete">
                        <i class="bi bi-eraser-fill"></i>
                        Limpar
                    </button>
                </div>
            </section>
        </section>

        <section>
            <table id="verbas" class="display">
                <thead>
                    <tr>
                        <th scope="col">Ação</th>
                        <th scope="col">Data prevista</th>
                        <th scope="col">Investimento previsto</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($user_data = mysqli_fetch_assoc($result)) {


                        echo "<tr>";

                        echo "<td>" . $user_data['nome_acao'] . "</td>";

                        echo "<td>" . $user_data['data_prevista'] . "</td>";

                        echo "<td>R$ " . number_format($user_data['investimento'], 2, ",", ".") . "</td>";

                        echo "<td>" . "<a class='btn' href='./php/methods/edit.php?id=$user_data[id]'>" . "<i class='bi bi-pencil-fill text-primary'></i>" . "</a>" . "</td>";

                        echo "<td>" . "<a class='btn' href='./php/methods/delete.php?id=$user_data[id]'>" . "<i class='bi bi-x fs-3 text-danger'></i>" . "</a>" . "</td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>© 2024 <strong>Pharmaviews</strong> Todos os direitos reservados</p>
    </footer>
</body>

</html>