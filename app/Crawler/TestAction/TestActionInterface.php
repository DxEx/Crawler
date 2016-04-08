<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionInterface
 */

namespace DxEx\Crawler\TestAction;

use DxEx\Crawler\Container;


interface TestActionInterface {

  public function __construct(Container $container, $params, $expected_status_code);

  public function doExecute();
}
