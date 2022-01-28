@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>'Assessments'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title ">Assessment List of {{$assessmentType->name}}</h4>
                    <p class="card-category">All assessment</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-md" href="{{url('add-new-assessment-type', $assessmentType->id)}}"><i class="material-icons">add</i> Add New</a>
                  </div>
              </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table custom_table_row_color">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Logo</th>
                  <th>Status</th>
                  <th class="table_action">Action</th>
                </thead>
                <tbody>

                    @if ($assessments)

                        @foreach ($assessments as $key=>$assessment)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$assessment->name}}</td>
                                <td class=""> 

                                  @if ($assessment->image)
                                    <img  class="thum" src="{{asset($assessment->image)}}" alt="Image"> 

                                  @else 
                                    <img  class="thum" src="{{asset('no-image-found.jpeg')}}" alt=""> 

                                  @endif
                                </td>
                                  <td>

                                  @if ($assessment->status==0)
                                  <span class="badge badge-danger">Inactive</span>
                                  @elseif($assessment->status==1)
                                  <span class="badge badge-success">Active</span>
                                  @elseif($assessment->status==2)
                                  <span class="badge badge-info">Pending Review</span>
                                  @elseif($assessment->status==3)
                                  <span class="badge badge-danger">Draft</span>
                                  @elseif($assessment->status==4)
                                  <span class="badge badge-secondary">Archived</span>
                                  @elseif($assessment->status==5)
                                  <span class="badge badge-secondary">Published</span>
                                  @endif
                                    
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" title="Details" href="{{url('edit-assessment', $assessment->id)}}"><i class="material-icons">playlist_add</i></a>
                                    <a class="btn btn-primary btn-sm" title="Edit" href="{{url('assessment-parent-edit', $assessment->id)}}"> <i class="material-icons">edit</i></a> 
                                   
                                    {{-- <a class="btn btn-danger btn-sm" title="Delete" href="{{route('deleteParent',$assessment->id)}}" ><i class="material-icons">close</i></a> --}}

                                    <form class="deleteAssessmentForm form_inline_block" method="post">
                                      @csrf
                                      <input type="hidden" class="deleteId" name="id" value="{{$assessment->id}}">

                                      <button class="btn btn-danger btn-sm" type="submit" title="Delete"><i class="material-icons">close</i></button>

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


        $('.deleteAssessmentForm').on('submit', function(e){
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
                  url: "{{url('/delete-parent')}}/"+id,
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


      })
    </script>
@endpush