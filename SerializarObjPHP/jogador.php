<?php
class Jogador {

	private $nome;
	private $hp;
	private $score;	

	public function __construct($nome){
		$this->nome = $nome;
		$this->hp   = 100;
		$this->score = 0; 
	}
	
	# Get
	public function getNome(){
		return $this->nome;
	}
	public function getHp(){
		return $this->hp;
	}
	public function getScore(){
		return $this->score;
	}

	# Set
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setHp($hp){
		$this->hp = $hp;
	}
	public function setScore($score){
		$this->score = $score;
	}

	# Serialização
	public function __sleep(){		
		return array(		
			"nome", "score", "hp"		
		);		
	}	
	
	public function __wakeup(){
	}	
}
?> 