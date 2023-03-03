@extends('layout.main')

@section('main-section')






<div class="container py-5 h-100">
    <div class="row  justify-content-center top align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong " style="border-radius: 15px;">
                <div class="card-body card-borderd p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Enter Recipe Details
                        <hr>
                    </h3>
                    <form action="{{route('update',$rdata->uuid)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <input name="id" value="{{$rdata->id}}" hidden>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="firstName">Title</label>
                                    <input type="text" id="title" name="title" class="form-control form-control-lg"
                                        value="{{ $rdata->title }}" />
                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label select-label">Category</label>
                                    <select id="category" name="category" class="select form-control-lg">
                                        <option disabled>Choose option</option>
                                        <option value="v">Veg</option>
                                        <option value="n">Non-Veg</option>

                                    </select>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label select-label">Upload an Image</label>
                                <input id="picture" name="picture" type="file" >
                                <img src="/images/{{$rdata->picture}}" width="100">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="form-label select-label">Write Description Here</label>
                                <textarea name="description" id="description" cols="50"
                                    rows="5">{{$rdata->description}}</textarea>
                                <hr>
                            </div>
                        </div>

                        <button type="submit">Update</button>


                    </form>
                </div>
            </div>
        </div>
    </div>










    @endsection