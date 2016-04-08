<?php
/**
 * Created by PhpStorm.
 * User: ndf
 * Date: 07/12/15
 * Time: 18:45
 */

namespace DxEx\Crawler\TestAction;

use DxEx\Crawler\Container;

class TestActionBase {

  protected $container;
  protected $params;
  protected $expected_status_code;

  /**
   * Test constructor.
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
