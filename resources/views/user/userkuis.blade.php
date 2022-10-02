@extends('layouts.kuis')

@section('content')
<section class="hero-section">
  <audio controls autoplay>
    <source src="{{asset('audio/user.mp3')}}" type="audio/mp3">
  </audio>
  <div class="hero-slider owl-carousel">
    <div class="hs-item set-bg" data-setbg="{{asset('assetshomeuser/img/bg1.jpeg')}}">

      <div class="hs-text">
        <div class="container">
          <h2>Selamat Datang <span>{{ Auth::user()->name }}</span> !!</h2>
          <a href="{{url('kuis')}}" class="site-btn">Total Kuis : {{App\Models\Event:: count() ?? '0' }} Kuis</a>
        </div>
      </div>
    </div>

    <div class="hs-item set-bg" data-setbg="{{asset('assetshomeuser/img/bg2.jpeg')}}">
      <div class="hs-text">
        <div class="container">
          <div class="card" style="border-radius: 50px;">
            <div class="card-body">
              <h3 class="mb-4" style="text-align: center;">Cara Bermain Kuis !</h3>
              <p style="color: black; text-align: center;">
                Kuis ini bertujuan untuk mengasah kemampuan mengenai pengetahuan kalian!
              </p>
              <p style="color: black;">
                <strong>Cara Bermain Kuis :</strong>
              </p>
              <p style="color: black;"> 1. Klik pada menu "Kuis"</p>
              <p style="color: black;"> 2. Setelah muncul daftar kuis yang ada, pilihlah "Event" sesuai keinginan kalian</p>
              <p style="color: black;"> 3. Selanjutnya, kalian bisa klik pada tombol "Bermain"</p>
              <p style="color: black;"> 4. Setelah soal dari kuis berhasil muncul, kerjakan dan jawablah dengan benar!!!</p>
              <p class="d-inline" style="color: black;">
                <strong>Note</strong>: Kerjakan secara rutin jika ada kuis event baru. Kumpulkan poin dan dapatkan voucher gratis dari event yang ada !
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>

</html>
@endsection