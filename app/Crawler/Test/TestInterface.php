<?php

/**
 * @file
 * contains: Crawler\Test\TestInterface
 */

namespace DxEx\Crawler\Test;

use DxEx\Crawler\TestAction\TestActionInterface;

/**
 * Class Test.
 *
 * @package Crawler\Tests
 */
interface TestInterface {
  public function doExecute();

  public function addActionToSequence(TestActionInterface $testAction);
}
