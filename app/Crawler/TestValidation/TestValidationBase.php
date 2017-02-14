<?php

namespace Crawler\TestValidation;


use Crawler\Container;

abstract class TestValidationBase implements TestValidationInterface {

  protected $container;
  protected $validation;

  public function __construct(Container $container) {
    $this->container = $container;
  }

  public function doValidate() {
    return TRUE;
  }

  public function setValidation($validation) {
    $this->validation = $validation;
  }

}
