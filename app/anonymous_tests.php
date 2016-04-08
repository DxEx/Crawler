<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DxEx\Crawler\Container;
use DxEx\Crawler\Test\Test;


$cli_parameters = array(
  "label:",
);
$params = getopt("", $cli_parameters);


$environments = [];
$environments[] = 'drupal7_local_en';


foreach ($environments as $env) {


  $container = new Container($env, "~/anonymous_log.csv", $params['label']);

  // Without Garbage.

  // Visit frontpage.
  $test_filename = '~/PhpProjects/crawler/conf/tests/anonymous/anonymous_visit_frontpage.yml';
  $test = new Test($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);

  // Search jobs.
  $test_filename = '~/PhpProjects/crawler/conf/tests/anonymous/anonymous_search_jobs.yml';
  $test = new Test($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);


  // Execute the tests.
  $container->testSuite()->doExecute();
}
