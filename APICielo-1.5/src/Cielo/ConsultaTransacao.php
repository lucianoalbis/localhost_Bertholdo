<?php

require '../../vendor/autoload.php';

use Cielo\Cielo;
use src\Cielo\CieloException;
use src\Cielo\Consultation;

$mid = '1006993069';
$key = '25fbb99741c739dd84d7b06ec78c9bac718838630f30b112d033ce2e621b34f3';

$cielo = new Cielo($mid, $key, Cielo::TEST);

# Valor retornado caso haja sucesso na transação de pagamento
$consultation = $cielo->consultation('1006993069000644A5EA');

try {

  $consultationResponse = $cielo->consultationRequest($consultation);

    if (is_object($consultationResponse))
    {
      printf("TID=%s\n", $consultationResponse->getTid());
      printf("STATUS=%s\n", $consultationResponse->getStatus());
      printf("PAN=%s\n", $consultationResponse->getPan());

      printf("AUTORIZATION CODE=%s\n", $consultationResponse->getAuthorization()->getCode());
      printf("AUTORIZATION MESSAGE=%s\n", $consultationResponse->getAuthorization()->getMessage());
      printf("AUTORIZATION DATE=%s\n", $consultationResponse ->getAuthorization()->getDateTime());
    }
} 
catch (CieloException $e) {

  printf("Opz[%d]: %s\n", $e->getCode(), $e->getMessage());

}

# RETORNO DA CHAMADA
# http://localhost/webservice-1.5-php-master/src/Cielo/ConsultaTransacao.php
# -> TID=1006993069000644A16A STATUS=6 PAN=uv9yI5tkhX9jpuCt+dfrtoSVM4U3gIjvrcwMBfZcadE= AUTORIZATION CODE=6 AUTORIZATION MESSAGE=TransaÃ§Ã£o autorizada AUTORIZATION DATE=2016-04-29T12:25:02.233-03:00