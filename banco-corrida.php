<?php

function insereMotorista($conexao,$nomeMot,$NascMot,$sxMot,$cpfMot,$modCar,$isAtivo) {
  $query = "insert into tb_motorista (nm_motorista, nasc_motorista,sx_motorista,cpf, md_carro,st_motorista) values ('{$nomeMot}','{$NascMot}','{$sxMot}',{$cpfMot},'{$modCar}',{$isAtivo});";
  mysqli_query($conexao,$query);
}
