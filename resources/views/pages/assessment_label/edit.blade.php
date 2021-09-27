@extends('layouts.app', ['activePage' => 'assessmentLabel', 'titlePage' => __('Settings')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('assessmentLabel.update', $assessmentLabel->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Assessment Label') }}</h4>
                <p class="card-category">{{ __('Assessment Label information') }}</p>
              </div>
              <div class="card-body ">

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Assessment Type') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                        @if ($assessmentTypes)
                        <select class="form-control select2" name="assessment_type_id">
                            <option value="">Select Assessment Type</option>
                            @foreach($assessmentTypes as $assessmentType)
                                <option value="{{$assessmentType->id}}" @if ($assessmentType->id == $assessmentLabel->assessment_type_id)
                                    selected
                                @endif >{{$assessmentType->name}}</option>
                            @endforeach
                        </select>
                        @endif
                      </div>
                    </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$assessmentLabel->name}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$assessmentLabel->description}}</textarea>
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
  $(document).ready(function() {
    $('.select2').select2();
});
</script>
    
@endpush