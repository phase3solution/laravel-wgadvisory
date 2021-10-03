<div class="card-header card-header-primary">
    <h4 class="card-title"> {{ $assessment->assessmentType->name }}<span>:</span> {{$assessment->name}} </h4>
    <p class="card-category assessment-label ">{{ $assessment->assessmentLabel->name }}</p>
</div>



    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
        
                
                
              
                @if (count($assessments) > 0)
                    @foreach ($assessments as $key=>$area)
                    {{-- action="{{URL::to('assessment-update')}}" --}}
                        <form method="post"  onsubmit="event.preventDefault(); updateAssessmentByAjax({{$key}})" autocomplete="off" class="form-horizontal updateAssessmentByAjax{{$key}}">
                            @csrf

                            <input type="hidden" name="parent_id" value="{{$area->id}}" >
                            <input type="hidden" name="assessment_type_id" value="{{$assessment->assessment_type_id}}">
                            <input type="hidden" name="assessment_label_id" value="3">
                            <input type="hidden" name="base_id" value="{{$assessment->id}}">

                            <div class="section_area_wrap">
                                <div class="row collapseBody{{$key}}">
                                    <div class="col-md-12 rowBody{{$key}}">
                                        <h6 class="title">AREA: {{$area->name}}</h6>

                                        @if (count($area->children) > 0 )

                                            @foreach ($area->children as $section)
                                            <div class="assessment_wrap_item">
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <input class="form-control" required name="name[{{$section->id}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$section->name}}" required="true" aria-required="true"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                    <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="description[{{$section->id}}]" id="" cols="60" rows="5" placeholder="Description">{{$section->description}}</textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">&nbsp;</div>
                                                    <div class="col-sm-10">
                                                        <div class="text-right">
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteThisItem({{$section->id}})">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        @else     
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <input class="form-control" required name="nameInput[]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
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
                                    <div class="card-footer  ">
                                        <div class="row ">
                                            <div class="col-md-12 ">
                                                <button type="button" onclick="addNewBtn({{$key}})" class="btn btn-warning">{{ __('Add More') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    
                    @endforeach
                @else 
                    <div class="text-center card-title">
                        <h6 class="text-danger text-center">Plase Insert First Area </h6>
                    </div>
                @endif

                
            
            </div>
        </div>
    </div>



