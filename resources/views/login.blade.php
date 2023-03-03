@extends('layout.main')

@section('main-section')






<div class="row d-flex justify-content-center align-items-center top h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">

            <div class="card-body p-5 text-center">

                <div class="  pb-5">


                    <form action="login/user" method="post">
                        {{method_field('post')}}
                        @csrf

                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-white-50 mb-2">Please enter your email and password!</p>

                        <div class="form-outline form-white mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            <label class="form-label" for="typeEmailX">Email</label>
                        </div>

                        @if ($errors->has('email'))
                        
                        <span class="text-danger"> {{ $message }} </span>
                        @endif

                        <div class="form-outline form-white mb-4">
                            <input type="password" id="typePasswordX" name="password"
                                class="form-control form-control-lg" />
                            <label class="form-label" for="typePasswordX">Password</label>
                        </div>

                        <p class="small mb-2 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="/register"
                                    class="text-white-50 fw-bold">Sign
                                    Up</a>
                            </p>
                        </div>
                    </form>


                    <div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block" role="alert">
                            <a href="/login"> <button type="button" class="close" data-dismiss="alert">×</button></a>
                            <strong>{{ $message }}</strong>
                        </div>
                        {{Session::forget('success')}}
                        @endif


                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block" role="alert">
                            <a href="/login"> <button type="button" class="close" data-dismiss="alert">×</button></a>
                            <strong>{{ $message }}</strong>
                        </div>
                        {{Session::forget('error')}}
                        @endif
                    </div>


                </div>


            </div>
        </div>
    </div>
</div>

@endsection