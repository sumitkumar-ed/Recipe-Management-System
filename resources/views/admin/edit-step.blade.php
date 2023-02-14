@extends('layout.main')

@section('main-section')






          <h3 class="mb-4 pb-2 pb-md-0 middle mb-md-5">Update Ingredients
            <hr>
          </h3>
          <form action="{{route('update.step')}}" method="post" enctype="multipart/form-data">
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

                    @foreach($sdata as $data)
                    <tr>
                      <td>{{ $data->id }}<input type="hidden" name="id[]" value="{{ $data->id }}"></td>
                      <td><input type="number" name="step_no[]" class="form-control" placeholder="Step No" value="{{ $data->step_no }}"></td>
                      <td><textarea name="step[]" cols="30" rows="2">{{$data->step}}</textarea></td>
                      <th><a href="javascript:void(0)" class="btn btn-sm btn-danger deleteIng">-</a></th>


                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
            </div>


            <input type="Submit" value="Update">


          </form>
        


  <script>
    // for Ingredients
        $('#table1').on('click', '.addIng', function(){
          var tr = "<tr>"+
                      "<td><input type='hidden' name='id[]'></td>"+
                      "<td><input type='number' name='stepno[]' class='form-control' placeholder='Step No'></td>"+
                      "<td><textarea name='step[]' cols='30' rows='2'></textarea></td>"+

                      "<th><a href='javascript:void(0)' class='btn btn-sm btn-danger deleteIng'>-</a></th>"+
                    "</tr>"
    
              $('#tbody1').append(tr);
      });
    
      $('#tbody1').on('click','.deleteIng', function(){
          $(this).parent().parent().remove();
      });

  </script>







  @endsection