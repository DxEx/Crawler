<?php

namespace Crawler\Logger;

use Symfony\Component\EventDispatcher\Event;

interface loggerInterface {
  public function onSuccess(Event $event);

  public function onFail(Event $event);
}
