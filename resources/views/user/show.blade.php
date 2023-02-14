@extends('layout.main')

@section('main-section')

<!--Section: Content-->
<section class="middle">

    <div class="row ">
        <div class="col-md-6 gx-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong " data-mdb-ripple-color="light">
                <img src="/images/{{$recipes->picture}}" class="img-fluid rounded" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>
        </div>

        <div class="col-md-6 gx-5 mb-4">
            <h4><strong>{{$recipes->title}}</strong></h4>
            <p class="text-muted">{{$recipes->description}}</p>

        </div>
    </div>

    <form action="/add_to_list" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3 mb-4">
                <input type="hidden" name="recipe_id" value="{{$recipes->id}}">
            <button class="btn btn-primary" type="submit">Add To List</button>
        </div>
        </div>
    </form>
    


    <div class="row">
        {{-- Steps To Make Recipe --}}
        <div class=" col-md-8  mb-4">
            <div class="card  shadow-2-strong " style="border-radius: 15px;">
                <div class="card-body">
                    <h4><strong>Steps Have To Follow</strong></h4><b><hr /></b>
                    @foreach ($recipes->steps as $step)
                    <p class="text-muted">{{ $step->step_no }} :- {{ $step->step }} </p>
                    
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Ingredients Required --}}

        <div class=" col-md-4  mb-4">
            <div class="card  shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body">
                    <h4><strong>Ingredients</strong></h4><hr>
                    @foreach ($recipes->ingredients as $ingredient)
                    <p class="text-muted">{{$loop->iteration}} :- {{ $ingredient->ingredient }} </p>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section: Content-->

@endsection