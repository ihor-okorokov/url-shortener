<?php

namespace App\Http\Resources;

use App\Models\ShortUrl;
use Illuminate\Http\Resources\Json\JsonResource;

class ShortUrlResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request) {
    /* @var ShortUrl|self $this */
    return [
      'originalUrl' => $this->url,
      'shortUrl' => $request->getSchemeAndHttpHost()."/{$this->code}",
    ];
  }
}
