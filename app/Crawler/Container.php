<?php

/**
 * @file
 * contains: Crawler\Container
 */

namespace DxEx\Crawler;

use Goutte\Client;
use League\Csv\Writer;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Class Container
 * @package Crawler
 */
class Container {
  protected $environment;
  protected $groups;
  protected $testSuite;
  protected $client;
  protected $stopwatch;
  protected $csv_writer;
  protected $label;

  /**
   * Container constructor.
   *
   * @param string $environment
   * @param string $csv_file_path
   * @param string $label
   */
  public function __construct($environment, $csv_file_path, $label = "Runner 1") {

    // Load environment class.
    $this->environment = new Environment($environment);

    $this->csv_writer = Writer::createFromPath($csv_file_path, 'a+');
    $this->csv_writer->setDelimiter(";");

    $this->label = $label;

    // Set groups.
    $this->groups = [];

    // Set tests.
    $this->testSuite = new TestSuite($this, $this->environment());


    // Set timezone, needed for cookie.
    date_default_timezone_set("Europe/Amsterdam");
    // Create a new client instance.
    $this->client = new Client();


    $this->stopwatch = new Stopwatch();
  }

  /**
   * Get Environment class.
   *
   * @return Environment
   *    The Environment class.
   */
  public function environment() {
    return $this->environment;
  }

  /**
   * Get TestSuite class.
   *
   * @return TestSuite
   *    The TestSuite class.
   */
  public function testSuite() {
    return $this->testSuite;
  }

  /**
   * Get Client (Goutte Class).
   *
   * @return Environment
   *    The Goutte class.
   */
  public function client() {
    return $this->client;
  }

  /**
   * Returns new Client (Goutte Class).
   *
   * Useful if you want to reset the cookies.
   *
   * @return Environment
   *    The Goutte class.
   */
  public function renewClient() {
    $this->client = new Client();
    return $this->client;
  }

  /**
   * Get Stopwatch.
   *
   * @return Stopwatch
   *    The Symfony/Stopwatch class.
   */
  public function stopwatch() {
    return $this->stopwatch;
  }

  /**
   * Get CSV Writer.
   *
   * @return Writer
   *    The League\Csv\Writer class
   */
  public function csvWriter() {
    return $this->csv_writer;
  }

  /**
   * Return Test label.
   */
  public function label() {
    return $this->label;
  }

}
