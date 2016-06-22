<?php

require '../../vendor/autoload.php';

use Cielo\Cielo;
use Cielo\CieloException;
use Cielo\Transaction;
use Cielo\Holder;
use Cielo\PaymentMethod;

$mid = '1006993069';
$key = '25fbb99741c739dd84d7b06ec78c9bac718838630f30b112d033ce2e621b34f3';

$cielo = new Cielo($mid, $key, Cielo::TEST);

# Dados do Cartão
$holder = $cielo->holder('4551870000000183', 2018, 5, Holder::CVV_INFORMED, 123);

# Dados do pedido
$order = $cielo->order('x2', 1000);

# Dados do cartão
$paymentMethod = $cielo->paymentMethod(PaymentMethod::VISA, PaymentMethod::CREDITO_A_VISTA);

# Realizando a transação
# AUTHORIZE_WITHOUT_AUTHENTICATION -> captura automática
$transaction = $cielo->transaction($holder, $order, $paymentMethod, 'http://localhost/webservice-1.5-php-master/src/Cielo/main.php', Transaction::AUTHORIZE_WITHOUT_AUTHENTICATION, true);

try {

	$transaction = $cielo->transactionRequest($transaction);

	if ($transaction->getAuthorization()->getLR() == 0) {
    	printf("Transação autorizada com sucesso. TID=%s\n", $transaction->getTid());
	}
}
catch (CieloException $e) {

  printf("Opz[%d]: %s\n", $e->getCode(), $e->getMessage());

}

# RETORNO DA CHAMADA
# http://localhost/webservice-1.5-php-master/src/Cielo/RegistraTransacao.php
# -> TransaÃ§Ã£o autorizada com sucesso. TID=1006993069000644A16A
