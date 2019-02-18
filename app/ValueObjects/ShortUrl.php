<?php

namespace App\ValueObjects;

/**
 * Value object ShortUrl.
 * @package App\ValueObjects
 */
class ShortUrl {
  /**
   * @var string $url
   */
  private $url;

  /**
   * @var string $code
   */
  private $code;

  public function __construct(string $url, string $code) {
    $this->url = $url;
    $this->code = $code;
  }

  public function getUrl():string { return $this->url; }
  public function getCode():string { return $this->code; }
}