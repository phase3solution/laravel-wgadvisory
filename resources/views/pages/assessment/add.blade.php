@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' => __('Assessments')])


@section('style')

    <style>

        .assessment-label-card  {
            flex-direction: inherit !important;
        }

        .tab-pane{
            margin-top: -45px;
        }

   
    </style>
    
@endsection


@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
            <div class="row form-group assessmentRow">
                <label for=""> Select Assessment Name </label>
                <input type="hidden" name="parent_id" value="0">
                <select class="assessnemtName" name="name">
                    <option value=""></option>
                    @if ($assessments)
                        @foreach ($assessments as $assessment)
                            <option value="{{$assessment->id}}">{{$assessment->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div> 
        </div>
      </div>

    </div>
  </div>
@endsection

@push('js')

<script>

    $(document).ready(function(){
        
        $('.assessnemtName').on('change', function(e){
            e.preventDefault();
            // alert('Working');
            var assessmentId = $(this).val();
            $.ajax({
              type:"POST",
              url:"{{ route('findAssessment') }}",
              data: {
                "_token": "{{ csrf_token() }}",
                "assessmentId" : assessmentId,
              },
              success:function(response){
                $('.assessmentRow').append(response);

              },
              error:function(err){

              }
            })
        })

    })

</script>


@endpush

