<?php

/**
 * @file
 * Contains Crawler\Environment.
 */

namespace DxEx\Crawler;

use Symfony\Component\Yaml\Yaml;

/**
 * Class Environment.
 *
 * @package Crawler
 */
class Environment {
  protected $baseUrl;
  protected $loginUrl;
  protected $loginButtonText;
  protected $accounts;
  protected $label;
  public $replacements;

  /**
   * Environment constructor.
   *
   * @param string $env
   *   Environment name must match a ENV.yml file. Without .YML extension.
   */
  public function __construct($env) {
    $env_file = dirname(__FILE__) . "/../../conf/environments/" . $env . ".yml";
    $settings = Yaml::parse(file_get_contents($env_file));

    $this->replacements = $settings;

    $this->label = $env;
    $this->baseUrl = $settings['baseUrl'];
    $this->loginUrl = $settings['loginUrl'];
    $this->loginButtonText = $settings['loginButtonText'];

    foreach ($settings['account'] as $role => $account) {
      $this->accounts[$role] = new Account($role, $account['uid'], $account['name'], $account['pass']);
    }
  }

  /**
   * Returns Environment BaseURL.
   */
  public function baseUrl() {
    return $this->baseUrl;
  }

  /**
   * Returns Login Url.
   */
  public function loginUrl() {
    return $this->loginUrl;
  }

  /**
   * Returns Login Button Text ('Inloggen').
   */
  public function loginButtonText() {
    return $this->loginButtonText;
  }

  /**
   * Return Account object.
   *
   * @param $role
   *   Role-key that is used in environment yml.
   */
  public function account($role) {
    if (isset($this->accounts[$role])) {
      return $this->accounts[$role];
    }
  }

  /**
   * Return Environment label.
   */
  public function label() {
    return $this->label;
  }

}
