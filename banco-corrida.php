<?php

function insereMotorista($conexao,$nomeMot,$NascMot,$sxMot,$cpfMot,$modCar,$isAtivo) {
  $query = "insert into tb_motorista (nm_motorista, nasc_motorista,sx_motorista,cpf, md_carro,st_motorista) values ('{$nomeMot}','{$NascMot}','{$sxMot}',{$cpfMot},'{$modCar}',{$isAtivo});";
  mysqli_query($conexao,$query);
}

function inserePassageiro($conexao,$nomeMot,$NascMot,$sxMot,$cpfMot,$modCar,$isAtivo) {
  $query = "insert into tb_passageiro (nm_passageiro, nasc_passageiro,sx_Passageiro,cpf) values ('{$nomePas}','{$NascPas}','{$sxPas}',{$cpfPas});";
  mysqli_query($conexao,$query);
}
