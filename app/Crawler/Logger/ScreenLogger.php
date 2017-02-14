<?php

namespace Crawler\Logger;

use Symfony\Component\EventDispatcher\Event;


class ScreenLogger implements loggerInterface {

  public function onSuccess(Event $event) {
    print 'success';
  }

  public function onFail(Event $event) {
    print 'fail';
  }

}
