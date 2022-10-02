@extends('layouts.kuis')

@section('content')

<!-- Recent game section  -->
<section class="food_section layout_padding">
    <audio controls autoplay>
  <source src="{{asset('audio/kuis.mp3')}}" type="audio/mp3">
</audio>
  <div class="container">
    <div class="heading_container heading_center">
      <div class="section-title">
        <div class="cata new">EVENTS</div>
        <h2>YUK Belajar Sambil Bermain !</h2>
      </div>
    </div>

    <br>
    <div class="filters-content">
      <div class="row grid" >
        @foreach($events as $item)
        <div class="col-sm-6 col-lg-4 all pizza">
          <div class="box">
            <div>
              <img src="{{asset('assetshomeuser/img/quiz.jpeg')}}" alt="" style="width:50%; height: 150px">
              <div class="detail-box">
                <h5>{{$item->namaevent}}</h5>
                <p class="comment">Berakhir : {{$item->tanggal_akhir}}</a>
                <div class="rgi-extra">
                  <button class="btn btn-warning"><a href="{{ url('kuismain/'. $item->id_event) }}" style="color: black;">Main</a></button>
                </div>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    

  </div>
  
</section>

<!-- Recent game section end -->

@endsection