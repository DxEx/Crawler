<?php

/**
 * Contains: Crawler/Account.
 */

namespace DxEx\Crawler;

class Account {
  protected $role;
  protected $uid;
  protected $name;
  protected $pass;

  public function __construct($role, $uid, $name, $pass) {
    $this->role = $role;
    $this->uid = $uid;
    $this->name = $name;
    $this->pass = $pass;
  }

  public function get($property) {
    if (isset($this->{$property})) {
      return $this->{$property};
    }
  }
}
