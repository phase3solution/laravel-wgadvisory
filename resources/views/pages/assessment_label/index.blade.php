{{-- assessmentLabels --}}

@extends('layouts.app', ['activePage' => 'assessmentLabel', 'titlePage' => __('Settings')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title ">Assessment Labels</h4>
                    <p class="card-category">All types of assessment labels</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="Add New" href="{{route('assessmentLabel.create')}}"><i class="material-icons">add</i></a>
                  </div>

              </div>

          </div>
          <div class="card-body">
            <div class="">
              <table class="table table-striped" id="labelTable">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Types</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th class="table_action" >Action</th>
                </thead>
                <tbody>

                    @if ($assessmentLabels)

                        @foreach ($assessmentLabels as $key=>$assessmentLabel)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$assessmentLabel->name}}</td>
                                <td>{{ $assessmentLabel->assessmentType->name }}</td>
                                <td>
                                  @if($assessmentLabel->description)
                                      {{$assessmentLabel->description}}
                                  @else
                                      --
                                  @endif
                                </td>
                                <td>
                                  @if ($assessmentLabel->status == 1)
                                    <span class="badge badge-success">Active</span>

                                  @else
                                    <span class="badge badge-danger">Inactive</span>

                                  @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary  btn-sm" rel="tooltip" title="Edit" href="{{route('assessmentLabel.edit', $assessmentLabel->id)}}"><i class="material-icons">edit</i></a>
                                    {{-- <a class="btn btn-danger btn-link btn-sm" href="" rel="tooltip" title="Delete" ><i class="material-icons">close</i></a> --}}
                                  
                                    <form style="display: inline-block" class="deleteAssessmentLabelForm" method="post">
                                      @csrf
                                      @method('delete')
                                      <input type="hidden" class="deleteId" name="id" value="{{$assessmentLabel->id}}">

                                      <button class="btn btn-danger  btn-sm" rel="tooltip" title="Delete" type="submit"><i class="material-icons">close</i></button>

                                    </form>
                                
                                </td>
                            </tr>
                        @endforeach
                
                    @endif
       
 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>
@endsection

@push('js')
    <script>
      $(document).ready(function(){
        $('#labelTable').DataTable();

      })

      $(document).on('submit', '.deleteAssessmentLabelForm', function(e){

        e.preventDefault();
            var id = $(this).find('.deleteId').val();
            var formData = $(this).serialize();



            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {

                $.ajax({
                  type:"POST",
                  url: "{{url('assessmentLabel')}}/"+id,
                  data: formData,
                  success:function(response){

                    Toast.fire({
                          type: 'success',
                          title: response.message
                      })

                      setTimeout(function(){
                        location.reload();
                      },3000)

                  },
                  error:function(error){
                    console.log(error);

                    Toast.fire({
                          type: 'error',
                          title: "Server error!"
                      })
                  }
                })

                  
              }
          });

      })
    </script>
@endpush