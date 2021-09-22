@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>$assessmentType->name])

@section('content')
  <div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
              <form method="post" action="{{URL::to('assessment-parent-update')}}" autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                
                <input type="hidden" name="parent_id" value="0" >
                <input type="hidden" name="assessment_type_id" value="{{$assessment->assessment_type_id}}">
                <input type="hidden" name="assessment_label_id" value="{{$assessment->assessment_label_id}}">
                <input type="hidden" name="id" value="{{$assessment->id}}">
                <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">{{$assessmentType->name}}</h4>
                    <p class="card-category">{{$assessmentLabel->name}}</p>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" name="name" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$assessment->name}}" required="true" aria-required="true"/>
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$assessment->description}}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Select Company') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <select name="company_id" class="form-control">
                            <option value=""></option>
                            @if (count($companies) > 0)
                              @foreach ($companies as $company)
                                <option value="{{$company->id}}"
                                  @if (isset($assessment->company->id))
                                    @if ($company->id == $assessment->company->company_id )
                                    selected
                                    @endif
                                  @endif
                                   
                                >{{$company->name}}</option>
                              @endforeach
                                
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                            <select required name="status" class="form-control">
                              <option value=""></option>
                              <option value="0" @if ($assessment->status == 0)
                                selected
                            @endif>Inactive</option>
                              <option value="1" @if ($assessment->status == 1)
                                  selected
                              @endif >Active</option>
                              <option value="2" @if ($assessment->status == 2)
                                selected
                            @endif>Pending Review</option>
                              <option value="3" @if ($assessment->status == 3)
                                selected
                            @endif>Draft</option>
                              <option value="4" @if ($assessment->status == 4)
                                selected
                            @endif>Archived</option>
                            <option value="5" @if ($assessment->status == 5)
                              selected
                          @endif>Published</option>
                            </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Logo') }}</label>
                      <div class="col-sm-7">
                        <div class="">
                         <input class="form-control" type="file" name="image">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Register ?') }}</label>
                      <div class="col-sm-7">
                        <div class="">
                         {{-- @if ($assessment->register_id != 0) checked @endif  --}}
                         {{-- @if ($assessment->register_id == 0) checked @endif  --}}
                            <input type="radio" @if ($assessment->register_id == 0) checked @endif name="register_check" value="0" id="register_no">
                            <label for="register_no" >NO</label>
                            <input type="radio" @if ($assessment->register_id != 0) checked @endif  name="register_check" value="1" id="register_yes">
                            <label for="register_yes">Yes</label>
                    
                        
                        </div>
                      </div>
                    </div>

                    <div class="row register-div"  @if ($assessment->register_id == 0) style="display: none"  @endif>
                      <label class="col-sm-2 col-form-label">{{ __('Select Register') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <select class="form-control" name="register_id" id="register_id">
                            <option value="0"></option>
                            @if (count($registers)>0)
                              @foreach ($registers as $register)
                                <option value="{{$register->id}}" @if ($assessment->register_id == $register->id) selected  @endif   >{{$register->name}}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                  </div>
                </div>
              </form>
            </div>
        </div>


    </div>
  </div>
@endsection


@section('script')

<script>
  $(document).ready(function(){


    $('input[name="register_check"]:radio').change(function () {
        var checkedValue  = $("input[name='register_check']:checked").val();

        if(checkedValue == 1){
          $('.register-div').show();
        }else{
          $('.register-div').hide();
        }
    });


  })
</script>
    
@endsection