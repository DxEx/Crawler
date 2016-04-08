<?php

/**
 * @file
 * contains: Crawler\Test\Test
 */

namespace DxEx\Crawler\Test;

use DxEx\Crawler\Container;
use DxEx\Crawler\TestAction\TestActionInterface;
use Symfony\Component\Yaml\Yaml;

class Test implements TestInterface {
  protected $action_sequence;
  protected $failed;
  protected $meta;
  protected $container;
  protected $label;
  protected $status;

  /**
   * Test constructor.
   *
   * @param Container $container
   *    The injected container.
   */
  public function __construct(Container $container) {
    $this->container = $container;
  }

  /**
   * @param string $file
   *
   * Examples:
   *  - '~/PhpProjects/crawler/conf/tests/cache_clear_all.yml'
   *  - '~/PhpProjects/crawler/conf/tests/views_create.yml'
   */
  public function createTestActionSequenceFromYML($file = '') {
    $yaml = Yaml::parse(file_get_contents($file));

    $this->meta = $yaml['meta'];

    foreach ($yaml['actions'] as $action) {
      $full_path_class = 'Crawler\\TestAction\\' . $action['class'];
      if (class_exists($full_path_class)) {
        $testAction = new $full_path_class($this->container, $action['params'], $action['expected_status_code']);
        $this->addActionToSequence($testAction);
      }
    }
  }

  /**
   * Executes the test and logs result.
   */
  public function doExecute() {
    // Setup.
    $this->container->renewClient();

    // Execute.
    $stopwatch = $this->container->stopwatch()->start($this->meta['label']);
    foreach ($this->action_sequence as $action) {
      if (!$action->doExecute()) {
        // Set error-code.
        $this->status = 'FAILED';
        continue;
      }
    }
    if ($this->status !== 'FAILED') {
      $this->status = 'SUCCESS';
    }
    $event = $stopwatch->stop($this->meta['label']);

    // Log.
    $log = array(
      'environment' => $this->container->environment()->label(),
      'category' => $this->category(),
      'test' => $this->label(),
      'time' => date('Y-m-d H:i:s'),
      'duration' => $event->getDuration(),
      'container' => $this->container->label(),
      'status' => $this->status,
    );
    $this->container->csvWriter()->insertOne($log);
    // Log to console.
    print json_encode($log) . PHP_EOL;
  }


  public function addActionToSequence(TestActionInterface $testAction) {
    $this->action_sequence[] = $testAction;
  }

  public function failed() {
    if ($this->failed) {
      return TRUE;
    }
  }

  /**
   * Return Test label.
   */
  public function label() {
    return $this->meta['label'];
  }

  /**
   * Return Test label.
   */
  public function category() {
    return $this->meta['category'];
  }

}
