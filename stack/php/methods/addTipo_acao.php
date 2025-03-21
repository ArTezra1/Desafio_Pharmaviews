<?php 
    include_once("../db/Db.php");

    $sql = mysqli_query($connex, "INSERT INTO tipo_acao (nome_acao) VALUES ('Evento')");

    $sql2 = mysqli_query($connex, "INSERT INTO tipo_acao (nome_acao) VALUES ('Apoio Gráfico')");

    $sql3 = mysqli_query($connex, "INSERT INTO tipo_acao (nome_acao) VALUES ('Palestra')");

    header("Location: ../../index.php")
    
?>
