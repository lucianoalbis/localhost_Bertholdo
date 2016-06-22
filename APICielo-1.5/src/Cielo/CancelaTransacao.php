<?php

require '../../vendor/autoload.php';

use Cielo\Cielo;
use src\Cielo\CieloException;
use src\Cielo\Cancellation;

$mid = '1006993069';
$key = '25fbb99741c739dd84d7b06ec78c9bac718838630f30b112d033ce2e621b34f3';

$cielo = new Cielo($mid, $key, Cielo::TEST);

# Cancelando a transação
$cancellation = $cielo->Cancellation('1006993069000644A16A');

try {

  	$cancellationResponse = $cielo->cancellationRequest($cancellation);

    if (is_object($cancellationResponse))
    {

      printf("TID=%s\n", $cancellationResponse->getTid());
      printf("STATUS=%s\n", $cancellationResponse->getStatus());
      printf("PAN=%s\n", $cancellationResponse->getPan());

      printf("STATUS CODE=%s\n", $cancellationResponse->getCancellationInformation()->getCode());
      printf("CACELLATION MESSAGE=%s\n", $cancellationResponse->getCancellationInformation()->getMessage());
      printf("CACELLATION DATE=%s\n", $cancellationResponse ->getCancellationInformation()->getDateTime());
      printf("CACELLATION VALUE=%s\n", $cancellationResponse->getCancellationInformation()->getValue());

    }
  } 
  catch (CieloException $e) {

      printf("Opz[%d]: %s\n", $e->getCode(), $e->getMessage());

  }

# RETORNO DA CHAMADA
# http://localhost/webservice-1.5-php-master/src/Cielo/CancelaTransacao.php
# -> TID=1006993069000644A16A STATUS=9 PAN=uv9yI5tkhX9jpuCt+dfrtoSVM4U3gIjvrcwMBfZcadE= STATUS CODE=9 CACELLATION MESSAGE=Transacao cancelada com sucesso CACELLATION DATE=2016-04-29T12:27:03.288-03:00 CACELLATION VALUE=1000