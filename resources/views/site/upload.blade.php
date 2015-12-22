@extends('layouts.master')

@section('content')
  <section class="section-main">
    @include('_partials.nav')

    <div class="deer wow bounceInLeft" data-wow-duration="700ms" data-wow-delay="750ms"></div>
    <div class="santa wow bounceInLeft" data-wow-duration="500ms" data-wow-delay="750ms"></div>
    <div class="snowman wow bounceInRight" data-wow-duration="450ms" data-wow-delay="750ms"></div>
    <div class="woodmark wow fadeInUp" data-wow-duration="450ms" data-wow-delay="750ms">
      Share:
      <ul class="social-links">
        <li><a href="#" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a></li>
      </ul>
    </div>

    <div class="container section-content">
      <a href="{{ route('home') }}"><span class="logo wow zoomIn" data-wow-delay="200ms">Mirum Santa's Carrier</span></a>

      <div class="form-container wow fadeIn" data-wow-delay="500ms">
        <!-- upload images -->
        <div class="step1">
          <h2 class="wow fadeIn" data-wow-delay="700ms">Upload Foto Hadiahmu!</h2>

          <p class="form-subtitle wow fadeIn" data-wow-delay="800ms">Pastikan masing-masing foto hanya berisi satu item.</p>

          <form action="{{ route('process.upload')}}" class="dropzone wow bounceIn" data-wow-delay="1000ms" id="dopezone">
            <div class="dz-message">
              <i class="fa fa-3x fa-camera"></i><br>
              Drag & Drop fotomu di sini atau<br>Klik di sini untuk Browse
            </div>
            <div class="fallback">
              <input name="file" type="file" multiple />
            </div>
          </form>

          <a href="{{ route('submit')}}" class="btn-svg wow tada" data-wow-delay="1250ms">
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
            <span>Lanjutkan</span>
          </a>
        </div>
      </div>
    </div>
  </section>
@stop

@section('scripts')
  <script>
    var token = "{!! Session::getToken() !!}";

    Dropzone.options.dopezone = {
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 2, // MB
      addRemoveLinks: true,
      parallelUploads: 1,
      params: {
          _token: token
      }
    };
  </script>
@stop