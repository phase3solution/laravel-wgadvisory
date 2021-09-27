@extends('layouts.app', ['activePage' => 'assessmentLabel', 'titlePage' => __('Settings')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('assessmentLabel.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create Assessment Label') }}</h4>
                <p class="card-category">{{ __('Assessment Label information') }}</p>
              </div>
              <div class="card-body ">

                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Assessment Type') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                        @if ($assessmentTypes)
                        <select class="form-control select2" name="assessment_type_id">
                            <option value="">Select Assessment Type</option>
                            @foreach($assessmentTypes as $assessmentType)
                                <option value="{{$assessmentType->id}}" >{{$assessmentType->name}}</option>
                            @endforeach
                        </select>
                        @endif
                      </div>
                    </div>
                </div>

                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>

                </div>




              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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