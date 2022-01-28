@extends('layouts.app', ['activePage' => 'assign-assessment', 'titlePage' => __('Company')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title ">Company - Assessment</h4>
                    <p class="card-category">All assigned assessments</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-info  btn-sm" data-toggle="modal" data-target="#createModal" rel="tooltip" title="Add New">
                        <i class="material-icons">add</i>
                    </button>
                  </div>
              </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Assessment Type</th>
                  <th>Assessment Name</th>
                  <th>Status</th>
                  <th class="table_action" >Action</th>
                </thead>
                <tbody>

                    @if (!empty($assign_assessments))

                        @foreach ($assign_assessments as $key=>$assign_assessment)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$assign_assessment->company->name}}</td>
                                <td>{{$assign_assessment->assessmentType->name}}</td>
                                <td> @if(isset($assign_assessment->assessment->name)  ) {{$assign_assessment->assessment->name}} @endif </td>
                                <td>
                                    @if ($assign_assessment->status)
                                    <span class="badge badge-success">Active</span>
                                    @else 
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    
                                </td>
                                <td>
                                    
                                    @if(isset($assign_assessment->assessmentType->id) && isset($assign_assessment->assessment->id))
                                     <button type="button" class="btn btn-primary editBtn  btn-sm" data-toggle="modal" data-type_id="{{$assign_assessment->assessmentType->id}}" data-assessment_id="{{$assign_assessment->assessment->id}}" data-company="{{$assign_assessment->company->id}}" data-stauts_val="{{$assign_assessment->status}}" data-target="#createModal" rel="tooltip" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    @endif

                                    <form style="display: inline-block" class="deleteAssignAssessmentForm" method="post">
                                        @csrf
  
                                        <input type="hidden" class="deleteId" name="id" value="{{$assign_assessment->id}}">
                                        <button class="btn btn-danger  btn-sm" rel="tooltip" title="Delete" type="submit"><i class="material-icons">close</i></button>
  
                                    </form>
                                    
                                    
                                    {{-- <a class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete" onclick="return confirm('Are you sure?')" href="{{route('company-assessment-delete', $assign_assessment->id)}}" ><i class="material-icons">close</i></a> --}}
                                </td>
                            </tr>
                        @endforeach

                    @else 

                    <tr>
                        <td colspan="6" class="text-center">
                            No Data Found
                        </td>
                    </tr>
                
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


<!-- Create Modal -->
<div class="modal fade" id="createModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Assign New Assessment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- action="{{route('company-assessment-insert')}}" --}}
        <form  method="post" id="companyAssessmentInsertForm">
            @csrf
            <div class="modal-body">
                @if ($companies)
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Company') }} <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <select name="company_id" class="form-control select2" required id="company_id">
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @endif
                
                @if ($assessmentTypes)
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Assessment') }} <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <select name="type_id" class="form-control select2" required id="type_id">
                                    <option value="">Assessment Type</option>
                                @foreach ($assessmentTypes as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @endif
                

      
                @if ($assessments)
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <select name="assessment_id" required class="form-control select2 assessmentName" id="assessment_id">
                                    <option value="">Assessment</option>
                                @foreach ($assessments as $assessment)
                                    <option value="{{$assessment->id}}">{{$assessment->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <div class="form-group">
                        <input type="radio" name="status" value="1" checked id="active-status" required>
                        <label for="active-status">Active</label>
  
                        <input type="radio" name="status" value="0" id="inactive-status">
                        <label for="inactive-status">Inactive</label>
                      </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submitBtn">Save <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span></button>
            </div>
        </form>


      </div>
    </div>
</div>


@endsection

@push('js')
    <script>
      $(document).ready(function(){
        $('table').DataTable();

      })
        $(document).ready(function(){

            $('.select2').select2();


            $('.editBtn').on('click', function(){

                var type_id = $(this).data('type_id');
                var assessment_id = $(this).data('assessment_id');
                var company_id = $(this).data('company');
                var statusValue = $(this).data('stauts_val');

                // console.log(type_id, assessment_id, company_id);
                $('#company_id').val(company_id);
                $('#type_id').val(type_id);
                // $('.assessmentName').val(assessment_id);
                $('#assessment_id  option[value="' +assessment_id+ '"]').prop('selected', true);
                $("input[name=status][value='"+statusValue+"']").prop("checked",true);

                $('.submitBtn').html('Save changes <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span>');

                $('.select2').select2().trigger('change');


            })


            $('#type_id').on('change', function(){

                var type_id = $(this).val();

                if(type_id){
                    $.ajax({
                        type:"POST",
                        url:"{{ route('findAssessmentByType') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id" : type_id,
                        },
                        success:function(response){
                            
                            $('#assessment_id').html(response);

                        },
                        error:function(err){

                        }
                    })
                }


            })

            $("#companyAssessmentInsertForm").on('submit', function(e){
              e.preventDefault();
              var formData = $(this).serialize();
              $.ajax({
                type: "POST",
                url: "{{route('company-assessment-insert')}}",
                data:formData,
                beforeSend: function() {
									$("#companyAssessmentInsertForm").find(".ph3-loading-button").show();
						    },
                success:function(response){
                  $("#companyAssessmentInsertForm").find(".ph3-loading-button").hide();
                  console.log(response);
                  Toast.fire({
                      type: 'success',
                      title: response.message
                  })

                  setTimeout(function(){
                    location.reload();
                  },3000)


                },
                error:function(error){
                  $("#companyAssessmentInsertForm").find(".ph3-loading-button").hide();
                  console.log(error);
                  Toast.fire({
                      type: 'error',
                      title: 'Someting went wrong. Please try again!'
                  })
                }
              })

            })

            $('.deleteAssignAssessmentForm').on('submit', function(e){

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
                    url: "{{url('/company-assessment-delete')}}/"+id,
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
            });

        })
    </script>
@endpush