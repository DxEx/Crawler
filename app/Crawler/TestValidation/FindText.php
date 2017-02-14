<?php

namespace Crawler\TestValidation;

use Crawler\Container;

class FindText extends TestValidationBase {


  public function doValidate() {
    if (substr($this->container->client()->getCrawler()->text(), $this->validation) !== FALSE) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
}
