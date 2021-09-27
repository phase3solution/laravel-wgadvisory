@extends('layouts.app', ['activePage' => 'sfiaUser', 'titlePage' => __('SFIA Settings')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('sfiaUser.update', $sfiaUser->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('SFIA Team') }}</h4>
                <p class="card-category">{{ __('SFIA Team Information') }}</p>
              </div>


              <div class="card-body ">

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Select Company') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                          <select name="company_id" class="form-control select2">
                              @if ($companies)
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}" @if ($company->id == $sfiaUser->company_id ) selected @endif >{{$company->name}}</option>
                                @endforeach
                              @endif
                          </select>
                      </div>
                    </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$sfiaUser->name}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$sfiaUser->description}}</textarea>
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