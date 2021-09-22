<div class="card-header card-header-primary">
    <h4 class="card-title"> {{ $assessment->assessmentType->name }}<span>:</span> {{$assessment->name}} </h4>
    <p class="card-category assessment-label ">{{ $assessment->assessmentLabel->name }}</p>
</div>


<form method="post" action="{{URL::to('assessment-parent-update')}}" autocomplete="off" class="form-horizontal">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
        
                
                <input type="hidden" name="parent_id" value="0" >
                <input type="hidden" name="assessment_type_id" value="{{$assessment->assessment_type_id}}">
                <input type="hidden" name="assessment_label_id" value="{{$assessment->assessment_label_id}}">
                <input type="hidden" name="id" value="{{$assessment->id}}">

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
                
            
            </div>
        </div>
    </div>

    <div class="card-footer  ">
        <div class="row ">
            <div class="col-md-12 ">
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
            </div>
        </div>
    </div>

</form>