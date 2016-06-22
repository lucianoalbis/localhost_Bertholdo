<?php
class Usuario{

	/*
	# Private -> A única classe que tem acesso ao atributo é a própria classe que o define
	# Protected -> Então o acesso é por pacote e por herança 
	# Public -> Esse é fácil, todos tem acesso
	*/

	public $nome;
	protected $cpf;
	private $endereco;
	protected $salario;

	#construtor da classe
	function Usuario(){
		$this->preparaUsuario();
	}

	private function preparaUsuario(){
		$this->nome = "Octavio";
		$this->cpf = "99999999999";
		$this->endereco = "Rua Fulano de Tal número 0 apt 999";
		$this->salario = 1200;
	}
	
	public function getCpf (){
		return $this->cpf;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getEndereco(){
		return $this->endereco;
	}

	public function setSalario($valor){
      $this->salario = $valor;
    }

    public function getSalario(){
      return $this->salario;
    }
} 
?>