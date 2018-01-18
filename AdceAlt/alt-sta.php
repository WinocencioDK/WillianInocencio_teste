<?php
include("../banco/conecta.php");
include("../banco/banco-corrida.php");

$id = $_POST['Cact1'];
if($_POST['Cact2'] == true) {
  $status = 0;
} else {
  $status = 1;
}

alteraStatus($conexao,$id,$status);

header("Location: ../motorista.php");
die();
