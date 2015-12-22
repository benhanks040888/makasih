<nav class="wow bounceInDown {{ Request::is('/') ? 'smooth-scroll' : '' }}">
  @if (Request::is('/'))
    <a href="#home">Jemput Sekarang</a>
    <a href="#about">Tentang Kami</a>
  @else
    <a href="{{ route('home') }}">Jemput Sekarang</a>
    <a href="{{ route('home') }}/#about">Tentang Kami</a>
  @endif
</nav>