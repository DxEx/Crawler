<?php

namespace Crawler\TestValidation;

use Crawler\Container;

/**
 * Base Class.
 */
abstract class TestValidationBase implements TestValidationInterface {

  /** @var \Crawler\Container **/
  protected $container;
  /** The validation **/
  protected $validation;

  /**
   * Constructor.
   */
  public function __construct(Container $container) {
    $this->container = $container;
  }

  /**
   * By default, validation fails.
   *
   * @return bool
   *   True when the validation is succesful.
   */
  public function doValidate() {
    return FALSE;
  }

  /**
   * Setter for validation.
   *
   * @param mixed $validation
   *   The validation.
   */
  public function setValidation($validation) {
    $this->validation = $validation;
  }

}
