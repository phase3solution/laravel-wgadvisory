@extends('layouts.app', ['activePage' => 'sfiaRoleUser', 'titlePage' => __('SFIA Settings')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('sfiaRoleUser.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('SFIA  Role User') }}</h4>
                <p class="card-category">{{ __('SFIA  Role User Information') }}</p>
              </div>


              <div class="card-body ">

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Select Company') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                          <select name="company_id" class="form-control select2">
                              @if ($companies)
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                              @endif
                          </select>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Select Team') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                          <select name="sfia_team_id" class="form-control select2">
                              @if ($sfiaTeams)
                                @foreach ($sfiaTeams as $sfiaTeam)
                                    <option value="{{$sfiaTeam->id}}">{{$sfiaTeam->name}}</option>
                                @endforeach
                              @endif
                          </select>
                      </div>
                    </div>
                </div>

           

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Select Role') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                          <select name="sfia_role_id" class="form-control select2">
                              @if ($sfiaRoles)
                                @foreach ($sfiaRoles as $sfiaRole)
                                    <option value="{{$sfiaRole->id}}">{{$sfiaRole->name}}</option>
                                @endforeach
                              @endif
                          </select>
                      </div>
                    </div>
                </div>


                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Select User') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                          <select name="sfia_user_id" class="form-control select2">
                              @if ($sfiaUsers)
                                @foreach ($sfiaUsers as $sfiaUser)
                                    <option value="{{$sfiaUser->id}}">{{$sfiaUser->name}}</option>
                                @endforeach
                              @endif
                          </select>
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
  </div>
@endsection


@push('js')

  <script>
    $(document).ready(function() {
      $('.select2').select2();
  });
  </script>
    
@endpush