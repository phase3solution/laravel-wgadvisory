@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>'Assessments'])

@section('content')
  <div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
              <form method="post" id="biaUpdateForm" autocomplete="off" class="form-horizontal " enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="bia_id" class="update-id" value="{{$bia->id}}" >

                <div class="card ">
                  <div class="card-header card-header-primary">

                    <div class="row align-items-center">
                      <div class="col-md-6">
                        <h4 class="card-title">Edit BIA</h4>
                        <p class="card-category">General</p>
                      </div>
                      <div class="col-md-6 text-right">
                        <a class="btn btn-info btn-sm" rel="tooltip" title="View List" href="{{route('bia.index')}}"><i class="fa fa-list"></i></a>
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

                      <div class="col-sm-9">

                        <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Name') }} <span class="text-danger">*</span> </label>
                          <div class="col-sm-10">
                            <div class="form-group">
                              <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$bia->name}}" required="true" aria-required="true"/>
                            </div>
                          </div>
                        </div>
        
                        <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$bia->description}}</textarea>
                            </div>
                          </div>
                        </div>
        
      
        
        
                        @if ($companies)
                          <div class="row">
                              <label class="col-sm-2 col-form-label">{{ __('Company') }} <span class="text-danger">*</span></label>
                              <div class="col-sm-10">
                                  <div class="form-group">
                                      <select name="company_id" class="form-control select2" >
                                          <option value="">Select Company</option>
                                          @foreach ($companies as $company)
                                              <option value="{{$company->id}}" @if ($bia->company_id == $company->id) selected  @endif  >{{$company->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                          </div>
                        @endif

                        <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                          <div class="col-sm-10">
                            <div class="form-group">
                                <select required name="status" class="form-control select2">
                                  <option value=""></option>
                                  <option value="0" @if ($bia->status == 0)
                                    selected
                                @endif>Inactive</option>
                                  <option value="1" @if ($bia->status == 1)
                                      selected
                                  @endif >Active</option>
                                  <option value="2" @if ($bia->status == 2)
                                    selected
                                @endif>Pending Review</option>
                                  <option value="3" @if ($bia->status == 3)
                                    selected
                                @endif>Draft</option>
                                  <option value="4" @if ($bia->status == 4)
                                    selected
                                @endif>Archived</option>
                                <option value="5" @if ($bia->status == 5)
                                  selected
                              @endif>Published</option>
                                </select>
                            </div>
                          </div>
                        </div>
        
        
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Assessment Logo') }}</label>
                            <div class="col-sm-10">
                            <input type="file" class="input-image" name="image">
                            </div>
                        </div>

                      </div>

                      <div class="col-sm-3">
                        <label class="col-form-label">Preview Image</label> <br>

                        @if ($bia->image)
                          <img src="{{asset($bia->image)}}" class="preview-image card" alt="" class="card" style="max-width: 250px; max-height:250px" srcset="">

                        @else
                          <img src="{{asset('no-image-found.jpeg')}}" class="preview-image card" alt="" class="card" style="max-width: 250px; max-height:250px" srcset="">

                        @endif

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
      $('.select2').select2();

      $("#biaUpdateForm").on('submit', function(e){
        e.preventDefault();

        var id = $(this).find('.update-id').val();


        $.ajax({
            url: "{{url('bia')}}/"+id,
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
