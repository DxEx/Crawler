<?php

namespace Crawler\TestSequence\Event;

use Crawler\TestSequence\TestSequence;
use Symfony\Component\EventDispatcher\Event;


/**
 * The order.placed event is dispatched each time an order is created
 * in the system.
 */
class TestSequenceEvent extends Event {
  const NAME = 'sequence.status';

  protected $testSequence;

  public function __construct(TestSequence $testSequence) {
    $this->testSequence = $testSequence;
  }

  public function getTestSequence() {
    return $this->testSequence;
  }

}
