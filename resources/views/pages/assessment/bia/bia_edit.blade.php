@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>'BIA'])


@section('style')

    <style>
        .assessment-label-card {
            flex-direction: inherit !important;
        }
        .tab-pane {
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


                                        <li class="nav-item">
                                            <a  class="nav-link  active " href="#general" data-toggle="tab">General</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a  class="nav-link" href="#department" data-toggle="tab">Department</a>
                                        </li>

                                        <li class="nav-item">
                                            <a  class="nav-link" href="#service" data-toggle="tab">Services</a>
                                        </li>

                                        <li class="nav-item">
                                            <a  class="nav-link text-center" href=""><i class="fa fa-refresh"></i></a>
                                        </li>
                                      

                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="card-body ">
                            <div class="tab-content">

                                <div class="tab-pane active" id="general">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card dynamic-card">

                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title"> BIA<span>:</span> {{$bia->name}} </h4>
                                                    <p class="card-category assessment-label ">General</p>
                                                </div>


                                                <form method="post"  autocomplete="off" class="form-horizontal biaGeneralForm">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="bia_id" class="bia_id" value="{{$bia->id}}">
                                                    <input type="hidden" name="company_id" value="{{$bia->company_id}}">

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                        
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                    <div class="col-sm-7">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="name" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$bia->name}}" required="true" aria-required="true"/>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                    <div class="col-sm-7">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$bia->description}}</textarea>
                                                                    </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="file" name="image">
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


                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="tab-pane" id="department">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card dynamic-card">

                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title"> BIA<span>:</span> {{$bia->name}} </h4>
                                                    <p class="card-category assessment-label ">Department</p>
                                                </div>


                                                <form method="post" onsubmit="event.preventDefault(); updateBiaDepartment()" autocomplete="off" class="form-horizontal biaDepartmentForm">
                                                    @csrf
                                                    <input type="hidden" name="bia_id" class="bia_id" value="{{$bia->id}}" >
                                                    <input type="hidden" name="company_id" value="{{$bia->company_id}}">
                                                    
                                                    
                                                    <div class="card-body" id="bia-department">
                                                        
                                                        @if (count($bia->biaDepartment)>0)

                                                        @foreach ($bia->biaDepartment as $in=>$biaDepartment)
                                                            <div class="department-group bia-department-old-{{$biaDepartment->id}}">

                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
                                                                    <label class="col-sm-2 col-form-label">Department - {{++$in}}</label>
    
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <input class="form-control" required name="nameU[{{$biaDepartment->id}}]"   type="text" placeholder="{{ __('Name') }}" value="{{$biaDepartment->name}}" required="true" aria-required="true"/>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control" name="descriptionU[{{$biaDepartment->id}}]" id="" cols="60" rows="5" placeholder="Description">{{$biaDepartment->description}}</textarea>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                </div>
                                            
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('GQ:Num Row for SP') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="gq_row_spU[{{$biaDepartment->id}}]" value="{{$biaDepartment->gq_row_sp}}">
                                                                        </div>
                                                                    </div>

                                                                    <label class="col-sm-2 col-form-label">{{ __('GQ: Num Row for BL') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="gq_row_blU[{{$biaDepartment->id}}]" value="{{$biaDepartment->gq_row_bl}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 6 (Vital Records)') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="se_row_vital_recordU[{{$biaDepartment->id}}]" value="{{$biaDepartment->se_row_vital_record}}">
                                                                        </div>
                                                                    </div>

                                                                    <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 6 (Technology Required)
                                                                        ') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="se_row_technology_requiredU[{{$biaDepartment->id}}]" value="{{$biaDepartment->se_row_technology_required}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 7 (MODES OF NITIFICATION AND COMMUNICATION)') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="se_row_notification_n_communicationU[{{$biaDepartment->id}}]" value="{{$biaDepartment->se_row_notification_n_communication}}">
                                                                        </div>
                                                                    </div>

                                                                    <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 7 (DEPARTMENT CONTACT LIST)') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="se_row_department_contact_listU[{{$biaDepartment->id}}]" value="{{$biaDepartment->se_row_department_contact_list}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 7 (EXTERNAL CONTACT LIST)') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="se_row_external_contact_listU[{{$biaDepartment->id}}]" value="{{$biaDepartment->se_row_external_contact_list}}">
                                                                        </div>
                                                                    </div>

                                                                    <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 9 (OTHER INTERNAL DEPENDENCIES)') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="se_row_other_internal_dependencyU[{{$biaDepartment->id}}]" value="{{$biaDepartment->se_row_other_internal_dependency}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('CP: Num Row for 1 (ESSENTIAL PERSONNEL AND CROSS-TRAINING)') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="cp_row_essential_personnelU[{{$biaDepartment->id}}]" value="{{$biaDepartment->cp_row_essential_personnel}}">
                                                                        </div>
                                                                    </div>

                                                                    <label class="col-sm-2 col-form-label">{{ __('TAP: Num Row for 1 (Team Action Plan)') }}</label>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="tap_row_team_action_planU[{{$biaDepartment->id}}]" value="{{$biaDepartment->tap_row_team_action_plan}}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    
                                                                    <div class="col-sm-12 text-right">
                                                                        <button type="button" class="btn btn-danger" onclick="removeBiaDepartmentOld({{$biaDepartment->id}})">Remove</button>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                            
                                                        @endforeach

                                                        
                                                        
                                                        @else

                                                        <div class="department-group bia-department-new-0">
                                                           
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
                                                                <label class="col-sm-2 col-form-label">New - 0</label>

                                                            </div>

                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                <div class="col-sm-10">
                                                                    <div class="form-group">
                                                                        <input class="form-control" required name="name[]"   type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>

                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                <div class="col-sm-10">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="description[]" id="" cols="60" rows="5" placeholder="Description"></textarea>
                                                                    </div>
                                                                </div>

                                                                
                                                            </div>
                                        
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">{{ __('GQ:Num Row for SP') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="gq_row_sp[]">
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 col-form-label">{{ __('GQ: Num Row for BL') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="gq_row_bl[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 6 (Vital Records)') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="se_row_vital_record[]">
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 6 (Technology Required)
                                                                    ') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="se_row_technology_required[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 7 (MODES OF NITIFICATION AND COMMUNICATION)') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="se_row_notification_n_communication[]">
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 7 (DEPARTMENT CONTACT LIST)') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="se_row_department_contact_list[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 7 (EXTERNAL CONTACT LIST)') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="se_row_external_contact_list[]">
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 col-form-label">{{ __('SE: Num Row for 9 (OTHER INTERNAL DEPENDENCIES)') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="se_row_other_internal_dependency[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label">{{ __('CP: Num Row for 1 (ESSENTIAL PERSONNEL AND CROSS-TRAINING)') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="cp_row_essential_personnel[]">
                                                                    </div>
                                                                </div>

                                                                <label class="col-sm-2 col-form-label">{{ __('TAP: Num Row for 1 (Team Action Plan)') }}</label>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="tap_row_team_action_plan[]">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                
                                                                <div class="col-sm-12 text-right">
                                                                    <button type="button" class="btn btn-danger" onclick="removeBiaDepartmentNew(0)">Remove</button>
                                                                </div>
                                                            </div>


                                                            <hr>
                                                        </div>
                                                        @endif

                                                        

                                                    </div>

                                                    <div class="card-footer">
                                                        <div class="row ">
                                                            <div class="col-md-6 ">
                                                                <button type="submit" class="btn btn-primary bia-department-update-btn">{{ __('Update') }}</button>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <button type="button" onclick="addMoreBiaDepartment()" class="btn btn-info">{{ __('Add More') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="tab-pane" id="service">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card dynamic-card">

                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title"> BIA<span>:</span> {{$bia->name}} </h4>
                                                    <p class="card-category assessment-label ">Services</p>
                                                </div>


                                                

                                                    @if (count($bia->biaDepartment)>0)

                                                    <div id="accordion" role="tablist">
                                                        <div class="card card-collapse">


                                                        @foreach ($bia->biaDepartment as $key=>$biaDepartment)

                                                            <div class="card-header" style="margin-bottom: 15px" role="tab" id="heading{{$key}}">
                                                                <h5 class="mb-0">
                                                                <a data-toggle="collapse" href="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                                                    Department: {{$biaDepartment->name}}
                                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                                </a>
                                                                </h5>
                                                            </div>


                                                            <div id="collapse{{$key}}" class="collapse @if($key==0)show @endif " role="tabpanel" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <form method="post" onsubmit="event.preventDefault(); updateBiaService({{$biaDepartment->id}})" autocomplete="off" class="form-horizontal biaServiceForm-{{$biaDepartment->id}}">
                                                                        @csrf
                                                                        <input type="hidden" name="bia_id" class="bia_id" value="{{$bia->id}}" >
                                                                        <input type="hidden" name="company_id" value="{{$bia->company_id}}">
                                                                        <input type="hidden" name="bia_department_id" value="{{$biaDepartment->id}}">


                                                                        Department : {{$biaDepartment->name}}


                                                                        <div id="bia-service-{{$biaDepartment->id}}">

                                                                            @if (count($biaDepartment->biaService)>0)


                                                                            @foreach ($biaDepartment->biaService as $index=>$biaService)
                                                                                <div class="service-group bia-service-old-{{$biaService->id}}">

                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
                                                                                        <label class="col-sm-2 col-form-label">Service - {{++$index}}</label>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="form-group">
                                                                                                <input class="form-control" required name="nameU[{{$biaService->id}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$biaService->name}}" required="true" aria-required="true"/>
                                                                                            </div>
                                                                                        </div>
                                                                                       
                                                                                    </div>
                                                                
                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="form-group">
                                                                                                <textarea class="form-control" name="descriptionU[{{$biaService->id}}]" id="" cols="60" rows="5" placeholder="Description">{{$biaService->description}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                            
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-2">
                                                                                            <label class=" col-form-label">{{ __('Financial (per day)') }}</label> <br>
                                                                                            <button  type="button" class="btn btn-info btn-link btn-sm" rel="tooltip" title="Add More"><i class="material-icons">add</i></button>
                                                                                        </div>

                                                                                        <div class="col-sm-10">

                                                                                            <div class="financialU-area">
                                                                                                @php
                                                                                                    $financialAreas = json_decode($biaService->financial, true);
                                                                                                @endphp

                                                                                                    @if ($financialAreas)

                                                                                                        @foreach ($financialAreas as $financialArea)
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-10">
                                                                                                                <div class="form-group">
                                                                                                                    <input name="financialU[{{$biaService->id}}][]" class="form-control" type="text" value="{{$financialArea}}">
                                                                                                                 </div>
                                                                                                            </div>
            
                                                                                                            <div class="col-sm-2 text-right">
                                                                                                                <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                            </div>
            
                                                                                                        </div>
                                                                                                        @endforeach

                                                                                                    @else 

                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-10">
                                                                                                            <div class="form-group">
                                                                                                                <input name="financialU[{{$biaService->id}}][]" class="form-control" type="text" value="">
                                                                                                             </div>
                                                                                                        </div>
        
                                                                                                        <div class="col-sm-2 text-right">
                                                                                                            <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                        </div>
        
                                                                                                    </div>

                                                                                                        
                                                                                                    @endif
                                                                                                
                                                                                                

                                                                                            </div>

                                                                                           

                                                                                        </div>
                                            
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-2">
                                                                                            <label class=" col-form-label">{{ __('Impact') }}</label> <br>
                                                                                            <button type="button" class="btn btn-info btn-link btn-sm" rel="tooltip" title="Add More"><i class="material-icons">add</i></button>
                                                                                        </div>

                                                                                        <div class="col-sm-10">



                                                                                            <div class="impactU-area">
                                                                                                @php
                                                                                                    $impactUAreas = json_decode($biaService->impact, true);
                                                                                                @endphp

                                                                                                    @if ($impactUAreas)

                                                                                                        @foreach ($impactUAreas as $impactUArea)
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-10">
                                                                                                                <div class="form-group">
                                                                                                                    <input name="impactU[{{$biaService->id}}][]" class="form-control" type="text" value="{{$impactUArea}}">
                                                                                                                 </div>
                                                                                                            </div>
            
                                                                                                            <div class="col-sm-2 text-right">
                                                                                                                <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                            </div>
            
                                                                                                        </div>
                                                                                                        @endforeach

                                                                                                    @else

                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-10">
                                                                                                            <div class="form-group">
                                                                                                                <input name="impactU[{{$biaService->id}}][]" class="form-control" type="text" value="">
                                                                                                             </div>
                                                                                                        </div>
        
                                                                                                        <div class="col-sm-2 text-right">
                                                                                                            <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                        </div>
        
                                                                                                    </div>

                                                                                                        
                                                                                                    @endif
                                                                                                
                                                                                                

                                                                                            </div>

                                                                                           

                                                                                        </div>
                                            
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-2">
                                                                                            <label class=" col-form-label">{{ __('Criteria Weights') }}</label> <br>
                                                                                            <button type="button" class="btn btn-info btn-link btn-sm" rel="tooltip" title="Add More"><i class="material-icons">add</i></button>
                                                                                        </div>

                                                                                        <div class="col-sm-10">


                                                                                            <div class="criteriaWeightU-area">
                                                                                                @php
                                                                                                    $criteriaWeightUAreas = json_decode($biaService->criteria_weight, true);
                                                                                                @endphp

                                                                                                    @if ($criteriaWeightUAreas)

                                                                                                        @foreach ($criteriaWeightUAreas as $criteriaWeightUArea)
                                                                                                        <div class="row">

                                                                                                            <div class="col-sm-10">
                                                                                                                <div class="form-group">
                                                                                                                    <input name="criteria_weightU[{{$biaService->id}}][]" class="form-control" type="text" value="{{$criteriaWeightUArea}}">
                                                                                                                 </div>
                                                                                                            </div>
            
                                                                                                            <div class="col-sm-2 text-right">
                                                                                                                <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                            </div>
            
                                                                                                        </div>
                                                                                                        @endforeach

                                                                                                        @else 

                                                                                                        <div class="row">

                                                                                                            <div class="col-sm-10">
                                                                                                                <div class="form-group">
                                                                                                                    <input name="criteria_weightU[{{$biaService->id}}][]" class="form-control" type="text" value="">
                                                                                                                 </div>
                                                                                                            </div>
            
                                                                                                            <div class="col-sm-2 text-right">
                                                                                                                <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                            </div>
            
                                                                                                        </div>

                                                                                                        
                                                                                                    @endif
                                                                                                
                                                                                                

                                                                                            </div>


                                                                                            

                                                                                        </div>
                                                                                        

                                                                                        
                                            
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('Impact Criteria Field') }}</label>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="form-group">
                                                                                               <select class="form-control" name="impact_criteria_fieldU[{{$biaService->id}}]">
                                                                                                   <option value="bia">BIA</option>
                                                                                               </select>
                                                                                            </div>
                                                                                        </div>
                                            
                                                                                    </div>

                                                                                    <div class="row">

                                                                                        <div class="col-sm-12 text-right">
                                                                                            <button type="button" class="btn btn-danger" onclick="removeBiaServiceOld({{$biaService->id}})">Remove</button>
                                                                                        </div>

                                                                                    </div>

                                                                                    <hr>
                                                                                </div>
                                                                            @endforeach




                                                                            @else 

                                                                                <div class="service-group bia-service-new-{{$biaDepartment->id}}-0">

                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
                                                                                        <label class="col-sm-2 col-form-label">{{ __('New-0') }}</label>

                                                                                        
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="form-group">
                                                                                                <input class="form-control" required name="name[0]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                
                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                                        <div class="col-sm-10">
                                                                                        <div class="form-group">
                                                                                            <textarea class="form-control" name="description[0]" id="" cols="60" rows="5" placeholder="Description"></textarea>
                                                                                        </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="row">
                                                                                        <div class="col-sm-2">
                                                                                            <label class=" col-form-label">{{ __('Financial (per day)') }}</label> <br>
                                                                                            <button type="button" class="btn btn-info btn-link btn-sm" rel="tooltip" title="Add More"><i class="material-icons">add</i></button>
                                                                                        </div>

                                                                                        <div class="col-sm-10">

                                                                                            <div class="financial-area" >

                                                                                            

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="financial[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="financial[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="financial[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="financial[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="financial[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                            
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-2">
                                                                                            <label class=" col-form-label">{{ __('Impact') }}</label> <br>
                                                                                            <button class="btn btn-info btn-link btn-sm" rel="tooltip" title="Add More"><i class="material-icons">add</i></button>
                                                                                        </div>

                                                                                        <div class="col-sm-10">
                                                                                            <div class="impact-area" >

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="impact[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="impact[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="impact[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="impact[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                            
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="col-sm-2">
                                                                                            <label class=" col-form-label">{{ __('Criteria Weights') }}</label> <br>
                                                                                            <button class="btn btn-info btn-link btn-sm" rel="tooltip" title="Add More"><i class="material-icons">add</i></button>
                                                                                        </div>

                                                                                        <div class="col-sm-10">

                                                                                            <div class="criteria-area">

                                                                                            

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="criteria_weight[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="criteria_weight[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>


                                                                                                <div class="row">
                                                                                                    <div class="col-sm-10">
                                                                                                        <div class="form-group">
                                                                                                            <input name="criteria_weight[0][]" class="form-control" type="text" value="">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-sm-2 text-right">
                                                                                                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                                                                                                    </div>

                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                        

                                                                                        
                                            
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('Impact Criteria Field') }}</label>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="form-group">
                                                                                               <select class="form-control" name="impact_criteria_field[0]">
                                                                                                   <option value="bia">BIA</option>
                                                                                               </select>
                                                                                            </div>
                                                                                        </div>
                                            
                                                                                    </div>

                                                                                   

                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                                                                                        <div class="col-sm-7">
                                                                                            <div class="form-group">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-right">
                                                                                            <button type="button" class="btn btn-danger" onclick="removeBiaServiceNew({{$biaDepartment->id}},0)">Remove</button>
                                                                                        </div>
                                                                                        
                                                                                    </div>

                                                                                    <hr>

                                                                                </div>

                                                                                
                                                                                
                                                                                
                                                                            @endif

                                                                        </div>

                                                                        


                                                                        <div class="card-footer">
                                                                            <div class="row ">
                                                                                <div class="col-md-6 ">
                                                                                    <button type="submit" class="btn btn-primary bia-service-update-btn-{{$biaDepartment->id}}">{{ __('Update') }}</button>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <button type="button" onclick="addMoreBiaService({{$biaDepartment->id}})" class="btn btn-info">{{ __('Add More') }}</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                    

                                                        @endforeach

                                                        </div>
                                                    </div>



                                                    @else

                                                    <h1>Please Insert first previous options</h1>


                                                        
                                                    @endif
                                                

                                                   

                                                   



                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection


@push('js')

    <script>



        $(document).ready(function() {

            var rowCount = 0;

            $('.addNewBtn').on('click', function() {
                alert("Working");
                rowCount = rowCount + 1;
                var addRowItem = '<div class="row rowClass' + rowCount +
                    '"><div class="col-md-7"><input type="text" class="form-control" name="nameInput['+rowCount+']" ></div><div class="col-md-5"><button type="button" class="btn btn-danger removeBtn" onclick="removeThisRow(' +
                    rowCount + ')"  >Remove</button></div></div>';
                // $(this).closest('.collapseBody').find('.rowBody').append(addRowItem);
                $(this).closest('.rowBody').append(addRowItem);
            });

            $('.removeBtn').on('click', function(e) {
                e.preventDefault();
                $(this).closest('.row').remove();
            })


            $('.biaGeneralForm').on('submit', function(e){

                e.preventDefault();
                var id = $('.bia_id').val();
                var formData =  $(this).serialize();
                $.ajax({
                    type:"PUT",
                    url: "{{url('bia')}}/"+id,
                    data: formData,
                    success:function(response){
                    if(response.status){
                        const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                        });

                        Toast.fire({
                        type: 'success',
                        title: 'Saved successfully'
                        })



                    }else{
                        const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                        });

                        Toast.fire({
                        type: 'error',
                        title: 'Failed to save'
                        })
                    }
                    },
                    error:function(err){
                    const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        type: 'error',
                        title: 'Failed to save'
                    })
                    }
                })



            })

           





        })

        $('.biaDepartmentForm').on('submit', function(e){

            e.preventDefault();
            var formData =  $(this).serialize();

            $.ajax({
                type:"POST",
                url: "{{url('bia-department-store')}}"
                data: formData,
                success:function(response){
                if(response.status){
                    const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });

                    Toast.fire({
                    type: 'success',
                    title: 'Saved successfully'
                    })



                }else{
                    const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });

                    Toast.fire({
                    type: 'error',
                    title: 'Failed to save'
                    })
                }
                },
                error:function(err){
                const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    type: 'error',
                    title: 'Failed to save'
                })
                }
            })

        })

        function removeThisRow(rowCount) {
            $('.rowClass' + rowCount + '').remove();
        }

        var rowCount = 0;
        function addNewBtn(key){
            rowCount = rowCount + 1;
                var addRowItem = '<div class="rowClass' + rowCount +
                    '"><div class="row"> <label class="col-sm-2 col-form-label">Name</label>  <div class="col-sm-7"><input type="text" class="form-control" name="nameInput['+rowCount+']" ></div><div class="col-sm-3 p-0"><button type="button" class="btn btn-danger removeBtn" onclick="removeThisRow(' +
                    rowCount + ')"  >Remove</button></div></div> <div class="row"> <label class="col-sm-2 col-form-label">Description</label>  <div class="col-sm-7"> <textarea class="form-control"name="descriptionInput['+rowCount+']" id="" cols="30" rows="5"></textarea>  </div></div>  </div>';
    
                $('.collapseBody'+key).find('.rowBody'+key).append(addRowItem);
        }

        function deleteThisItem(id){


            if(confirm("Are you sure ?")){
                if(id){
                $.ajax({
                type:"POST",
                url:"{{ route('deleteAssessment') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id" : id,
                },
                success:function(response){
                   if(response.status){
                       alert(response.message);
                   }else{
                       alert(response.message);
                   }

                },
                error:function(err){

                }
                })
            }else{
                alert("ID is not valid");
            }
            }else{
                return false;
            }



        }

   

    </script>

@endpush
