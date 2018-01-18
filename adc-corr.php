<?php
include("conecta.php");
include("banco-corrida.php");

$valor = $_POST['CVaCor'];
$idMor = $_POST['CMotCor'];
$idPas = $_POST['CPasCor'];


insereCorrida($conexao,$valor,$idMot,$idPas);

header("Location: passageiro.php?adc=true");
die();
