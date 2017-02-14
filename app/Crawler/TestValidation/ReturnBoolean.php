<?php

namespace Crawler\TestValidation;

class ReturnBoolean extends TestValidationBase {

  public function doValidate() {
    return $this->validation;
  }

}
