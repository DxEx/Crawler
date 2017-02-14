<?php

namespace Crawler\Logger;

use Symfony\Component\EventDispatcher\Event;


class ScreenLogger implements loggerInterface {

  public function log(Event $event) {
    // Log to console.
    print json_encode($event->getLog()) . PHP_EOL;
  }

}
