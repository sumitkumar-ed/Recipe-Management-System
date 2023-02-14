@extends('layout.main')
@section('main-section')

<section class="middle">
    <div class="text-green">
        <strong style="color: green;" >Add New</strong>
        <a href="{{route('create')}}" ><i class="fa fa-plus btn btn-outline-success btn-sm" aria-hidden="true" > </i></a>
    </div>
    <table id="myTable" class="table table-striped">

        <thead>
            <tr>
                <th data-field="id">ID</th>
                <th data-field="name">Title</th>
                <th data-field="image">Image</th>
                <th data-field="action">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
            <tr>
                <td >{{$loop->iteration}}</td>
                <td>{{$data->title}}</td>
                <td><img src="/images/{{ $data->picture }}" height="50px" alt="..."></td>
               
                <td>
                    <a href="{{route('recipes.show',$data->id)}}"><i class="fa fa fa-eye btn btn-outline-info btn-sm "></i></a>
                    <a href="{{route('edit',$data->id)}}"><i class="fa fa-edit btn btn-outline-warning btn-sm"></i></a>
                    <a href="{{route('delete',$data->id)}}"><i class="fa fa-trash btn btn-outline-danger btn-sm" aria-hidden="true"></i></a>
                    
                </td>

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
        $('#myTable').bootstrapTable();
      });
    </script>

</section>
@endsection