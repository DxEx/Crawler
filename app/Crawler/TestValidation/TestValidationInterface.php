<?php

/**
 * @file
 * contains: Crawler\TestValidation\TestValidationInterfacet
 */

namespace Crawler\TestValidation;

/**
 * Interface TestSequenceInterface.
 *
 * @package Crawler\Tests
 */
interface TestValidationInterface {
  public function setValidation($validation);

  public function doValidate();

}
