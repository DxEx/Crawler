<?php

/**
 * @file
 * Example TestSuite with tests for anonymous users.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Crawler\Container;
use Crawler\Environment;
use Crawler\Test\Test;

// You can add multiple environments to a test-suite.
$environments = [];
$environments[] = new Environment('drupal7', __DIR__ . '/environments/drupal7_local.yml');

// For every environment a container is created that runs test-sequences.
// Each test-sequence runs in a new session.
foreach ($environments as $env) {
  $container = new Container($env, "/tmp/crawler-log.csv", 'Anonymous Tests');

  // Visit frontpage.
  $test_filename = __DIR__ . '/tests/anonymous/anonymous_visit_frontpage.yml';
  $test = new Test($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);


  // Execute the tests.
  $container->testSuite()->doExecute();
}
