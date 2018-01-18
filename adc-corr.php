<?php
include("conecta.php");
include("banco-corrida.php");

$valor = $_POST['CVaCor'];
$idMot = $_POST['CMotCor'];
$idPas = $_POST['CPasCor'];


insereCorrida($conexao,$valor,$idMot,$idPas);

header("Location: corrida.php?adc=true");
die();
