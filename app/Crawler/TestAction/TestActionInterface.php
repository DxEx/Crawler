<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionInterface
 */

namespace Crawler\TestAction;

use Crawler\Container;


interface TestActionInterface {

  public function __construct(Container $container, $params);

  public function doExecute();

  public function doValidate();

}
