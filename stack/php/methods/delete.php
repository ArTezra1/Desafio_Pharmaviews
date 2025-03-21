<?php 

    include_once("../db/Db.php");

    $id = $_GET['id'];

    $sql = mysqli_query($connex, "DELETE FROM acao WHERE id = $id");

    header("Location: ../../index.php")

?>