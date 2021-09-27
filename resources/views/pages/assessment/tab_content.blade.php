
<div class="tab-pane active" id="{{$assessmentLabel->name}}">
    <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('assessment-store')}}" autocomplete="off" class="form-horizontal">
            @csrf
            <input type="hidden" name="assessment_type_id" value="{{$assessmentLabel->assessment_type_id}}">
            <input type="hidden" name="assessment_label_id" value="{{$assessmentLabel->id}}">
            <input type="hidden" name="parent_id" value="{{$parent->id}}">

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{$parent->name}}</h4>
                <p class="card-category">{{$assessmentLabel->name}}</p>
              </div>

              @if ($areas)
                  @foreach ($areas as $area)
                  <div class="card-body ">

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" name="name" id="input-name" disabled type="text" placeholder="{{ __('Name') }}" value="{{$area->name}}" required="true" aria-required="true"/>
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                            <textarea class="form-control" name="description" disabled id="" cols="60" rows="5" placeholder="Description">{{$area->description}}</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  @endforeach
              @endif

              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description"></textarea>
                    </div>
                  </div>
                </div>
              </div>



              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>

</div>
