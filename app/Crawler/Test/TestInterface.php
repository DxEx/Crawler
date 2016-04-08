<?php

/**
 * @file
 * contains: Crawler\Test\TestInterface
 */

namespace Crawler\Test;

use Crawler\TestAction\TestActionInterface;

/**
 * Class Test.
 *
 * @package Crawler\Tests
 */
interface TestInterface {
  public function doExecute();

  public function addActionToSequence(TestActionInterface $testAction);
}
