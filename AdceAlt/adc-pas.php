<?php
include("../banco/conecta.php");
include("../banco/banco-corrida.php");

$nomePas = $_POST['CnmComPas'];
$NascPas = $_POST['CdaNscPas'];
$sxPas = $_POST['CsxPas'];
$cpfPas = $_POST['CcpfPas'];


inserePassageiro($conexao,$nomePas,$NascPas,$sxPas,$cpfPas);

header("Location: ../passageiro.php?adc=true");
die();
