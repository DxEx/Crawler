<?php

/**
 * @file
 * contains: Crawler\TestSequence\TestInterface
 */

namespace Crawler\TestSequence;

use Crawler\TestAction\TestActionInterface;

/**
 * Class TestSequence.
 *
 * @package Crawler\Tests
 */
interface TestSequenceInterface {
  public function doExecute();

  public function addActionToSequence(TestActionInterface $testAction);
}
