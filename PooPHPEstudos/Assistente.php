<?php
require_once 'Usuario.php';
class Assistente extends Usuario{

	protected $ramal;

	function Assistente (){
		parent::Usuario();
		$this->ramal = '099';
	}

	public function getRamal(){
		return $this->ramal;
	}

	# Inserindo o polimorfismo de metodo da classe Usuario
	public function setSalario($valor){
      $this->salario = $valor*2;
    }

    public function getSalario(){
      return $this->salario;
    }

    /*
    # No PHP isso não pode ocorrer
	public function imprime($campo){
      echo "Campo: $campo";
    }

    public function imprime(){
      echo "Campo";
    }
    */

} 
?>