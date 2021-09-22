@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' => __('Add Assessment')])


@section('style')

    <style>
   

        .assessment-label-card  {
            flex-direction: inherit !important;
        }

        .tab-pane{
            margin-top: -45px;
        }

   
    </style>
    
@endsection


@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
            <div class="card assessment-label-card card-nav-tabs card-plain">
                <div class="card-header card-header-primary">
                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs flex-column" data-tabs="tabs">
                                
                                @if ($assessmentLabels)
                                    @foreach ($assessmentLabels as $assessmentLabel)
                                        <li class="nav-item">
                                            <a class="nav-link @if($assessmentLabel->name == "General") active @endif" href="#{{$assessmentLabel->name}}" data-toggle="tab">{{$assessmentLabel->name}}</a>
                                        </li>
                                    @endforeach
                                @endif
                           
                        
                            </ul>
                        </div>
                    </div>

                </div><div class="card-body ">
                    <div class="tab-content">

                        @if ($assessmentLabels)
                            @foreach ($assessmentLabels as $key=>$assessmentLabel)
                            <div class="tab-pane @if($assessmentLabel->name == "General") active @endif" id="{{$assessmentLabel->name}}">
                                <div class="row">
                                    <div class="col-md-12">
                                      <form method="post" action="{{url('assessment-store')}}" autocomplete="off" class="form-horizontal">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$key}}" >
                                        <input type="hidden" name="parent_id" value="0" >
                                        <input type="hidden" name="assessment_type_id" value="{{$assessmentLabel->assessment_type_id}}">
                                        <input type="hidden" name="assessment_label_id" value="{{$assessmentLabel->id}}">

                                        <div class="card ">
                                          <div class="card-header card-header-primary">
                                            <h4 class="card-title">{{$assessmentType->name}}</h4>
                                            <p class="card-category">{{$assessmentLabel->name}}</p>
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
                                          </div>
                                          <div class="card-footer ml-auto mr-auto">
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        @endif

                    </div>
                </div>
              </div>
            
        </div>
      </div>

    </div>
  </div>
@endsection

