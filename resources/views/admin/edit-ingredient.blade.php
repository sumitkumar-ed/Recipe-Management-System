@extends('layout.main')

@section('main-section')






<div class="container py-5 h-100">
  <div class="row  justify-content-center top align-items-center h-100">
    <div class="col-12 col-lg-9 col-xl-7">
      <div class="card shadow-2-strong " style="border-radius: 15px;">
        <div class="card-body card-borderd p-4 p-md-5">
          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Update Ingredients
            <hr>
          </h3>
          <form action="{{route('update.ingredient')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="form-group child-repeater-table col-12">
                <table id="table1" class="table table-border table-responsive">
                  <thead>
                    <tr>
                      <th>Add Ingredients</th>
                      <th><a href="javascript:void(0)" class="btn btn-sm btn-success addIng">+</a></th>


                    </tr>
                  </thead>

                  <tbody id="tbody1">

                    @foreach($idata as $data)
                    <tr>
                      <td>{{$data->recipe_id}}-{{ $data->id }}<input type="hidden" name="id[]" value="{{ $data->id }}"></td>
                      <td><input type="hidden" name="recipe_id[]" class="form-control" value="{{$data->recipe_id}}">
                      <td><input type="text" name="ingredient[]" class="form-control" value="{{$data->ingredient}}"></td>
                      <th><a href="javascript:void(0)" class="btn btn-sm btn-danger deleteIng">-</a></th>


                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
            </div>


            <input type="Submit" value="Update">


          </form>
        </div>
      </div>
    </div>
  </div>


  <script>
    // for Ingredients
        $('#table1').on('click', '.addIng', function(){
          var tr = "<tr>"+
                      "<td>{{ $data->id }}<input type='hidden' name='id[]' value='{{ $data->id }}'></td>"+
                      "<td><input type='text' name='ingredient[]' class='form-control' place></td>"+
                      "<th><a href='javascript:void(0)' class='btn btn-sm btn-danger deleteIng'>-</a></th>"+
                    "</tr>"
    
              $('#tbody1').append(tr);
      });
    
      $('#tbody1').on('click','.deleteIng', function(){
          $(this).parent().parent().remove();
      });

  </script>







  @endsection