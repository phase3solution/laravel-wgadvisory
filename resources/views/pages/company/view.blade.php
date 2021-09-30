@extends('layouts.app', ['activePage' => 'company', 'titlePage' => __('Company')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title ">Company</h4>
                    <p class="card-category">All available company</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info  btn-sm" rel="tooltip" title="Add New" href="{{route('company.create')}}"><i class="material-icons">add</i></a>
                  </div>
              </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="companyTable">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Dashboard</th>
                  <th>Assessment Info</th>
                  <th>User Info</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                    @if (!empty($companies))

                        @foreach ($companies as $key=>$company)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$company->name}}</td>
                                <td>
                                  
                                  @if ($company->dashboard_type ==1 )
                                  Dashboard A
                                  @elseif($company->dashboard_type ==2 )
                                  Dashboard B
                                  @elseif($company->dashboard_type ==3 )
                                  Dashboard C
                                  @elseif($company->dashboard_type ==4 )
                                  Dashboard D
                                  @else
                                  --
                                  @endif
                                  
                                
                                </td>
                                <td>

                                  @if (count($company->companyAsessmentType) > 0)
                                      @foreach ($company->companyAsessmentType as $type)
                                         <span> @if(isset($type->assessmentType->name)) {{$type->assessmentType->name}}  @endif   </span> @if(isset($type->assessment->name)) {{$type->assessment->name}} @endif  <br> 
                                      @endforeach

                                  @else 
                                  --    
                                  @endif
                                  
                                </td>
                                <td>
                                    {{-- userCompany --}}
                                    @if (count($company->userCompany) > 0)
                                      @foreach ($company->userCompany as $userInfo)
                                      <a href="mailto:{{$userInfo->user->email}}" rel="tooltip" title="{{$userInfo->user->email}}" >{{$userInfo->user->name}}</a>
                                      <br> 
                                         
                                      @endforeach

                                  @else 
                                  --    
                                  @endif

                                </td>
                                <td>

                                  @if ($company->status)
                                  <span class="badge badge-success">Active</span>

                                  @else 
                                  <span class="badge badge-danger">Inactive</span>

                                  @endif

                                </td>
                                <td>
                                    <a class="btn btn-primary btn-link btn-sm" rel="tooltip" title="Edit" href="{{route('company.edit', $company->id)}}"><i class="material-icons">edit</i></a>
                                    {{-- <a class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete" href="" ><i class="material-icons">close</i></a> --}}
                                    
                                    <form class="deleteCompanyForm" method="post">
                                      @csrf
                                      @method('delete')
                                      <input type="hidden" class="deleteId" name="id" value="{{$company->id}}">

                                      <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete" type="submit"><i class="material-icons">close</i></button>

                                    </form>

                                
                                  </td>
                            </tr>
                        @endforeach

                    @else 

                    <tr>
                        <td colspan="4" class="text-center">
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
@endsection


@push('js')

<script>
  $(document).ready(function(){
    $("#companyTable").DataTable();
  })



  $(document).on('submit', '.deleteCompanyForm', function(e){

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
                  url: "{{url('company')}}/"+id,
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