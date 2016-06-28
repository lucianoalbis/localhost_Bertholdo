<?php

	include 'jogador.php';
	$dados = file_get_contents("jogo.save");
	$jogador = unserialize($dados);
	echo " nome ".$jogador->getNome()." score ".$jogador->getScore()." hp ".$jogador->getHp();
	
?> 