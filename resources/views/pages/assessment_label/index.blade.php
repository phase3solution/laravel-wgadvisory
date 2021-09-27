{{-- assessmentLabels --}}

@extends('layouts.app', ['activePage' => 'assessmentLabel', 'titlePage' => __('Settings')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title ">Assessment Labels</h4>
                    <p class="card-category">All types of assessment labels</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="Add New" href="{{route('assessmentLabel.create')}}"><i class="material-icons">add</i></a>
                  </div>

              </div>

          </div>
          <div class="card-body">
            <div class="">
              <table class="table" id="labelTable">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Types</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                    @if ($assessmentLabels)

                        @foreach ($assessmentLabels as $key=>$assessmentLabel)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$assessmentLabel->name}}</td>
                                <td>{{ $assessmentLabel->assessmentType->name }}</td>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-link btn-sm" rel="tooltip" title="Edit" href="{{route('assessmentLabel.edit', $assessmentLabel->id)}}"><i class="material-icons">edit</i></a>
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

        $('#labelTable').DataTable();


      })
    </script>
@endpush