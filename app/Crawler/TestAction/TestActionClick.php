<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionClick
 */

namespace Crawler\TestAction;

class TestActionClick extends TestActionBase implements TestActionInterface {

  public function doExecute() {
    print 'Crawler\TestAction\TestActionClick doExecute() called' . PHP_EOL;
    // TODO: Implement doExecute() method.
    return TRUE;
  }

}
