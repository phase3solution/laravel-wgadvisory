@extends('layouts.app', ['activePage' => 'assessmentType', 'titlePage' => __('Settings')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          {{-- action="{{ route('assessmentType.update', $assessmentType->id) }}" --}}
          <form method="post" id="assessmentTypeUpdateForm"  autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            <input type="hidden" class="update-id" name="id" value="{{$assessmentType->id}}">

            <div class="card ">
              <div class="card-header card-header-primary">
                

                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title">{{ __('Edit Assessment Type') }}</h4>
                    <p class="card-category">{{ __('Assessment Type information') }}</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="View List" href="{{route('assessmentType.index')}}"><i class="fa fa-list"></i></a>
                  </div>

                </div>



              </div>
              <div class="card-body ">

                <div style="display: none" class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span class="alert-message"></span>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$assessmentType->name}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$assessmentType->description}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <input type="radio" name="status" value="1" @if ($assessmentType->status == 1) checked @endif   id="active-status" required>
                        <label for="active-status">Active</label>

                        <input type="radio" name="status" value="0" @if ($assessmentType->status == 0) checked @endif id="inactive-status">
                        <label for="inactive-status">Inactive</label>
                      </div>
                    </div>
                </div>


              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('js')

<script>
  $(document).ready(function(){

    $("#assessmentTypeUpdateForm").on('submit', function(e){
        e.preventDefault();

        var id = $(this).find('.update-id').val();


        $.ajax({
            url: "{{url('assessmentType')}}/"+id,
            data:new FormData(this),
            processData: false,
            contentType: false,
            type: 'POST',
            success:function(response){
                console.log(response);
                Toast.fire({
                    type: 'success',
                    title: response.message
                })

                $('.alert-success').show();
                $('.alert-message').html(response.message);
           

            },
            error:function(error){
                console.log(error);
            
                Toast.fire({
                    type: 'error',
                    title: 'Server error!'
                })

                $('.alert-success').hide();
             
            }
        })
          
    })



  })
</script>
    
@endpush