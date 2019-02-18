<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShortUrl
 * @package App\Models
 *
 * @property integer $id
 * @property string $url
 * @property string $code
 * @property string $created_at
 * @property string $updated_at
 */
class ShortUrl extends Model {
  protected $table = 'short_urls';

  protected $fillable = ['url', 'code'];
}
