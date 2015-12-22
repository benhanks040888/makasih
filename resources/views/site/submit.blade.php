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
        <div class="stamp wow rotateInUpRight" data-wow-delay="600ms"></div>
        <div class="step2">
          <h2 class="wow fadeIn" data-wow-delay="700ms">Berbagi itu Selalu Indah...</h2>
          <p class="form-subtitle wow fadeIn" data-wow-delay="800ms">
            Isi data-data dirimu di sini untuk penjemputan <a href="#" data-remodal-target="modal">HADIAH</a>.
            <br>
            Pastikan barang-barangmu telah siap pada waktu penjemputan.
          </p>
          
          {!! Form::open(array('route' => 'process.submit', 'class' => 'form wow fadeIn', 'data-wow-delay' => '1000ms')) !!}
            <div class="row mb15">
              <div class="col-sm-8">
                <div class="row form-group">
                  <label for="first_name" class="col-sm-4 label-inline text-uppercase">Nama Depan</label>
                  <div class="col-sm-8">
                    {!! Form::text('first_name', '', ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => 'Nama depan kamu', 'required' => true]) !!}
                  </div>
                </div>
                <div class="row form-group">
                  <label for="last_name" class="col-sm-4 label-inline text-uppercase">Nama Belakang</label>
                  <div class="col-sm-8">
                    {!! Form::text('last_name', '', ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => 'Nama belakang kamu', 'required' => true]) !!}
                  </div>
                </div>
                <div class="row form-group">
                  <label for="mobile" class="col-sm-4 label-inline text-uppercase">Telepon</label>
                  <div class="col-sm-8">
                    {!! Form::tel('mobile', '', ['id' => 'mobile', 'class' => 'form-control', 'placeholder' => 'Nomor telepon kamu', 'required' => true]) !!}
                  </div>
                </div>
                <div class="row form-group">
                  <label for="address" class="col-sm-4 label-inline text-uppercase">Alamat</label>
                  <div class="col-sm-8">
                    {!! Form::text('address', '', ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Alamat kamu', 'required' => true]) !!}
                  </div>
                </div>
                <div class="row form-group">
                  <label for="email" class="col-sm-4 label-inline text-uppercase">Email</label>
                  <div class="col-sm-8">
                    {!! Form::email('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email kamu', 'required' => true]) !!}
                  </div>
                </div>
                <div class="row form-group">
                  <label for="pickup_date" class="col-sm-4 label-inline text-uppercase">Waktu Jemput</label>
                  <div class="col-sm-5">
                    {!! Form::date('pickup_date', '', ['id' => 'pickup_date', 'class' => 'form-control', 'placeholder' => 'Tanggal', 'required' => true]) !!}
                  </div>
                  <div class="col-sm-3">
                    {!! Form::time('pickup_time', '', ['id' => 'pickup_time', 'class' => 'form-control', 'placeholder' => 'Waktu', 'required' => true]) !!}
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <p>Santa, Kamu bisa mendapatkan update mengenai hadiah yang sudah dikirim melalui ID social mediamu!</p>
                <div class="form-socials">
                  <div class="form-group">
                    <label class="label-icon"><i class="fa fa-facebook"></i></label>
                    {!! Form::text('fb_id', '', ['id' => 'fb_id', 'class' => 'form-control', 'placeholder' => 'Link FB kamu']) !!}
                  </div>
                  <div class="form-group">
                    <label class="label-icon"><i class="fa fa-twitter"></i></label>
                    {!! Form::text('twitter_id', '', ['id' => 'twitter_id', 'class' => 'form-control', 'placeholder' => 'Link Twitter kamu']) !!}
                  </div>
                  <div class="form-group">
                    <label class="label-icon"><i class="fa fa-instagram"></i></label>
                    {!! Form::text('in_id', '', ['id' => 'in_id', 'class' => 'form-control', 'placeholder' => 'Link Instagram kamu']) !!}
                  </div>
                </div>

              </div>
            </div>
            
            <div class="text-center">
              <div class="form-group wow fadeIn" data-wow-delay="1000ms">
                <div class="checkbox">
                  {!! Form::checkbox('agree', 1, null, array('id' => 'agree', 'required' => true)) !!}
                  <label for="agree">Saya menyetujui dan telah membaca <a href="#" data-remodal-target="modal">syarat & ketentuan</a></label>
                </div>
              </div>

              <button type="submit" class="btn-svg wow tada" data-wow-delay="1250ms">
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
                <span>Submit</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@stop