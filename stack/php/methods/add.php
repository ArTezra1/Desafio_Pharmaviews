<?php

include_once("../db/Db.php");

$_POST['submit'];
$acao = $_POST['tipo_acao'];
$data_prevista = $_POST['data_prevista'];
$investimento_previsto = floatval($_POST['investimento_previsto']);

$tipo_acao_query = "SELECT codigo_acao FROM tipo_acao WHERE nome_acao = '$acao'";

$resultado_tipo_acao = $connex->query($tipo_acao_query);

$row = $resultado_tipo_acao->fetch_assoc();

$codigo_acao = $row['codigo_acao'];

$inserir_acao = mysqli_query($connex, "INSERT INTO acao (codigo_acao, investimento, data_prevista) VALUES ('$codigo_acao', $investimento_previsto, '$data_prevista')");

header('Location: ../../index.php');
exit();

?>