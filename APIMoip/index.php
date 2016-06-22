<?php

/**
  include_once 'examples.php';

  exampleBasicInstructions();
  exampleFull();
  exampleQueryParcels();
 * 
 */

/*  
include_once "autoload.inc.php";

$moip = new Moip();
$moip->setEnvironment('test');
$moip->setCredential(array(
    'key' => 'YJIJLL0GVAB8METCUFRXG5VBSMGITABXTBU9TZXW',
    'token' => 'IVLVYO40WJCWHGSURQCAM3LKXL91WXPU'
));

$moip->setUniqueID(false);
$moip->setValue('101.00');
$moip->setReason('Teste do Moip-PHP');

$moip->validate('Basic');

$moip->send();
print_r($moip->getAnswer());
*/

/*
include_once "autoload.inc.php";

//function exampleAddComission($example='1') {
    $moip = new Moip();
    $moip->setEnvironment('test');
    $moip->setCredential(array('key' => 'YJIJLL0GVAB8METCUFRXG5VBSMGITABXTBU9TZXW', 'token' => 'IVLVYO40WJCWHGSURQCAM3LKXL91WXPU'));
    $moip->setUniqueID(mt_rand());
    $moip->setValue('100.00');
    $moip->setReason('Teste do Moip-PHP');

    $moip->setPayer(array('name' => 'Nome Sobrenome',
        'email' => 'email@cliente.com.br',
        'payerId' => 'id_usuario',
        'billingAddress' => array('address' => 'Rua do Zézinho Coração',
            'number' => '45',
            'complement' => 'z',
            'city' => 'São Paulo',
            'neighborhood' => 'Palhaço Jão',
            'state' => 'SP',
            'country' => 'BRA',
            'zipCode' => '01230-000',
            'phone' => '(11)8888-8888')));
    $moip->validate('Identification');
    //$moip->validate('Basic');

    $moip->setReceiver('luciano@bertholdo.com.br');

    //if ($example == '1')
        $moip->addComission('Razão do Split', 'lucianoalbis@yahoo.com.br', '80',true,true);
    //else if ($example == '2')
      //  $moip->addComission('Razão do Split', 'recebedor_secundario', '12.00', true);
    //else if ($example == '3')
      //  $moip->addComission('Razão do Split', 'recebedor_secundario', '12.00', true, 'recebedor_secundario_3');
    //else if ($example == '4') {
      //  $moip->addComission('Razão do Split', 'recebedor_secundario', '5.00');
       // $moip->addComission('Razão do Split', 'recebedor_secundario', '2.00', true);
       // $moip->addComission('Razão do Split', 'recebedor_secundario_2', '12.00', true, 'recebedor_secundario_3');
    //}
        //$moip->setReturnURL('https://meusite.com.br/cliente/pedido/bemvindodevolta');

    $moip->send();

    print_r($moip->getAnswer());
//}
*/


include_once "autoload.inc.php";

    $moip = new Moip();
    $moip->setEnvironment('test');
    $moip->setCredential(array('key' => 'YJIJLL0GVAB8METCUFRXG5VBSMGITABXTBU9TZXW', 'token' => 'IVLVYO40WJCWHGSURQCAM3LKXL91WXPU'));
    $moip->setUniqueID(false);
    $moip->setValue('100.00');
    $moip->setReason('Teste do Moip-PHP');

    $moip->setPayer(array('name' => 'Nome Sobrenome',
        'email' => 'email@cliente.com.br',
        'payerId' => 'id_usuario',
        'billingAddress' => array('address' => 'Rua do Zézinho Coração',
            'number' => '45',
            'complement' => 'z',
            'city' => 'São Paulo',
            'neighborhood' => 'Palhaço Jão',
            'state' => 'SP',
            'country' => 'BRA',
            'zipCode' => '01230-000',
            'phone' => '(11)8888-8888')));
    $moip->validate('Identification');

    $moip->addComission('Razão do Split', 'lucianoalbis@yahoo.com.br', '80',true,true);

    $moip->setReceiver('luciano@bertholdo.com.br');

    //$moip->addParcel('2', '6');
    //$moip->addParcel('5', '7', '1.00');
    $moip->addParcel('2', '12', null, true);

    //$moip->addComission('Razão do Split', 'recebedor_secundario', '5.00');
    //$moip->addComission('Razão do Split', 'recebedor_secundario', '2.00', true);
    //$moip->addComission('Razão do Split', 'recebedor_secundario_2', '12.00', true, 'recebedor_secundario_3');

    $moip->addPaymentWay('creditCard');
    //$moip->addPaymentWay('billet');
    $moip->addPaymentWay('financing');
    //$moip->addPaymentWay('debit');
    //$moip->addPaymentWay('debitCard');
    //$moip->setBilletConf("2011-04-06", true, array("Primeira linha", "Segunda linha", "Terceira linha"), "http://seusite.com.br/logo.gif");

    $moip->send();

    //print_r($moip->getXML());
    print_r($moip->getAnswer());

?>
