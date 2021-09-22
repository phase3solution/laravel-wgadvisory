@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>$assessmentType->name])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title ">Assessment List of {{$assessmentType->name}}</h4>
                    <p class="card-category">All assessment</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="Add New" href="{{url('add-new-assessment-type', $assessmentType->id)}}"><i class="material-icons">add</i></a>
                  </div>
              </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Logo</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                    @if ($assessments)

                        @foreach ($assessments as $key=>$assessment)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$assessment->name}}</td>
                                <td class="bg-dark text-center"> <img  height="60" width="60" src="{{asset($assessment->image)}}" alt=""> </td>
                                <td>

                                  @if ($assessment->status==0)
                                  <span class="badge badge-danger">Inactive</span>
                                  @elseif($assessment->status==1)
                                  <span class="badge badge-success">Active</span>
                                  @elseif($assessment->status==2)
                                  <span class="badge badge-info">Pending Review</span>
                                  @elseif($assessment->status==3)
                                  <span class="badge badge-danger">Draft</span>
                                  @elseif($assessment->status==4)
                                  <span class="badge badge-secondary">Archived</span>
                                  @elseif($assessment->status==5)
                                  <span class="badge badge-secondary">Published</span>
                                  @endif
                                    
                                </td>
                                <td>
                                    <a class="btn btn-info btn-link btn-sm"  rel="tooltip" title="Add"  href="{{url('edit-assessment', $assessment->id)}}"><i class="material-icons">playlist_add</i></a>
                                    <a class="btn btn-primary btn-link btn-sm"  rel="tooltip" title="Edit" href="{{url('assessment-parent-edit', $assessment->id)}}"> <i class="material-icons">edit</i></a> 
                                    <a class="btn btn-danger btn-link btn-sm"  rel="tooltip" title="Delete"  href="{{route('deleteParent',$assessment->id)}}" ><i class="material-icons">close</i></a>
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