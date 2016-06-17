<?php 

use PHPUnit_Framework_TestCase as PHPUnit;
use Application\NativeElements\Math;

class PHPNativeElementsTest extends PHPUnit 
{
    protected $math;
  
    # É onde você cria os objetos que serão alvo dos testes
    public function setUp()
    {
		$this->math = new Math;
    }
    
    
    public function testOperacaoMatematica()
    {
		$this->math->setOperator('plus');
		$this->assertEquals(3, $this->math->getResult(1, 2), 'Não somou corretamente');
		
		$this->math->setOperator('minus');
		$this->assertEquals(1, $this->math->getResult(2, 1), 'Não subtratiu corretamente');
		
		$this->math->setOperator('obleous');
		$this->assertEquals(3, $this->math->getResult(9, 3), 'Não dividiu corretamente');
		
		$this->math->setOperator('times');
		$this->assertEquals(4, $this->math->getResult(2, 2), 'Não multiplicou corretamente');
    }
    
    # É onde você limpa os objetos que foram alvo dos testes
    public function tearDown()
    {
      	unset($this->math);
    }
  
}