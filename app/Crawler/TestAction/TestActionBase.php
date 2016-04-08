<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionBase
 */

namespace Crawler\TestAction;

use Crawler\Container;

class TestActionBase {

  protected $container;
  protected $params;
  protected $expected_status_code;

  /**
   * TestAction constructor.
   *
   * @param Container $container
   *    The injected container.
   * @param $params
   *    Array of parameters that the implementing TestAction is relying on.
   * @param $expected_status_code
   *    Expected http expected_status_code code. TestAction will evaluate to failed if a
   *    different expected_status_code code is returned.
   */
  public function __construct(Container $container, $params, $expected_status_code) {
    $this->container = $container;
    $this->params = $params;
    $this->expected_status_code = $expected_status_code;
  }
}
