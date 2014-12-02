<?php

namespace Thru\JsonService;

class JsonRequestResponse extends JsonResponse {

  public $Status = "UNKNOWN";
  public $StatusReason = "";
  public $ResponseTime;
  public $ResponseSize;

  public function __toJson($pretty = true){
    $this->ResponseSize = str_pad("",32,"X");
    //\Kint::dump($_SERVER);exit;
    $this->ResponseTime = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
    $response = parent::__toJson($pretty);

    $size = strlen($response);
    $response = str_replace(str_pad("",32,"X"), $size - 32 + strlen($size), $response);
    return $response;
  }


}