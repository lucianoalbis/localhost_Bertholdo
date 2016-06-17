<?php 

use PHPUnit_Framework_TestCase as PHPUnit;
use Application\Classes\Carro;

class PHPCarroTest extends PHPUnit 
{
	protected $carro;
  
    # É onde você cria os objetos que serão alvo dos testes
    public function setUp()
    {
		$this->carro = new Carro;
    }

	public function testeCor()
    {
        $this->carro->setCor("Azul");
        $this->assertEquals("Azul", $this->carro->getCor());        
    }

    # É onde você limpa os objetos que foram alvo dos testes
    public function tearDown()
    {
      	unset($this->carro);
    }
}