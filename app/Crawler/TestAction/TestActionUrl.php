<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionUrl
 */

namespace Crawler\TestAction;

class TestActionUrl extends TestActionBase implements TestActionInterface {

  public function doExecute() {

    // Params.
    $url = $this->container->environment()->baseUrl() . $this->params['url'];

    // Execute.
    $client = $this->container->client();
    $client->request('GET', $url);

  }

}
