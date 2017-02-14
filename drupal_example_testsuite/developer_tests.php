<?php

/**
 * @file
 * Example TestSuite with tests for admin users.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Crawler\Container;
use Crawler\Environment;
use Crawler\Logger\CsvLogger;
use Crawler\Logger\ScreenLogger;
use Crawler\TestSequence\TestSequence;

// You can add multiple environments to a test-suite.
$environments = [];
$environments[] = new Environment('drupal8', __DIR__ . '/environments/drupal8_local.yml');

// For every environment a container is created that runs test-sequences.
// Each test-sequence runs in a new session.
foreach ($environments as $env) {
  $container = new Container($env, 'Developer Tests');

  // Add loggers.
  $csvLogger = new CsvLogger('/tmp/crawler-log.csv');
  $container->getDispatcher()->addListener('sequence.log', [
    $csvLogger,
    'log',
  ]);
  $screenLogger = new ScreenLogger();
  $container->getDispatcher()->addListener('sequence.log', [
    $screenLogger,
    'log',
  ]);

  /**
   * Without Garbage.
   **/

  // Flush caches.
  $test_filename = __DIR__ . '/tests/developer/developer_cache_clear_all.yml';
  $test = new TestSequence($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);

  // Run Cron.
  $test_filename = __DIR__ . '/tests/developer/developer_run_cron.yml';
  $test = new TestSequence($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);

  // Create and Delete View.
  $test_filename = __DIR__ . '/tests/developer/developer_views_create_and_delete.yml';
  $test = new TestSequence($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);

  /**
   * With Garbage (cannot remove content)
   */

  // Create Node/Page.
  $test_filename = __DIR__ . '/tests/developer/developer_page_create.yml';
  $test = new TestSequence($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);


  // Execute the tests.
  $container->testSuite()->doExecute();
}
