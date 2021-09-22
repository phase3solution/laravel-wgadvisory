@extends('layouts.app', ['activePage' => 'sfiaTeamRole', 'titlePage' => __('SFIA Team Role')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('sfiaTeamRole.store') }}" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">

              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('SFIA Team Role') }}</h4>
                <p class="card-category">{{ __('SFIA Team Role Information') }}</p>
              </div>


              <div class="card-body ">

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Select Company') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                          <select name="company_id" class="form-control">
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
                          <select name="sfia_team_id" class="form-control">
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
                          <select name="sfia_role_id" class="form-control">
                              @if ($sfiaRoles)
                                @foreach ($sfiaRoles as $sfiaRole)
                                    <option value="{{$sfiaRole->id}}">{{$sfiaRole->name}}</option>
                                @endforeach
                              @endif
                          </select>
                      </div>
                    </div>
                </div>


              </div>


              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>

              
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection