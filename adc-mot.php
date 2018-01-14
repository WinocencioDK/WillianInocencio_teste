<?php
include("conecta.php");
include("banco-corrida.php");

$nomeMot = $_POST['CnmComMot'];
$NascMot = $_POST['CdaNscMot'];
$sxMot = $_POST['CsxMot'];
$cpfMot = $_POST['CcpfMot'];
$modCar = $_POST['CmodCar'];
if(isset($_POST['CisAtivo'])) { $isAtivo = true ; } else{ $isAtivo = false;}

insereMotorista($conexao,$nomeMot,$NascMot,$sxMot,$cpfMot,$modCar,$isAtivo);
