@extends('layouts.app', ['activePage' => 'assign-user', 'titlePage' => __('Company')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title ">Company - User</h4>
                    <p class="card-category">All assigned user</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-info btn-sm" rel="tooltip" title="Add New" data-toggle="modal" data-target="#createModal">
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
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Status</th>
                  <th class="table_action" >Action</th>
                </thead>
                <tbody>

                    @if (!empty($assign_users))

                        @foreach ($assign_users as $key=>$assign_user)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$assign_user->company->name}}</td>
                                <td>{{$assign_user->user->name}}</td>
                                <td>{{$assign_user->user->email}}</td>
                                <td>

                                  @if ($assign_user->status ==1)
                                    <span class="badge badge-success">Active</span>
                                  @else 
                                    <span class="badge badge-danger">Inactive</span>
                                  @endif
                                    
                                </td>
                                <td>

                                    <button type="button" class="btn btn-primary editBtn  btn-sm" data-toggle="modal" rel="tooltip" title="Edit" data-user="{{$assign_user->user->id}}" data-company="{{$assign_user->company->id}}" data-status="{{$assign_user->status}}" data-target="#createModal">
                                        <i class="material-icons">edit</i>
                                    </button>


                                    {{-- <a class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete" onclick="return confirm('Are you sure?')" href="{{route('company-user-delete', $assign_user->id)}}" ><i class="material-icons">close</i></a> --}}
                                    
                                    <form style="display: inline-block" class="deleteAssignUserForm" method="post">
                                      @csrf

                                      <input type="hidden" class="deleteId" name="id" value="{{$assign_user->id}}">
                                      <button class="btn btn-danger  btn-sm" rel="tooltip" title="Delete" type="submit"><i class="material-icons">close</i></button>

                                    </form>
                                
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
          <h5 class="modal-title" id="createModalLabel">Assign User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- action="{{route('company-user-insert')}}" --}}
        <form id="companyUserInsertForm"  method="post">
            @csrf

            <div class="modal-body">
                @if ($companies)
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('Company') }} <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select name="company_id" class="form-control select2" id="company_id" required>
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @endif
                
                @if ($users)
                <div class="row">
                    <label class="col-md-3 col-form-label">{{ __('User') }} <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select name="user_id" class="form-control select2" required id="user_id">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}} - {{$user->email}} </option>
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
                <button type="submit" class="btn btn-primary submitBtn">Save <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span> </button>
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

                var user_id = $(this).data('user');
                var company_id = $(this).data('company');
                var status_id = $(this).data('status');

                console.log(user_id, company_id);
                $('#company_id').val(company_id);
                $('#user_id').val(user_id);
                $("input[name=status][value='"+status_id+"']").prop("checked",true);
                $('.submitBtn').html('Save changes <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span>');

                $('.select2').select2().trigger('change');


            })

            $("#companyUserInsertForm").on('submit', function(e){
              e.preventDefault();
              var formData = $(this).serialize();
              $.ajax({
                type: "POST",
                url: "{{route('company-user-insert')}}",
                data:formData,
                beforeSend: function() {
									$("#companyUserInsertForm").find(".ph3-loading-button").show();
						    },
                success:function(response){
                  $("#companyUserInsertForm").find(".ph3-loading-button").hide();
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
                  $("#companyUserInsertForm").find(".ph3-loading-button").hide();
                  console.log(error);
                  Toast.fire({
                      type: 'error',
                      title: 'Something went wrong. Please try again!'
                  })
                }
              })

            })

            $('.deleteAssignUserForm').on('submit', function(e){
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
                    url: "{{url('/company-delete-user')}}/"+id,
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