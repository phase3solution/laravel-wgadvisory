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
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Assessment Type</th>
                  <th>Assessment Name</th>
                  <th>Status</th>
                  <th>Action</th>
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
                                     <button type="button" class="btn btn-primary editBtn btn-link btn-sm" data-toggle="modal" data-type_id="{{$assign_assessment->assessmentType->id}}" data-assessment_id="{{$assign_assessment->assessment->id}}" data-company="{{$assign_assessment->company->id}}" data-stauts_val="{{$assign_assessment->status}}" data-target="#createModal" rel="tooltip" title="Edit">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    @endif

                                   
                                    
                                    
                                    <a class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete" onclick="return confirm('Are you sure?')" href="{{route('company-assessment-delete', $assign_assessment->id)}}" ><i class="material-icons">close</i></a>
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
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Assign New Assessment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{route('company-assessment-insert')}}" method="post">
            @csrf
            <div class="modal-body">
                @if ($companies)
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Company') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select name="company_id" class="form-control select2" id="company_id">
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
                    <label class="col-sm-3 col-form-label">{{ __('Assessment') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select name="type_id" class="form-control select2" id="type_id">
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
                    <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select name="assessment_id" class="form-control select2" id="assessment_id">
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
                    <label class="col-sm-3 col-form-label">{{ __('Status') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select name="status" class="form-control select2" id="status">
                                    <option value=""></option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submitBtn">Save</button>
            </div>
        </form>


      </div>
    </div>
</div>


@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('.select2').select2();


            $('.editBtn').on('click', function(){

                var type_id = $(this).data('type_id');
                var assessment_id = $(this).data('assessment_id');
                var company_id = $(this).data('company');
                var statusValue = $(this).data('stauts_val');

                console.log(type_id, assessment_id, company_id);
                $('#company_id').val(company_id);
                $('#type_id').val(type_id);
                $('#assessment_id').val(assessment_id);
                $('#status').val(statusValue);
                $('.submitBtn').html("Save changes");

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

        })
    </script>
@endpush