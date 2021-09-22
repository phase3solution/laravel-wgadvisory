@extends('layouts.app', ['activePage' => 'user', 'titlePage' => __('User Edit')])
@php
  $userCheck = \App\Models\UserRole::where('user_id',Auth::id() )->first();
@endphp
@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('User Edit') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$user->name}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <input class="form-control" disabled name="email" id="input-email" type="email" placeholder="{{ __('Name') }}" value="{{$user->email}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                @if ($roles)
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select name="role_id" class="form-control" id="">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" @if ( isset($user->userRole->role_id) && $user->userRole->role_id == $role->id)
                                            selected
                                        @endif     @if ($userCheck->role_id != 1 && $role->id ==1)
                                        style="display:none"
                                    @endif >{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                
               
                
                @if ($companies)
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select name="company_id" class="form-control" id="">
                                    <option value="">Select Company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{$company->id}}"  @if (isset($user->userCompany->company_id) &&  $user->userCompany->company_id == $company->id)
                                          selected
                                      @endif>{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                
                

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                  <div class="col-sm-7">
                    <div class="">
                      <input class="form-control" name="image" type="file"/>
                    </div>
                  </div>
                </div>
        


              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>




      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('update.password') }}" class="form-horizontal">
            @csrf

            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">


                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="confirm_password" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection