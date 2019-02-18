<?php

namespace App\Helpers;

class RandomStringGenerator {
  private $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

  private $length = 5;

  public function __construct(int $length = 5) {
    $this->length = $length;
  }

  public function changeChars(string $chars):self {
    $this->chars = $chars;
    return $this;
  }

  public function generate():string {
    $code = '';
    $charsLength = strlen($this->chars);
    for( $i = 0; $i < (int)5; $i++) {
      $num = rand(1, $charsLength);
      $code .= substr($this->chars, $num, 1);
    }

    return $code;
  }
}