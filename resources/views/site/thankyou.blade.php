@extends('layouts.master')

@section('content')
  <div class="section-main section-thankyou">
    @include('_partials.nav')

    <span class="logo wow zoomIn" data-wow-delay="200ms">Mirum Santa's Carrier</span>

    <div class="thankyou-container wow fadeInUp" data-wow-delay="500ms">
      <h1 class="has-ribbon ribbon-blue"><span>Terima Kasih!</span></h1>

      <p class="visible-md-block hidden-lg"><img src="{{ assets_url('images/presents.png') }}" alt="Presents"></p>

      <p class="form-subtitle">Hadiahmu telah ditambahkan ke daftar cek kami.Kami akan memberi pesan balasan segera. Harap menunggu karena para Peri selalu sibuk menjelang hari Natal :)</p>

      <h3 class="alternate-heading">Ayo ajak juga teman-temanmu untuk menjadi Santa!</h3>

      <div class="form-subtitle">
        <ul class="social-links">
          <li>Share social media: </li>
          <li><a href="#" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
@stop