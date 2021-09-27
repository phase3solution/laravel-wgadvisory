@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>'Assessments'])


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
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs flex-column" data-tabs="tabs">

                                        <li class="nav-item">
                                            <a  class="nav-link  active " href="#general" data-toggle="tab">General</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a  class="nav-link" href="#categories" data-toggle="tab">Categories</a>
                                        </li>

                                        <li class="nav-item">
                                            <a  class="nav-link" href="#subcategories" data-toggle="tab">Subcategories</a>
                                        </li>

                                        <li class="nav-item">
                                            <a  class="nav-link" href="#skills" data-toggle="tab">Skills</a>
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
                                                    <h4 class="card-title"> SFIA<span>:</span> {{$sfia->name}} </h4>
                                                    <p class="card-category assessment-label ">General</p>
                                                </div>


                                                <form method="post"  autocomplete="off" class="form-horizontal sfiaGeneralForm" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="sfia_id" class="sfia_id" value="{{$sfia->id}}">
                                                    <input type="hidden" name="company_id" value="{{$sfia->company_id}}">

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                        
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                    <div class="col-sm-7">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="name" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$sfia->name}}" required="true" aria-required="true"/>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                    <div class="col-sm-7">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$sfia->description}}</textarea>
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



                                <div class="tab-pane" id="categories">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card dynamic-card">

                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title"> SFIA<span>:</span> {{$sfia->name}} </h4>
                                                    <p class="card-category assessment-label ">Categories</p>
                                                </div>


                                                <form method="post" onsubmit="event.preventDefault(); updateSfiaCateogry()" autocomplete="off" class="form-horizontal sfiaCategoryForm">
                                                    @csrf
                                                    <input type="hidden" name="sfia_id" class="sfia_id" value="{{$sfia->id}}" >
                                                    <input type="hidden" name="company_id" value="{{$sfia->company_id}}">
                                                    
                                                    
                                                    <div class="card-body" id="sfia-category">
                                                        
                                                        @if (count($sfia->sfiaCategory)>0)

                                                        @foreach ($sfia->sfiaCategory as $in=>$sfiaCategory)
                                                            <div class="category-group sfia-category-old-{{$sfiaCategory->id}}">

                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
                                                                    <label class="col-sm-2 col-form-label">Category - {{++$in}}</label>
    
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <input class="form-control" required name="nameU[{{$sfiaCategory->id}}]"   type="text" placeholder="{{ __('Name') }}" value="{{$sfiaCategory->name}}" required="true" aria-required="true"/>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <textarea class="form-control" name="descriptionU[{{$sfiaCategory->id}}]" id="" cols="60" rows="5" placeholder="Description">{{$sfiaCategory->description}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                            
                                                         

                                                                <div class="row">
                                                                    <div class="col-sm-12 text-right">
                                                                        <button type="button" class="btn btn-danger" onclick="removeSfiaCategoryOld({{$sfiaCategory->id}})">Remove</button>
                                                                    </div>
                                                                </div>

                                                                <hr>
                                                            </div>
                                                            
                                                        @endforeach

                                                        
                                                        
                                                        @else

                                                        <div class="category-group sfia-category-new-0">
                                                           
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
                                                                <div class="col-sm-12 text-right">
                                                                    <button type="button" class="btn btn-danger" onclick="removeSfiaCategoryNew(0)">Remove</button>
                                                                </div>
                                                            </div>


                                                            <hr>
                                                        </div>
                                                        @endif

                                                        

                                                    </div>

                                                    <div class="card-footer">
                                                        <div class="row ">

                                                            <div class="col-md-6 ">
                                                                <button type="submit" class="btn btn-primary sfia-category-update-btn">{{ __('Update') }}</button>
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <button type="button" onclick="addMoreSfiaCategory()" class="btn btn-info">{{ __('Add More') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane" id="subcategories">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card dynamic-card">

                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title"> SFIA<span>:</span> {{$sfia->name}} </h4>
                                                    <p class="card-category assessment-label ">Subcategories</p>
                                                </div>


                                                

                                                    @if (count($sfia->sfiaCategory)>0)

                                                    <div id="accordion" role="tablist">
                                                        <div class="card card-collapse">


                                                        @foreach ($sfia->sfiaCategory as $key=>$sfiaCategory)

                                                            <div class="card-header" style="margin-bottom: 15px" role="tab" id="heading{{$key}}">
                                                                <h5 class="mb-0">
                                                                <a data-toggle="collapse" href="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                                                    Category: {{$sfiaCategory->name}}
                                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                                </a>
                                                                </h5>
                                                            </div>


                                                            <div id="collapse{{$key}}" class="collapse @if($key==0)show @endif " role="tabpanel" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <form method="post" onsubmit="event.preventDefault(); updateSfiaSubcateogry({{$sfiaCategory->id}})" autocomplete="off" class="form-horizontal sfiaSubcategoryForm-{{$sfiaCategory->id}}">
                                                                        @csrf
                                                                        <input type="hidden" name="sfia_id" class="sfia_id" value="{{$sfia->id}}" >
                                                                        <input type="hidden" name="company_id" value="{{$sfia->company_id}}">
                                                                        <input type="hidden" name="sfia_category_id" value="{{$sfiaCategory->id}}">


                                                                        Category : {{$sfiaCategory->name}}


                                                                        <div id="sfia-subcategory-{{$sfiaCategory->id}}">

                                                                            @if (count($sfiaCategory->sfiaSubcategory)>0)

                                                                                @foreach ($sfiaCategory->sfiaSubcategory as $index=>$sfiaSubcategory)
                                                                                    <div class="subcategory-group sfia-subcategory-old-{{$sfiaSubcategory->id}}">

                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
                                                                                            <label class="col-sm-2 col-form-label">Subcategory - {{++$index}}</label>
                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div class="form-group">
                                                                                                    <input class="form-control" required name="nameU[{{$sfiaSubcategory->id}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$sfiaSubcategory->name}}" required="true" aria-required="true"/>
                                                                                                </div>
                                                                                            </div>
                                                                                        
                                                                                        </div>
                                                                    
                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div class="form-group">
                                                                                                    <textarea class="form-control" name="descriptionU[{{$sfiaSubcategory->id}}]" id="" cols="60" rows="5" placeholder="Description">{{$sfiaSubcategory->description}}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                
                                                                                        </div>

                                                                                    

                                                                                        <div class="row">

                                                                                            <div class="col-sm-12 text-right">
                                                                                                <button type="button" class="btn btn-danger" onclick="removeSfiaSubcategoryOld({{$sfiaSubcategory->id}})">Remove</button>
                                                                                            </div>

                                                                                        </div>

                                                                                        <hr>
                                                                                    </div>
                                                                                @endforeach

                                                                            @else 

                                                                                <div class="subcategory-group sfia-subcategory-new-{{$sfiaCategory->id}}-0">

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
                                                                                        <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                                                                                        <div class="col-sm-7">
                                                                                            <div class="form-group">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-right">
                                                                                            <button type="button" class="btn btn-danger" onclick="removeSfiaSubcategoryNew({{$sfiaCategory->id}},0)">Remove</button>
                                                                                        </div>
                                                                                        
                                                                                    </div>

                                                                                    <hr>

                                                                                </div>

                                                                                
                                                                                
                                                                                
                                                                            @endif

                                                                        </div>

                                                                        


                                                                        <div class="card-footer">
                                                                            <div class="row ">
                                                                                <div class="col-md-6 ">
                                                                                    <button type="submit" class="btn btn-primary sfia-subcategory-update-btn-{{$sfiaCategory->id}}">{{ __('Update') }}</button>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <button type="button" onclick="addMoreSfiaSubcategory({{$sfiaCategory->id}})" class="btn btn-info">{{ __('Add More') }}</button>
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



                                <div class="tab-pane" id="skills">

                                    <div class="row">


                                        <div class="col-md-12">


                                            <div class="card dynamic-card">

                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title"> SFIA<span>:</span> {{$sfia->name}} </h4>
                                                    <p class="card-category assessment-label ">Skill</p>
                                                </div>


                                                

                                                    @if (count($sfiaSubCategories)>0)

                                                    <div id="accordion" role="tablist">
                                                        <div class="card card-collapse">


                                                        @foreach ($sfiaSubCategories as $key=>$sfiaSubcategory)

                                                            <div class="card-header" style="margin-bottom: 15px" role="tab" id="heading{{$key}}">
                                                                <h5 class="mb-0">
                                                                <a data-toggle="collapse" href="#collapse{{$key}}{{$sfiaSubcategory->id}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                                                    Subcategory: {{$sfiaSubcategory->name}}
                                                                    <i class="material-icons">keyboard_arrow_down</i>
                                                                </a>
                                                                </h5>
                                                            </div>


                                                            <div id="collapse{{$key}}{{$sfiaSubcategory->id}}" class="collapse @if($key==0)show @endif " role="tabpanel" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                                                <div class="card-body">

                                                                    <form method="post" onsubmit="event.preventDefault(); updateSfiaSkill({{$sfiaSubcategory->id}})" autocomplete="off" class="form-horizontal sfiaSkillForm-{{$sfiaSubcategory->id}}">
                                                                        @csrf
                                                                        <input type="hidden" name="sfia_id" class="sfia_id" value="{{$sfia->id}}" >
                                                                        <input type="hidden" name="company_id" value="{{$sfia->company_id}}">
                                                                        <input type="hidden" name="sfia_category_id" value="{{$sfiaSubcategory->sfia_category_id}}">
                                                                        <input type="hidden" name="sfia_subcategory_id" value="{{$sfiaSubcategory->id}}">



                                                                        Subcategory : {{$sfiaSubcategory->name}}


                                                                        <div id="sfia-skill-{{$sfiaSubcategory->id}}">

                                                                            @if (count($sfiaSubcategory->sfiaSkill)>0)

                                                                                @foreach ($sfiaSubcategory->sfiaSkill as $index=>$sfiaSkill)
                                                                                    <div class="skill-group sfia-skill-old-{{$sfiaSkill->id}}">

                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
                                                                                            <label class="col-sm-2 col-form-label">Skill - {{++$index}}</label>
                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div class="form-group">
                                                                                                    <input class="form-control" required name="nameU[{{$sfiaSkill->id}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$sfiaSkill->name}}" required="true" aria-required="true"/>
                                                                                                </div>
                                                                                            </div>
    
                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 col-form-label">{{ __('Code') }}</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div class="form-group">
                                                                                                    <input class="form-control" required name="codeU[{{$sfiaSkill->id}}]" id="input-code"  type="text" placeholder="{{ __('Code') }}" value="{{$sfiaSkill->code}}" />
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 col-form-label">{{ __('Levels') }}</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div class="form-group">
                                                                                                    @php
                                                                                                        $levels = json_decode($sfiaSkill->level, true);
                                                                                                    @endphp

                                                                                                    @if ($levels)

                                                                                                        @foreach ($levels as $i=>$item)
                                                                                                            <input class="form-control"  name="levelU[{{$sfiaSkill->id}}][]" id="input-level"  type="text" placeholder="{{ __('Levels') }}" value="{{$item}}" />
                                                                                                        @endforeach

                                                                                                    @else 

                                                                                                    <input class="form-control"  name="levelU[{{$sfiaSkill->id}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                                                                                                    <input class="form-control"  name="levelU[{{$sfiaSkill->id}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                                                                                                    <input class="form-control"  name="levelU[{{$sfiaSkill->id}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                                                                                                    <input class="form-control"  name="levelU[{{$sfiaSkill->id}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                                                                                                    <input class="form-control"  name="levelU[{{$sfiaSkill->id}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                                                                                                    <input class="form-control"  name="levelU[{{$sfiaSkill->id}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                                                                                    
                                                                                                        
                                                                                                    @endif

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                    
                                                                                        <div class="row">
                                                                                            <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                                            <div class="col-sm-10">
                                                                                                <div class="form-group">
                                                                                                    <textarea class="form-control" name="descriptionU[{{$sfiaSkill->id}}]" id="" cols="60" rows="5" placeholder="Description">{{$sfiaSkill->description}}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                
                                                                                        </div>

                                                                                    

                                                                                        <div class="row">

                                                                                            <div class="col-sm-12 text-right">
                                                                                                <button type="button" class="btn btn-danger" onclick="removeSfiaSkillOld({{$sfiaSkill->id}})">Remove</button>
                                                                                            </div>

                                                                                        </div>

                                                                                        <hr>
                                                                                    </div>
                                                                                @endforeach

                                                                            @else 

                                                                                <div class="skill-group sfia-skill-new-{{$sfiaSubcategory->id}}-0">

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
                                                                                        <label class="col-sm-2 col-form-label">{{ __('Code') }}</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="form-group">
                                                                                                <input class="form-control"  name="code[0]" id="input-code"  type="text" placeholder="{{ __('Code') }}" value=""/>
                                                                                            </div>
                                                                                        </div>
                                                                                        
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <label class="col-sm-2 col-form-label">{{ __('Level') }}</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="form-group">
                                                                                                <input class="form-control"  name="level[0][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value=""/>
                                                                                                <input class="form-control"  name="level[0][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value=""/>
                                                                                                <input class="form-control"  name="level[0][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value=""/>
                                                                                                <input class="form-control"  name="level[0][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value=""/>
                                                                                                <input class="form-control"  name="level[0][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value=""/>
                                                                                                <input class="form-control"  name="level[0][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value=""/>

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
                                                                                        <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                                                                                        <div class="col-sm-7">
                                                                                            <div class="form-group">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-3 text-right">
                                                                                            <button type="button" class="btn btn-danger" onclick="removeSfiaSkillNew({{$sfiaSubcategory->id}},0)">Remove</button>
                                                                                        </div>
                                                                                        
                                                                                    </div>

                                                                                    <hr>

                                                                                </div>

                                                                                
                                                                                
                                                                                
                                                                            @endif

                                                                        </div>

                                                                        


                                                                        <div class="card-footer">
                                                                            <div class="row ">
                                                                                <div class="col-md-6 ">
                                                                                    <button type="submit" class="btn btn-primary sfia-skill-update-btn-{{$sfiaSubcategory->id}}">{{ __('Update') }}</button>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <button type="button" onclick="addMoreSfiaSkill({{$sfiaSubcategory->id}})" class="btn btn-info">{{ __('Add More') }}</button>
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


            $('.sfiaGeneralForm').on('submit', function(e){

                e.preventDefault();


                var id = $('.sfia_id').val();
                var formData =  $(this).serialize();
                $.ajax({
                    type:"PUT",
                    url: "{{url('sfia')}}/"+id,
                    data: formData,
                    success:function(response){
                    if(response.status){
                        const Toast = Swal.mixin({ 
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
                        const Toast = Swal.mixin({ 
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
                    const Toast = Swal.mixin({ 
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
