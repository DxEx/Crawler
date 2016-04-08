# Crawler
PHP Application for Behavior Driven Development. Crawl websites and measure performance.


This project was initially created to measure performance of multiple drupal 7
 installations for various authenticated user scenarios.

**Example Drupal Test-suite**

pre:
- install drupal 7 'standard profile' on http://d7.local:8082/
- download and install views and views_ui

execution:
- $ php -f drupal_example_testsuite/anonymous_tests.php
- $ php -f drupal_example_testsuite/developer_tests.php
- results are written to /tmp/crawler-log.csv

example output:

| Environment | Account   | Test Sequence            | Start time          | Execution time | Test Suite      | Status  |
|-------------|-----------|--------------------------|---------------------|---------------:|-----------------|---------|
| drupal7     | anonymous | Visit frontpage          | 2016-04-08 16:03:07 | 68             | Anonymous Tests | SUCCESS |
| drupal7     | developer | Cache Clear All          | 2016-04-08 16:03:10 | 2123           | Developer Tests | SUCCESS |
| drupal7     | developer | Create and Delete a View | 2016-04-08 16:03:13 | 2417           | Developer Tests | SUCCESS |
