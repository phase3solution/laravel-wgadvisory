@extends('layouts.app', ['activePage' => 'assessmentType', 'titlePage' => __('Settings')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">

              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title ">Assessment Types</h4>
                    <p class="card-category">All types of assessment</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="Add" href="{{route('assessmentType.create')}}"><i class="material-icons">add</i></a>
                  </div>
              </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                    @if ($assessmentTypes)

                        @foreach ($assessmentTypes as $key=>$asstessmentType)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$asstessmentType->name}}</td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-link btn-sm" rel="tooltip" title="Edit" href="{{route('assessmentType.edit', $asstessmentType->id)}}"><i class="material-icons">edit</i></a>
                                    {{-- <a class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Delete"  href="" ><i class="material-icons">close</i></a> --}}
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