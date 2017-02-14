<?php

namespace Crawler\Logger;

use Symfony\Component\EventDispatcher\Event;

class CsvLogger implements loggerInterface {

  public function onSuccess(Event $event) {
    print 'success';
  }

  public function onFail(Event $event) {
    print 'fail';
  }

}
