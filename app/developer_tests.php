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


  $container = new Container($env, "~/developer_log.csv", $params['label']);

  /**
   * Without Garbage.
   **/

  // Flush caches.
  $test_filename = '~/PhpProjects/crawler/conf/tests/developer/developer_cache_clear_all.yml';
  $test = new Test($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);

  // Create and Delete View.
  $test_filename = '~/PhpProjects/crawler/conf/tests/developer/developer_views_create_and_delete.yml';
  $test = new Test($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);


  /**
   * With Garbage (cannot remove content)
   */

  // Create and Delete menu-item (gives Garbage)
  $test_filename = '~/PhpProjects/crawler/conf/tests/developer/developer_menu_item_create.yml';
  $test = new Test($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);

  // Create Node/Page
  $test_filename = '~/PhpProjects/crawler/conf/tests/developer/developer_page_create.yml';
  $test = new Test($container);
  $test->createTestActionSequenceFromYML($test_filename);
  $container->testSuite()->addTest($test);


  // Execute the tests.
  $container->testSuite()->doExecute();


}
