@extends('layouts.app', ['activePage' => 'assign-user', 'titlePage' => __('Assign User List')])

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
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Status</th>
                  <th>Action</th>
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
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>

                                    <button type="button" class="btn btn-primary editBtn btn-link btn-sm" data-toggle="modal" rel="tooltip" title="Edit" data-user="{{$assign_user->user->id}}" data-company="{{$assign_user->company->id}}" data-target="#createModal">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <a class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete" onclick="return confirm('Are you sure?')" href="{{route('company-user-delete', $assign_user->id)}}" ><i class="material-icons">close</i></a>
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
          <h5 class="modal-title" id="createModalLabel">Assign New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{route('company-user-insert')}}" method="post">
            @csrf
            <div class="modal-body">
                @if ($companies)
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Company') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select name="company_id" class="form-control" id="company_id">
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
                    <label class="col-sm-3 col-form-label">{{ __('User') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <select name="user_id" class="form-control" id="user_id">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}} - {{$user->email}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @endif  
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

            $('.editBtn').on('click', function(){

                var user_id = $(this).data('user');
                var company_id = $(this).data('company');

                console.log(user_id, company_id);
                $('#company_id').val(company_id);
                $('#user_id').val(user_id);
                $('.submitBtn').html("Save changes");

            })

        })
    </script>
@endpush