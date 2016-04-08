<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionFail
 */

namespace Crawler\TestAction;

class TestActionFail extends TestActionBase implements TestActionInterface {

  public function doExecute() {
    print 'Crawler\TestAction\TestActionFail doExecute() called' . PHP_EOL;
    // TODO: Implement doExecute() method.
    return FALSE;
  }

}
