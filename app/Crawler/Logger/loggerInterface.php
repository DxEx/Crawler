<?php

namespace Crawler\Logger;

use Symfony\Component\EventDispatcher\Event;

interface loggerInterface {

  public function log(Event $event);
}
