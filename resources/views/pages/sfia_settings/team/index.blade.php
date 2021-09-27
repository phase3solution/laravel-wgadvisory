@extends('layouts.app', ['activePage' => 'sfiaTeam', 'titlePage' => __('SFIA Settings')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title "> SFIA Team</h4>
                    <p class="card-category">All SFIA Team Information</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info  btn-sm" href="{{route('sfiaTeam.create')}}" rel="tooltip" title="Add New" ><i class="material-icons">add</i></a>
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

                    @if ($sfiaTeams)

                        @foreach ($sfiaTeams as $key=>$sfiaTeam)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$sfiaTeam->name}}</td>
                                <td>
                                    @if ($sfiaTeam->company)
                                        {{$sfiaTeam->company->name}}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-link btn-sm" rel="tooltip" title="Edit" href="{{route('sfiaTeam.edit', $sfiaTeam->id)}}"><i class="material-icons">edit</i></a>

                                    <form action="{{route('sfiaTeam.destroy', $sfiaTeam->id)}}" method="post">
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