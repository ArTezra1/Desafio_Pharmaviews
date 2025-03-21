<?php

include_once('../db/Db.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $acao = $_POST['tipo_acao'];
    $data_prevista = $_POST['data_prevista'];
    $investimento_previsto = $_POST['investimento_previsto'];

    $checkTipoAcao = "SELECT codigo_acao FROM tipo_acao WHERE codigo_acao = '$acao'";
    $resultCheck = $connex->query($checkTipoAcao);

    if ($resultCheck->num_rows > 0) {
        $sqlUpdate = "UPDATE acao SET codigo_acao = '$acao', investimento = $investimento_previsto, data_prevista = '$data_prevista' WHERE id = '$id'";
        $result = $connex->query($sqlUpdate);
        
        if ($result) {
            echo "Registro atualizado com sucesso!";
            header('Location: ../../index.php');
            exit();
        } else {
            echo "Erro ao atualizar: " . $connex->error;
        }
    } else {
        echo "Erro: O código de ação informado não existe!";
    }
}
