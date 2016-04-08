<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionLogin
 */

namespace Crawler\TestAction;

/**
 * Class TestActionLogin
 *
 * This class is a special variant of TestActionFormFill.
 * It uses the Environment variables for Login credentials.
 *
 * @package Crawler\TestAction
 */
class TestActionLogin extends TestActionBase implements TestActionInterface {

  public function doExecute() {
//    print 'Crawler\TestAction\TestActionLogin doExecute() called' . PHP_EOL;

    // Params.
    $client = $this->container->client();
    $login_url = $this->container->environment()->loginUrl();
    $login_buttontext = $this->container->environment()->loginButtonText();

    $account = $this->params['account'];
    $name = $this->container->environment()->account($account)->get('name');
    $pass = $this->container->environment()->account($account)->get('pass');


    // Execute.
    $crawler = $client->request('GET', $login_url);

    // Login.
    $form = $crawler->selectButton($login_buttontext)->form();
    $client->submit($form, array(
      'name' => $name,
      'pass' => $pass,
    ));

    // Response.
    if ($client->getResponse()->getStatus() == $this->expected_status_code) {
//      print 'Crawler\TestAction\TestActionLogin doExecute() finished successful with status_code ' . $this->expected_status_code . PHP_EOL;
      return TRUE;
    }
  }

}
