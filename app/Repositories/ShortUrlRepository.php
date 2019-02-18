<?php

namespace App\Repositories;

use App\Models\ShortUrl as ShortUrlModel;
use App\Models\ShortUrl;
use App\ValueObjects\ShortUrl as ShortUrlValueObject;

class ShortUrlRepository {
  /**
   * Search short URL by original URL.
   *
   * @param string $url the absolute http URL
   * @return ShortUrlModel
   * @throws \Exception
   */
  public function findShortUrlByOriginalUrl(string $url):ShortUrlModel {
    /* @var ShortUrlModel $shortUrl */
    $shortUrl = ShortUrlModel::query()
      ->where('url', '=', $url)
      ->first();

    if(!$shortUrl) {
      throw new \Exception('Url не был обнаружен!');
    }

    return $shortUrl;
  }

  /**
   * Search short URL by code.
   *
   * @param string $code the generated code
   * @return ShortUrlModel
   * @throws \Exception
   */
  public function findShortUrlByCode(string $code):ShortUrlModel {
    /* @var ShortUrlModel $shortUrl */
    $shortUrl = ShortUrlModel::query()
      ->where('code', '=', $code)
      ->first();

    if(!$shortUrl) {
      throw new \Exception('Url не был обнаружен!');
    }

    return $shortUrl;
  }

  /**
   * Save code with original URL to store.
   *
   * @param ShortUrlValueObject $shortUrl
   * @return ShortUrlModel
   */
  public function add(ShortUrlValueObject $shortUrl):ShortUrlModel {
    $shortUrl = new ShortUrlModel([
      'url' => $shortUrl->getUrl(),
      'code' => $shortUrl->getCode(),
    ]);

    $shortUrl->save();
    return $shortUrl;
  }
}