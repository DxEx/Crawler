Usage:

@params:
-- environment
required

-- requests-per-test
Defaults to 5

-- concurrency
Defaults to 1

-- test-group
Defaults to all


Examples:
php app/index.php --environment drupal7_local_en --requests 5 --groups developer --concurrency 1 --message 'Default message'

php -f index.php 5

