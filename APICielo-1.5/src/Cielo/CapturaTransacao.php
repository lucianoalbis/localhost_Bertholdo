<?php

require '../../vendor/autoload.php';

use Cielo\Cielo;
use src\Cielo\CieloException;
use src\Cielo\Capture;

$mid = '1006993069';
$key = '25fbb99741c739dd84d7b06ec78c9bac718838630f30b112d033ce2e621b34f3';

$cielo = new Cielo($mid, $key, Cielo::TEST);

# Captura a transação autorizada
$capture = $cielo->Capture('1006993069000644A5EA');

try {

  	$captureResponse = $cielo->captureRequest($capture);

    if (is_object($captureResponse)){

      printf("TID=%s\n", $captureResponse->getTid());
      printf("STATUS=%s\n", $captureResponse->getStatus());
      printf("PAN=%s\n", $captureResponse->getPan());

      printf("STATUS CODE=%s\n", $captureResponse->getCaptureInformation()->getCode());
      printf("CAPTURE MESSAGE=%s\n", $captureResponse->getCaptureInformation()->getMessage());
      printf("CAPTURE DATE=%s\n", $captureResponse ->getCaptureInformation()->getDateTime());
      printf("CAPTURED VALUE=%s\n", $captureResponse ->getCaptureInformation()->getValue());

    }


} catch (CieloException $e) {

  printf("Opz[%d]: %s\n", $e->getCode(), $e->getMessage());

}