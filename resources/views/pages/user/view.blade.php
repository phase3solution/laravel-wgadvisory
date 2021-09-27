@extends('layouts.app', ['activePage' => 'user', 'titlePage' => __('User Management')])
@php
  $userCheck = \App\Models\UserRole::where('user_id',Auth::id() )->first();
@endphp
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header card-header-primary">
              <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title ">Users</h4>
                    <p class="card-category">All users</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="Add New" href="{{route('user.create')}}"><i class="material-icons">add</i></a>
                  </div>
              </div>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="userList">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Company</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                    @if ($users)

                        @foreach ($users as $key=>$user)
                            <tr>
                                <td>{{++$key}}</td>
                                <td> 

                                  @if ($user->image)
                                    <img height="80" width="80" src="{{asset($user->image)}}" alt="Image"> 
                                  @else 
                                    <img height="80" width="80" src="{{asset('no-image-found.jpeg')}}" alt="NoImage"> 
                                  @endif

                                    
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td> 
                                  @if (isset($user->userRole->role->name))
                                  {{$user->userRole->role->name}}
                                  @else 
                                  --
                                  @endif     
                                </td>
                                <td> 
                                  @if (isset($user->userCompany->company->name))
                                  {{$user->userCompany->company->name}}
                                  @else 
                                  --
                                  @endif 
                                  
                                </td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>
                                 
                                    <a class="btn btn-primary btn-link btn-sm" rel="tooltip" @if ($userCheck->role_id != 1 && $user->userRole->role->id ==1 )
                                      style="display: none"
                                    @endif  title="Edit" href="{{route('user.edit', $user->id)}}"><i class="material-icons">edit</i></a>

                                    {{-- <a class="btn btn-danger btn-link btn-sm" href="" rel="tooltip" title="Delete" ><i class="material-icons">close</i></a> --}}
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

        $('#userList').DataTable();


      })
    </script>
@endpush