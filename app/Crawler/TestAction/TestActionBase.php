<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionBase
 */

namespace Crawler\TestAction;

use Crawler\Container;
use Crawler\TestValidation\TestValidationInterface;

class TestActionBase {

  protected $container;
  protected $params;
  protected $validators = [];

  /**
   * TestAction constructor.
   *
   * @param Container $container
   *    The injected container.
   * @param $params
   *    Array of parameters that the implementing TestAction is relying on.
   */
  public function __construct(Container $container, $params) {
    $this->container = $container;
    $this->params = $params;
  }

  public function addValidator(TestValidationInterface $validator) {
    $this->validators[] = $validator;
  }

  public function doValidate() {
    foreach ($this->validators as $validator) {
      if (!$validator->doValidate()) {
        return FALSE;
      }
    }
    return TRUE;
  }

}
