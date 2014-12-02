<?php

namespace Thru\JsonService;

class JsonResponse {

  public function __toJson($pretty = true) {
    if($pretty) {
      return JsonPrettyPrinter::format($this);
    }else{
      return json_encode($this);
    }
  }

  public function __toString(){
    return $this->__toJson();
  }

  public function send(\Slim\Slim $app){
    $response = $this->__toJson();
    $app->response()->header("Content-type", "application/javascript");
    $app->response()->body($response);
  }
}