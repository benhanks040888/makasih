@extends('layouts.master')

@section('content')
  <section class="section-main section-main-home">
    @include('_partials.nav')

    <div class="deer wow bounceInLeft" data-wow-duration="700ms" data-wow-delay="1750ms"></div>
    <div class="santa wow bounceInLeft" data-wow-duration="500ms" data-wow-delay="1750ms"></div>
    <div class="snowman wow bounceInRight" data-wow-duration="450ms" data-wow-delay="1750ms"></div>
    <div class="woodmark wow fadeInUp" data-wow-duration="450ms" data-wow-delay="1750ms">
      Share:
      <ul class="social-links">
        <li><a href="#" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a></li>
      </ul>
    </div>

    <div class="container section-content">
      <a href="{{ route('home') }}"><span class="logo wow zoomIn" data-wow-delay="200ms">Mirum Santa's Carrier</span></a>

      <div class="narrow-container">
        <h1 class="wow fadeInUp" data-wow-delay="500ms">Jadikan Natal tahun ini lebih indah dengan berbagi!</h1>
        
        <p class="wow fadeInUp" data-wow-delay="750ms">Saatnya mengubah barang-barangmu yang sudah tidak terpakai menjadi hadiah spesial. Mirum Santa’s Carrier akan menugaskan beberapa Peri untuk menjemput dan mengantarkan hadiahmu langsung kepada anak-anak yatim piatu.</p>

        <p class="wow fadeInUp" data-wow-delay="1000ms">
          Apakah <a href="#" data-remodal-target="modal">HADIAH</a>mu sudah siap?<br>
          <small>Klik tombol di bawah ini jika hadiahmu sudah siap.</small>
        </p>

        <a href="{{ route('upload') }}" class="btn-svg wow bounceIn" data-wow-duration="750ms" data-wow-delay="1500ms">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0" y="0" width="328" height="103.5" viewBox="0 0 328 103.5" xml:space="preserve" enable-background="new 0 0 328 103.5">
            <polygon class="shadow" points="316.1 17.2 319.6 20.5 309.1 78.1 157.4 87.9 27 74.5 21.1 68.3 "/>
            <polygon class="shadow" points="156.1 79.7 157.4 87.9 309.1 78.1 304.9 72 "/>
            <polygon class="shadow" points="304.9 72 316.1 17.2 319.6 20.5 309.1 78.1 "/>
            <polygon class="surface" points="20.2 20.9 109.2 14.2 199.2 17.7 316.1 17.2 304.9 72 156.1 79.7 21.1 68.3 "/>
            <g class="stars-left">
              <polygon points="9.8 24.3 8.7 27.3 5.3 27.8 8.2 29.7 7.3 33.2 10.2 31.6 12.7 33.7 11.2 30.4 13.4 27.7 10.3 27.7 " fill="#ffce00"/>
              <polygon points="0 14.8 6.5 13.9 10.9 19.6 11.6 12.4 18.7 10.6 12.9 6.6 14.3 0 9.6 6.1 2.5 4.7 5.6 10.5 " fill="#ffce00"/>
              <polygon points="25.3 0.4 24.2 3.4 20.8 3.9 23.7 5.8 22.8 9.2 25.8 7.7 28.2 9.8 26.7 6.4 28.9 3.7 25.8 3.7 " fill="#ffce00"/>
            </g>
            <g class="stars-right">
              <polygon points="319 82.2 321.2 79.9 324.5 80.7 322.6 77.8 324.8 75.1 321.5 75.3 320 72.4 320.1 76.1 317 77.7 319.8 78.9 " fill="#ffce00"/>
              <polygon points="309.2 98.7 315.8 97.8 320.1 103.5 320.8 96.3 328 94.5 322.2 90.6 323.5 83.9 318.9 90 311.7 88.6 314.8 94.4 " fill="#ffce00"/>
              <polygon points="301.9 94.8 303.4 92 306.8 91.8 304.1 89.6 305.4 86.3 302.3 87.5 300.1 85.1 301.2 88.6 298.7 91 301.8 91.4 " fill="#ffce00"/>
            </g>
          </svg>
          <span>Jemput Sekarang</span>
        </a>
      </div>
    </div>
  </section>

  <section class="section section-about" id="about">
    <div class="container section-content">
      <div class="narrow-container">
        <div class="plank wow zoomIn">
          SEKILAS TENTANG</p>
        </div>

        <p class="wow fadeInUp" data-wow-delay="300ms">Setiap orang pasti memiliki keinginan untuk berbagi, seperti Santa.<br>Tapi berbagi apa? Kemana? Bagaimana? Hmm males ah merepotkan...</p>

        <h2 class="alternate-color wow zoomIn" data-wow-delay="600ms">Menjadi Santa itu ternyata mudah, loh!</h2>

        <p class="wow fadeInUp" data-wow-delay="900ms">Cukup siapkan barang-barang tidak terpakaimu yang masih layak untuk didonasikan,<br>kemudian kami akan menjemput & mengantarnya untukmu!</p>
      </div>

      <div class="row">
        <div class="col-sm-3 wow zoomIn" data-wow-duration="200ms" data-wow-delay="300ms">
          <p><img src="{{ assets_url('images/about1.png') }}" alt="About Image 1"></p>
          <span>Ini adalah cara berbagi dengan <strong>Mudah, Hemat, dan Cepat</strong>.</span>
        </div>
        <div class="col-sm-3 wow zoomIn" data-wow-duration="200ms" data-wow-delay="600ms">
          <p><img src="{{ assets_url('images/about2.png') }}" alt="About Image 2"></p>
          <span>Mirum Santa’s Carrier menjemput & mengantar dengan batuan <strong>Kurir Terpercaya</strong>.</span>
        </div>
        <div class="col-sm-3 wow zoomIn" data-wow-duration="200ms" data-wow-delay="900ms">
          <p><img src="{{ assets_url('images/about3.png') }}" alt="About Image 3"></p>
          <span>Peri-peri kami akan mengubah hadiahmu menjadi spesial bagi <strong>Anak-anak yatim piatu di Yayasan Bina Kasih</strong>.</span>
        </div>
        <div class="col-sm-3 wow zoomIn" data-wow-duration="200ms" data-wow-delay="1200ms">
          <p><img src="{{ assets_url('images/about4.png') }}" alt="About Image 4"></p>
          <span>Rasakan gembiranya berbagi melalui ucapan <strong>Natal</strong> dari anak-anak yatim piatu.</span>
        </div>
      </div>

    </div>
    <h2 class="has-ribbon is-bottom wow fadeIn" data-wow-delay="500ms"><span>Yuk, jadi Santa sekarang!</span></h2>
  </section>
@stop