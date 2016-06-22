<?php

require_once 'Usuario.php';


// ===============================================================
/*
# simulação de acesso à atributo public, protected e private
# sera gerado um erro de acesso
# Nesse caso só o nome vai ser exibido
$usuario = new Usuario;
echo $usuario->nome;
echo $usuario->cpf;
echo $usuario->endereco;
# A solução é usar o metodo
echo $usuario->getCpf();
echo $usuario->getEndereco();
*/

// ===============================================================

require_once 'Assistente.php';

/*
# Utilizando a herança
$assistente = new Assistente();
echo $assistente->getRamal();
echo $assistente->nome;
echo $assistente->getCpf();
echo $assistente->getEndereco();
*/

// ===============================================================

/*
# Testando o polimorfismo de metodo
# O Polimorfismo só existe onde tem herança, ou seja seria as
# formas diferentes de uma mesma assinatuda de metodo em subClasses
$usuario = new Usuario;
echo $usuario->getSalario();
$assistente = new Assistente();
$assistente->setSalario(1200);
echo $assistente->getSalario();
*/

// ===============================================================


// ===============================================================

/*
# Testando a sobrecarga de metodos - No PHP isso não pode ocorrer
$assistente = new Assistente();
$assistente->imprime('Nome');
$assistente->imprime();
*/


// ===============================================================

/*
# Testando herança e polimorfismo - Classes abstratas
abstract class Funcionario {
  protected double salario;
  public double getBonificacao() {
    return this.salario * 1.2;
  }
}

Funcionario f = new Funcionario(); // não compila!!!
------
Obs: A maneira correta de usar classes abstratas
------
class Gerente extends Funcionario {
  public double getBonificacao() {
    return this.salario * 1.4 + 1000;
  }
}

#.Testando herança e polimorfismo - Metodos abstratas
abstract class Funcionario {
  abstract double getBonificacao();
}
------
Obs: Toda classe que for filha dessa classe deverá instanciar
     o metodo, caso contrário dará erro.     
------     
*/

// ===============================================================

/*
# Classe abstrata x Inteface

Interface
-> Uma classe pode implementar diversas interfaces
-> Uma interface não pode conter qualquer tipo de código, muito menos código padrão.
-> Suporte somente constantes do tipo estática.
-> Se você incluir um novo método em uma interface você precisa ajustar todas as implementações da interface.

Abstrata
-> Uma classe pode herdar  somente uma classe
-> Uma classe abstrata pode fornecer código completo, código padrão ou ter apenas a declaração de seu esqueleto para ser posteriormente sobrescrita.
-> Pode conter constantes estáticas e de instância.
-> Se você incluir um novo método em uma classe abstrata você tem a opção de fornecer uma implementação padrão para ele.
*/

// ===============================================================

// ===============================================================

// ===============================================================

?>