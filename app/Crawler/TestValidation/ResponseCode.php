<?php

namespace Crawler\TestValidation;

class ResponseCode extends TestValidationBase {


  public function doValidate() {
    $response = $this->container->client()->getResponse()->getStatus();
    if ($response == $this->validation) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
}
