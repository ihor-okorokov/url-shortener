@extends('welcome')
@section('content')
  <div id="app" style="margin: 0 auto; width: 500px; text-align: center" :class="{ 'has-error': hasError(errors, 'url') }">
    <p v-if="generatedShortUrl">
      <span>Short URL: </span>
      <strong><a :href="generatedShortUrl.shortUrl" v-text="generatedShortUrl.shortUrl"></a></strong>
    </p>

    <input style="padding: 15px; width: 80%;"
           type="url"
           name="url"
           id="url"
           placeholder="https://example.com"
           pattern="https?://.+" size="30"
           v-model="url"
           required>

    <div class="help-block" v-text="getErrorMessage(errors, 'url')"></div>

    <button @click="shortenUrl" style="padding: 15px; width: 20%; margin-top: 15px;">
      <span v-show="!isSending">Shorten</span>
      <span style="display: none" v-show="isSending">Sending...</span>
    </button>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/app.js') }}"></script>
@endsection