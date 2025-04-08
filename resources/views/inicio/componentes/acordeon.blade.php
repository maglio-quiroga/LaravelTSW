<link rel="stylesheet" href="{{ asset('css/inicio/acordeon.css') }}">
<div class="container fade-in">
      <h2 style="color:#416788;">ACLAREMOS TUS DUDAS</h2>
      <div class="faqs">
        @foreach ($faqs as $faq)
        <div class="faq">
          <div class="head">
            <span>{{ $faq->titulo }}</span>
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 14.469L1 6.46897L1.96897 5.5L9 12.531L16.031 5.5L17 6.46897L9 14.469Z" fill="black" />
            </svg>
          </div>
          <div class="content fade-in">
            <p>
            {{ $faq->texto }}
            </p>
          </div>
      </div>
      @endforeach
</div>
</div>

<script src="{{ asset('js/inicio/acordeon.js') }}"></script>