<?php

	include_once 'jogador.php';
	$jogador = new Jogador("Allan");
	$jogador->setHp(1);
	$jogador->setScore(1500);
	$serializado = serialize($jogador);
	file_put_contents("jogo.save",$serializado);
	echo ("jogo salvo!");
	
?> 