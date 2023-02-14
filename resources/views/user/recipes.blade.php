@extends('layout.main')

@section('main-section')

<h1 class="text-center mt-2">All Products</h1>
<hr>
<br>


<!--Section: Content  card card card card-->
<section class="text-center">
    <h4 class="mb-5"><strong>All Recipes</strong></h4>

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
            <a href="{{route('recipes.show',$data->id)}}" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    </div>
  </section>
  <!--Section: Content-->




@endsection