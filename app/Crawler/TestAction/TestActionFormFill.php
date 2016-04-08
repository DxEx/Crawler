<?php

/**
 * @file
 * contains: Crawler\TestAction\TestActionFormFill
 */

namespace Crawler\TestAction;

use StringTemplate;

class TestActionFormFill extends TestActionBase implements TestActionInterface {

  public function doExecute() {

    // Params.
    $url = $this->container->environment()->baseUrl() . $this->params['url'];

    $stringTemplateEngine = new StringTemplate\Engine;
    $environment_replacements = $this->container->environment()->replacements;
    $url = $stringTemplateEngine->render($url, $environment_replacements);


    $form_submit_text = isset($this->params['form_submit_text']) ? $this->params['form_submit_text'] : NULL;
    $form_css_selector = isset($this->params['form_css_selector']) ? $this->params['form_css_selector'] : NULL;
    $form_values = !empty($this->params['form_values']) ? $this->params['form_values'] : [];

    // Execute
    $client = $this->container->client();
    $crawler = $client->request('GET', $url);

    if ($form_submit_text) {
      $form = $crawler->selectButton($form_submit_text)->form();
    }
    elseif ($form_css_selector) {
      $form = $crawler->filter($form_css_selector)->form();
    }

    $client->submit($form, $form_values);

    // Validate response.
    if ($client->getResponse()->getStatus() == $this->expected_status_code) {
//      print 'Crawler\TestAction\TestActionFormFill doExecute() finished successful with status_code ' . $this->expected_status_code . PHP_EOL;
      return TRUE;
    }
  }

}
