<div class="card-header card-header-primary">
    <h4 class="card-title"> {{ $assessment->assessmentType->name }}<span>:</span> {{$assessment->name}} </h4>
    <p class="card-category assessment-label ">{{ $assessment->assessmentLabel->name }} test</p>
</div>



    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                
         
                @if (count($assessments) > 0)

                <div id="accordion" role="tablist">
                    <div class="card card-collapse">


                    @foreach ($assessments as $key=>$section)

                    <div class="card-header" style="margin-bottom: 15px" role="tab" id="heading{{$key}}">
                        <h5 class="mb-0">
                          <a data-toggle="collapse" href="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                            Department: {{$section->name}}
                            <i class="material-icons">keyboard_arrow_down</i>
                          </a>
                        </h5>
                    </div>


                    <div id="collapse{{$key}}" class="collapse @if($key==0)show @endif " role="tabpanel" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                        <div class="card-body">
                            <form method="post" onsubmit="event.preventDefault(); updateAssessmentByAjax({{$key}})"  autocomplete="off" class="form-horizontal updateAssessmentByAjax{{$key}}">
                                @csrf

                                <input type="hidden" name="parent_id" value="{{$section->id}}" >
                                <input type="hidden" name="assessment_type_id" value="{{$assessment->assessment_type_id}}">
                                <input type="hidden" name="assessment_label_id" value="{{$label_id}}">
                                <input type="hidden" name="base_id" value="{{$assessment->id}}">
                                <div class="row collapseBody{{$key}}">
                                    <div class="col-md-12 rowBody{{$key}}">
                                        {{-- <h6>Section: {{$section->name}}</h6> --}}

                                        @if (count($section->children) > 0 )

                                            @foreach ($section->children as $table)
                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                    <div class="col-sm-7">
                                                        <div class="form-group">
                                                            <input class="form-control" required name="name[{{$table->id}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$table->name}}" required="true" aria-required="true"/>
                                                        </div>
                                                    </div>
                                                    <div class="sol-sm-3">
                                                        <button type="button" class="btn btn-danger" onclick="deleteThisItem({{$table->id}})">Remove</button>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                    <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="description[{{$table->id}}]" id="" cols="60" rows="5" placeholder="Description">{{$table->description}}</textarea>
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
                                    <div class="card-footer">
                                        <div class="row ">
                                            <div class="col-md-12 ">
                                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                                <button type="button"  onclick="addNewBtn({{$key}})" class="btn btn-info">{{ __('Add More') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    @endforeach


                    </div>
                </div>

                @else 
                    <div class="text-center card-title">
                        <h6 class="text-danger text-center">Plase Insert First Previous Section </h6>
                    </div>
                @endif

                
            
            </div>
        </div>
    </div>



