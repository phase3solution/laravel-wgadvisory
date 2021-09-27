@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>'Assessments'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title ">Assessment List of SFIA</h4>
                    <p class="card-category">All SFIA Information</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="Add New" href="{{route('sfia.create')}}"><i class="material-icons">add</i></a>
                  </div>
              </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Company</th>
                  <th>Name</th>
                  <th>Logo</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                    @if ($sfias)

                        @foreach ($sfias as $key=>$sfia)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$sfia->company->name}}</td>
                                <td>{{$sfia->name}}</td>
                                <td class="bg-dark text-center"> <img  height="60" width="60" src="{{asset($sfia->image)}}" alt=""> </td>
                                
                                <td>

                                  @if ($sfia->status==0)
                                  <span class="badge badge-danger">Inactive</span>
                                  @elseif($sfia->status==1)
                                  <span class="badge badge-success">Active</span>
                                  @elseif($sfia->status==2)
                                  <span class="badge badge-info">Pending Review</span>
                                  @elseif($sfia->status==3)
                                  <span class="badge badge-danger">Draft</span>
                                  @elseif($sfia->status==4)
                                  <span class="badge badge-secondary">Archived</span>
                                  @elseif($sfia->status==5)
                                  <span class="badge badge-secondary">Published</span>
                                  @endif
                                    
                                </td>
                                <td>
                                    <a class="btn btn-info btn-link btn-sm"  rel="tooltip" title="Add"  href="{{url('edit-sfia', $sfia->id)}}"><i class="material-icons">playlist_add</i></a>
                                    <a class="btn btn-primary btn-link btn-sm"  rel="tooltip" title="Edit" href="{{route('sfia.edit', $sfia->id)}}"> <i class="material-icons">edit</i></a> 
                                    <form onSubmit="return confirm('Are you sure?') " action="{{route('sfia.destroy', $sfia->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-link btn-sm"  rel="tooltip" title="Delete"  type="submit" ><i class="material-icons">close</i></button>
                                    </form>
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