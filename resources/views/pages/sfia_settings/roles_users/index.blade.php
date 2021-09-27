@extends('layouts.app', ['activePage' => 'sfiaRoleUser', 'titlePage' => __('SFIA Settings')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title "> SFIA  Role User</h4>
                    <p class="card-category">All Sfia Role User Information</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info  btn-sm" href="{{route('sfiaRoleUser.create')}}" rel="tooltip" title="Add New" ><i class="material-icons">add</i></a>
                  </div>

              </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Team</th>
                  <th>Role</th>
                  <th>User</th>
                  <th>Company</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                    @if ($sfiaRoleUsers)

                        @foreach ($sfiaRoleUsers as $key=>$sfiaRoleUser)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>
                                    @if ($sfiaRoleUser->sfiaTeam)
                                        {{$sfiaRoleUser->sfiaTeam->name}}
                                    @endif 
                                </td>
                                <td>
                                    @if ($sfiaRoleUser->sfiaRole)
                                        {{$sfiaRoleUser->sfiaRole->name}}
                                    @endif 
                                </td>
                                <td>
                                    @if ($sfiaRoleUser->sfiaUser)
                                        {{$sfiaRoleUser->sfiaUser->name}}
                                    @endif 
                                </td>
                                <td>
                                    @if ($sfiaRoleUser->company)
                                        {{$sfiaRoleUser->company->name}}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-link btn-sm" rel="tooltip" title="Edit" href="{{route('sfiaRoleUser.edit', $sfiaRoleUser->id)}}"><i class="material-icons">edit</i></a>

                                    <form action="{{route('sfiaRoleUser.destroy', $sfiaRoleUser->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete" type="submit"><i class="material-icons">close</i></button>
                                    </form>
                                    
                                    {{-- <a class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete" href="" ><i class="material-icons">close</i></a> --}}
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