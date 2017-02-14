<?php

namespace Crawler\Logger;

use League\Csv\Writer;
use Symfony\Component\EventDispatcher\Event;

class CsvLogger implements loggerInterface {

  protected $csv_writer;

  public function __construct($csv_file_path) {
    $this->csv_writer = Writer::createFromPath($csv_file_path, 'a+');
    $this->csv_writer->setDelimiter(";");
  }

  public function log(Event $event) {
    $this->csv_writer->insertOne($event->getLog());
  }

}
