<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortenUrlFromRequest;
use App\Http\Resources\ShortUrlResource;
use App\Repositories\ShortUrlRepository;
use App\Services\UrlShortenerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class UrlShortenerController extends Controller {
  protected $service;
  protected $repository;

  public function __construct(UrlShortenerService $service, ShortUrlRepository $repository) {
    $this->service = $service;
    $this->repository = $repository;
  }

  /**
   * Render index page with form for generate short link.
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index() {
    return view('url-shortener.index');
  }

  /**
   * Generate code and save with original URL to store.
   *
   * @param ShortenUrlFromRequest $request
   * @return ShortUrlResource
   * @throws \Exception
   */
  public function shortenUrl(ShortenUrlFromRequest $request) {
    $shortUrl = $this->service->shortUrl($request->get('url'));
    return new ShortUrlResource($shortUrl);
  }

  /**
   * Search original URL by code and redirect to original URL.
   *
   * @param string $code
   * @return RedirectResponse
   * @throws \Exception
   */
  public function redirectToOriginal(string $code) {
    $shortUrl = $this->repository->findShortUrlByCode($code);
    return Redirect::to($shortUrl->url);
  }
}
