@extends('layouts.app', ['activePage' => 'sfiaUser', 'titlePage' => __('SFIA Settings')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title "> SFIA User</h4>
                    <p class="card-category">All SFIA User Information</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info  btn-sm" href="{{route('sfiaUser.create')}}" rel="tooltip" title="Add New" ><i class="material-icons">add</i></a>
                  </div>

              </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                    @if ($sfiaUsers)

                        @foreach ($sfiaUsers as $key=>$sfiaUser)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$sfiaUser->name}}</td>
                                <td>
                                    @if ($sfiaUser->company)
                                        {{$sfiaUser->company->name}}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-link btn-sm" rel="tooltip" title="Edit" href="{{route('sfiaUser.edit', $sfiaUser->id)}}"><i class="material-icons">edit</i></a>

                                    <form action="{{route('sfiaUser.destroy', $sfiaUser->id)}}" method="post">
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