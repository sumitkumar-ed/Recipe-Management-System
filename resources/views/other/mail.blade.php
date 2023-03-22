@extends('layout.main')
@section('main-section')

<section class="middle">
  
    <table id="myTable" class="table table-striped">

        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="name">User</th>
                <th data-field="image">Email</th>
                <th data-field="action">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                {{-- {{dd($data->uuid)}}; --}}
                <td><a href={{route('sent.email',['id'=>$data->uuid])}}><i class="fa fa-envelope"></i></a></td>

{{-- {{route('sent.email',$data->uuid)}} --}}
            </tr>

            @endforeach
        </tbody>
    </table>

</section>
@endsection