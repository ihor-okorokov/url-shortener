<?php

namespace App\Http\Requests;

class ShortenUrlFromRequest extends JsonApiFormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'url' => ['required', 'string', 'regex:/^http[s]?\:\/\/[\w]+/'],
    ];
  }
}
