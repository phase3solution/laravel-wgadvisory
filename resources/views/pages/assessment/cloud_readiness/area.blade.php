<div class="card-header card-header-primary">
    <h4 class="card-title"> {{ $assessment->assessmentType->name }}<span>:</span> {{$assessment->name}} </h4>
    <p class="card-category assessment-label ">{{ $assessment->assessmentLabel->name }} - test</p>
</div>

{{-- action="{{URL::to('assessment-update')}}" --}}
<form method="post" onsubmit="event.preventDefault(); updateAssessmentByAjax(0)"  autocomplete="off" class="form-horizontal updateAssessmentByAjax0">
    @csrf
    <div class="card-body">
        <div class="row collapseBody0">
            <div class="col-md-12 rowBody0">
        
                
                <input type="hidden" name="parent_id" value="{{$assessment->id}}" >
                <input type="hidden" name="assessment_type_id" value="{{$assessment->assessment_type_id}}">
                <input type="hidden" name="assessment_label_id" value="{{$label_id}}">
                <input type="hidden" name="base_id" value="{{$assessment->id}}">
              
                @if (count($assessments) > 0)
                    @foreach ($assessments as $key=>$area)
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" required name="name[{{$area->id}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$area->name}}" required="true" aria-required="true"/>
                            </div>
                        </div>
                        <div class="sol-sm-3">
                            <button type="button" class="btn btn-danger" onclick="deleteThisItem({{$area->id}})">Remove</button>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-7">
                        <div class="form-group">
                            <textarea class="form-control" name="description[{{$area->id}}]" id="" cols="60" rows="5" placeholder="Description">{{$area->description}}</textarea>
                        </div>
                        </div>
                    </div>
                    @endforeach
                @else 
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="nameInput[]" id="input-name"  type="text" placeholder="{{ __('Name') }}" required="true" aria-required="true"/>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-7">
                        <div class="form-group">
                            <textarea class="form-control" name="descriptionInput[]" id="" cols="60" rows="5" placeholder="Description"></textarea>
                        </div>
                        </div>
                    </div>

                    
                @endif

                
            
            </div>
            <div class="card-footer">
                <div class="row ">
                    <div class="col-md-12 ">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        <button type="button" onclick="addNewBtn(0)" class="btn btn-info">{{ __('Add More') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</form>