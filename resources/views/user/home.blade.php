@extends('layout.main')

@section('carasoul-section')

<!--Carasoul -->
<div class="middle">
  @if ($message = Session::get('isadmin'))
  <div class="alert alert-success alert-block" role="alert">
    <a href='/back'> <button type="button" class="close" data-dismiss="alert">×</button></a>
    <strong>{{ $message }}</strong>
  </div>
  {{Session::forget('isadmin')}}
  @endif
</div>
<div id="carouselExampleCaptions" class="carousel top slide py-5" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/rf1.jpg" class="d-block w-100 rounded" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/rf2.jpg" class="d-block w-100 rounded" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/rf3.jpg" class="d-block w-100 rounded" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
<!--Carasoul -->
@endsection

@section('main-section')

<div>
  @if (Session::has('success'))
  <div class="alert alert-info">{{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  </div>
  @endif
</div>





<!--Main layout-->
<main class="mt-5">

  <!--Section: Content-->
  <section>
    <div class="row">
      <div class="col-md-6 gx-5 mb-4">
        <div class="bg-image hover-overlay ripple shadow-2-strong " data-mdb-ripple-color="light">
          <img src="https://mdbootstrap.com/img/new/slides/031.jpg" class="img-fluid rounded" />
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
          </a>
        </div>
      </div>

      <div class="col-md-6 gx-5 mb-4">
        <h4><strong>Facilis consequatur eligendi</strong></h4>
        <p class="text-muted">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis consequatur
          eligendi quisquam doloremque vero ex debitis veritatis placeat unde animi laborum
          sapiente illo possimus, commodi dignissimos obcaecati illum maiores corporis.
        </p>
        <p><strong>Doloremque vero ex debitis veritatis?</strong></p>
        <p class="text-muted">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod itaque voluptate
          nesciunt laborum incidunt. Officia, quam consectetur. Earum eligendi aliquam illum
          alias, unde optio accusantium soluta, iusto molestiae adipisci et?
        </p>
      </div>
    </div>
  </section>
  <!--Section: Content-->

  <hr class="my-5" />

  <!--Section: Content  card card card card-->
  <section class="text-center">
    <h4 class="mb-5"><strong>Newly Added Recipes</strong></h4>

    <div class="row">
      @foreach($recipes as $data)
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="/images/{{$data->picture}}" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$data->title}}</h5>
            <p class="card-text">{{$data->description}}</p>
            <a href="{{route('recipes.show',$data->uuid)}}" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    </div>
  </section>
  <!--Section: Content-->

  <hr class="my-5" />


  @endsection