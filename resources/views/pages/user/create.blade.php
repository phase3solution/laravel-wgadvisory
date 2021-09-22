@extends('layouts.app', ['activePage' => 'createUser', 'titlePage' => __('Add Role')])
@php
  $userCheck = \App\Models\UserRole::where('user_id',Auth::id() )->first();
@endphp
@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add User') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <input class="form-control" name="email" id="input-name" type="email" placeholder="{{ __('Email') }}" value="" required="true" aria-required="true"/>

                    </div>
                  </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                          <input class="form-control" name="password" id="input-name" type="password" placeholder="{{ __('*******') }}" value="" required="true" aria-required="true"/>
  
                      </div>
                    </div>
                  </div>

                  
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group">
                          <input class="form-control" name="confirm_password" id="input-name" type="password" placeholder="{{ __('*******') }}" value="" required="true" aria-required="true"/>
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
                                        <option value="{{$role->id}}" @if ($userCheck->role_id != 1 && $role->id ==1)
                                            style="display:none"
                                        @endif  >{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif              
            

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