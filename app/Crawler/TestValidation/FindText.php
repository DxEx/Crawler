<?php

namespace Crawler\TestValidation;

class FindText extends TestValidationBase {

  public function doValidate() {
    if (substr($this->container->client()
        ->getCrawler()
        ->text(), $this->validation) !== FALSE
    ) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

}
