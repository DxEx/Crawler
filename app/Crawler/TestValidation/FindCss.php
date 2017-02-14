<?php

namespace Crawler\TestValidation;


class FindCss extends TestValidationBase {

  public function doValidate() {

    if ($this->container->client()->getCrawler()->filter($this->validation)) {
      return TRUE;
    }
    else {
      return FALSE;
    }

  }

}
