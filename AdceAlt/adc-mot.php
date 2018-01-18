<?php
include("../banco/conecta.php");
include("../banco/banco-corrida.php");

$nomeMot = $_POST['CnmComMot'];
$NascMot = $_POST['CdaNscMot'];
$sxMot = $_POST['CsxMot'];
$cpfMot = $_POST['CcpfMot'];
$modCar = $_POST['CmodCar'];
if(isset($_POST['CisAtivo'])) {
   $isAtivo = 1;
 } else {
   $isAtivo = 0;
 }

insereMotorista($conexao,$nomeMot,$NascMot,$sxMot,$cpfMot,$modCar,$isAtivo);

header("Location: ../motorista.php?adc=true");
die();
