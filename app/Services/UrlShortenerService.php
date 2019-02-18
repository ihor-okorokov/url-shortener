<?php

namespace App\Services;

use App\Helpers\RandomStringGenerator;
use App\ValueObjects\ShortUrl;
use App\Repositories\ShortUrlRepository;
use Webmozart\Assert\Assert;

class UrlShortenerService {
  /**
   * @var ShortUrlRepository $repository
   */
  protected $repository;

  /**
   * @var RandomStringGenerator $randomStringGenerator
   */
  protected $randomStringGenerator;

  public function __construct(ShortUrlRepository $repository, RandomStringGenerator $generator) {
    $this->repository = $repository;
    $this->randomStringGenerator = $generator;
  }

  /**
   * Find short URL by original URL or generate code and save with original URL to store.
   *
   * @param string $url the absolute http URL
   * @return \App\Models\ShortUrl
   */
  public function shortUrl(string $url) {
    Assert::regex($url, "/^http[s]?\:\/\/[\w]+/", "The URL is not valid.");

    try {
      // search short URL in store by original URL
      $shortUrl = $this->repository->findShortUrlByOriginalUrl($url);
    } catch(\Exception $exception) {
      // create and save code if short URL in store is not exist
      $shortUrl = $this->repository->add(
        new ShortUrl($url, $this->randomStringGenerator->generate())
      );
    }

    return $shortUrl;
  }
}