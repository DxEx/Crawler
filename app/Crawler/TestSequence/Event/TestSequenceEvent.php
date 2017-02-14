<?php

namespace Crawler\TestSequence\Event;

use Symfony\Component\EventDispatcher\Event;


/**
 * The order.placed event is dispatched each time an order is created
 * in the system.
 */
class TestSequenceEvent extends Event {
  const NAME = 'sequence.log';

  protected $environment_label;
  protected $category_label;
  protected $test_label;
  protected $time;
  protected $duration;
  protected $container_label;
  protected $status;

  /**
   * TestSequenceEvent constructor.
   *
   * @param $environment_label
   * @param $category_label
   * @param $test_label
   * @param $time
   * @param $duration
   * @param $container_label
   * @param $status
   */
  public function __construct($environment_label, $category_label, $test_label, $time, $duration, $container_label, $status) {
    $this->environment_label = $environment_label;
    $this->category_label = $category_label;
    $this->test_label = $test_label;
    $this->time = $time;
    $this->duration = $duration;
    $this->container_label = $container_label;
    $this->status = $status;
  }


  public function getLog() {
    return [
      'environment' => $this->environment_label,
      'category' => $this->category_label,
      'test' => $this->test_label,
      'time' => $this->time,
      'duration' => $this->duration,
      'container' => $this->container_label,
      'status' => $this->status,
    ];
  }

}
