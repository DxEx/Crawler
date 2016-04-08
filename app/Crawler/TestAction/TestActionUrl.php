<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionUrl
 */

namespace DxEx\Crawler\TestAction;

class TestActionUrl extends TestActionBase implements TestActionInterface {

  public function doExecute() {
//    print 'Crawler\TestAction\TestActionUrl doExecute() called' . PHP_EOL;

    // Params.
    $url = $this->container->environment()->baseUrl() . $this->params['url'];

    // Execute.
    $client = $this->container->client();
    $client->request('GET', $url);

    // Response.
    if ($client->getResponse()->getStatus() == $this->expected_status_code) {
//      print 'Crawler\TestAction\TestActionUrl doExecute() finished successful with status_code ' . $this->expected_status_code . PHP_EOL;
      return TRUE;
    }
  }

}
