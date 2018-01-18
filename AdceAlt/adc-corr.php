<?php
include("../banco/conecta.php");
include("../banco/banco-corrida.php");

$valor = $_POST['CVaCor'];
$idMot = $_POST['CMotCor'];
$idPas = $_POST['CPasCor'];

insereCorrida($conexao,$valor,$idMot,$idPas);

header("Location: ../corrida.php?adc=true");
die();
