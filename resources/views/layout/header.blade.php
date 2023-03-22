<?php

    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\CartController;

    $total = CartController::listItem();

?>







<nav class="navbar navbar-expand-lg navbar-light scrolling-navbar  bg-white fixed-top">

  <div class="container-fluid">

    <!-- Navbar brand -->
    <img src="/images/brand.png" alt="" width="150" height="60">
    



    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/home/recipes">All Items
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          @if (Session::has('user'))
          <a class="nav-link" href="/logout">Logout</a>
          @else
          <a class="nav-link" href="/login">Login</a>
          @endif
        </li>

        @if(Session::has('user') and (Auth::user()->role == '0'))
        <li class="nav-item">
          <a class="nav-link" href="#">My List:-[ {{$total}} ]</a>
        </li>
        @endif
        
        @if((Session::has('user')) and (Auth::user()->role == '1'))
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/admin/home">Admin Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/admin/user">Sent Email</a>
          </li>

          
        </ul>
        @endif
        <!-- Dropdown -->

      </ul>
      <!-- Links -->
    </div>
    <!-- Collapsible content -->
  </div>



  <form class="d-flex mr-5" action="/search" method="post">
    @csrf
    <input class="form-control me-2 mx-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

  @if (Session::has('user'))
  {{(Session::get('user')['name'])}}
  @endif

  <img src="/images/b3.png" alt="" class="mx-2" width="60" height="60">



</nav>

<span></span>


<!-- Navbar -->