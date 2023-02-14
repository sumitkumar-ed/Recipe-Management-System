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
          <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-4">

                <div class="form-outline">
                  <label class="form-label" for="firstName">Title</label>
                  <input type="text" id="title" name="title" class="form-control form-control-lg" />
                </div>

              </div>
              <div class="col-md-6 mb-4">

                <div class="form-outline">
                  <label class="form-label select-label">Category</label>
                  <select id="category" name="category" class="select form-control-lg">
                    <option disabled>Choose option</option>
                    <option id="category" name="category" value="v">Veg</option>
                    <option id="category" name="category" value="n">Non-Veg</option>

                  </select>

                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-4">
                <label class="form-label select-label">Upload an Image</label>
                <input id="picture" name="picture" type="file" />
              </div>

            </div>

            <div class="row">
              <div class="col-md-12 mb-4">
                <label class="form-label select-label">Write Description Here</label>
                <textarea name="description" id="description" cols="50" rows="5"></textarea>
                <hr>
              </div>
            </div>

            {{-- Add Ingredients===================== --}}
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
                    <tr>
                      <td><input type="text" name="ingredient[]" class="form-control" place></td>
                      <th><a href="javascript:void(0)" class="btn btn-sm btn-danger deleteIng">-</a></th>


                    </tr>
                  </tbody>

                </table>
              </div>
            </div>







            {{-- Add Steps ===============================--}}

            <div class="row">
              <div class="form-group child-repeater-table col-12">
                <table id="table2" class="table table-border table-responsive">
                  <thead>
                    <tr>
                      <th>Add Steps</th>
                      <th><a href="javascript:void(0)" class="btn btn-sm btn-success addStep">+</a></th>
                    </tr>
                  </thead>

                  <tbody id="tbody2">
                    <tr>
                      <td><input type="number" name="stepno[]" class="form-control" placeholder="Step No"></td>
                      <td><textarea name="step[]" cols="30" rows="2"></textarea></td>
                      <th><a href="javascript:void(0)" class="btn btn-sm btn-danger deleteStep">-</a></th>


                    </tr>
                  </tbody>

                </table>
              </div>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>




            {{-- more Input fields end --}}


          </form>
        </div>
      </div>
    </div>
  </div>






  <script>
    // for Ingredients
    $('#table1').on('click', '.addIng', function(){
      var tr = "<tr>"+
                  "<td><input type='text' name='ingredient[]' class='form-control' place></td>"+
                  "<th><a href='javascript:void(0)' class='btn btn-sm btn-danger deleteIng'>-</a></th>"+
                "</tr>"

          $('#tbody1').append(tr);
  });

  $('#tbody1').on('click','.deleteIng', function(){
      $(this).parent().parent().remove();
  });



  //For Step

  $('#table2').on('click', '.addStep', function(){
      var tr1 = "<tr>"+
                  "<td><input type='number' name='stepno[]' class='form-control' placeholder='Step No'></td>"+
                  "<td><textarea name='step[]' cols='30' rows='2'></textarea></td>"+
                  "<th><a href='javascript:void(0)' class='btn btn-sm btn-danger deleteStep'>-</a></th>"+
                "</tr>"

          $('#tbody2').append(tr1);
  });

  $('#tbody2').on('click','.deleteStep', function(){
      $(this).parent().parent().remove();
  });

  </script>



  @endsection