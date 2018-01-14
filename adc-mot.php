<?php

$nomeMot = $_POST['CnmComMot'];
$NascMot = $_POST['CdaNscMot'];
echo $NascMot;
$cpfMot = $_POST['CcpfMot'];
$sxMot = $_POST['CsxMot'];
$modCar = $_POST['CmodCar'];
if(isset($POST['CisAtivo'])) { $isAtivo = "true";}else{$isAtivo = "false";}

//insereMotorista($conexao,$nomeMot,$NascMot,$cpfMot,$sxMot,$modCar,$isAtivo);
