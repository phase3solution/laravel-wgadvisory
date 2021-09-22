@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>'SFIA'])

@section('content')
  <div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
              <form method="post" action="{{route('sfia.store')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                @csrf

                <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Sfia</h4>
                    <p class="card-category">General</p>
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
                      <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                        <div class="col-sm-7">
                         <input type="file" name="image">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Select Company') }}</label>
                        <div class="col-sm-7">
                          <select name="company_id" required class="form-control">
                              <option value="">--</option>
                              @if (count($companies)> 0)

                                @foreach ($companies as $company)

                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                    
                                @endforeach
                                  
                              @endif
                          </select>
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