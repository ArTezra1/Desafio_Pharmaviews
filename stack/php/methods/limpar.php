<?php

include_once("../db/Db.php");

$sql = mysqli_query($connex, "DELETE FROM acao WHERE id >=1");

header('Location: ../../index.php');
exit();

?>