@extends('layout.main')

@section('main-section')
<div class="middle">
  @if ($message = Session::get('isadmin'))
  <div class="alert alert-danger " role="alert">
    <a href="{{route('home.recipes')}}"> <button type=" button" class="close" data-dismiss="alert">×</button></a>
    <strong>{{ $message }}</strong>
  </div>
  {{Session::forget('isadmin')}}
  @endif
</div>

<h1 class="text-center mt-2">All Products</h1>
<hr>
<br>


<!--Section: Content  card card card card-->
<section class="text-center">
  <h4 class="mb-5"><strong>All Recipes</strong></h4>

  @if(Session::has('success'))
  <p class="text-danger">{{ Session::get('success') }}</p>
  @endif

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




@endsection