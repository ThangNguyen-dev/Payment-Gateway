@extends('layouts.app')
@include('layouts.nav')
@extends('layouts.footer')
@section('content')
    <main role="main">
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="first-slide img-carousel" src="{{asset('public/img/carousel.jpg')}}" alt="First slide">
                    <div class="container">
            <div class="carousel-caption text-left">
              <h1>Example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide img-carousel" src="{{asset('public/img/carousel.jpg')}}" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item active">
          <img class="third-slide img-carousel" src="{{asset('public/img/carousel.jpg')}}" alt="Third slide">
          {{--  --}}
        </div>
      </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Marketing messaging and features
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container-fluid">
        <div class="card-group">
            <div class="col-sm-4 card">
                <img class="card-img-top rounded"
                     src="https://static.mservice.io/img/s500x240/momo-upload-api-210923150837-637680065171169736.png"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <div class="">
                        Ngày hết hạn: <strong>31/10/2021</strong>
                    </div>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card col-sm-4">
                <img class="card-img-top rounded"
                     src="https://static.mservice.io/img/s500x240/momo-upload-api-210923150837-637680065171169736.png"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <div class="">
                        Ngày hết hạn: <strong>31/10/2021</strong>
                    </div>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card col-sm-4">
                <img class="card-img-top rounded"
                     src="https://static.mservice.io/img/s500x240/momo-upload-api-210923150837-637680065171169736.png"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <div class="">
                        Ngày hết hạn: <strong>31/10/2021</strong>
                    </div>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
