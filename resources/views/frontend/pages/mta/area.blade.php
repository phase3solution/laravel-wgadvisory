@extends('frontend.master')

@section('content')

	@include('frontend.layouts.sidebar_user')

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
	@include('frontend.layouts.header_user')

    @php
        $home_url = url('/');
    @endphp
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="">
                    <div class="card text-center">
                        <div class="card-body">
                            <a class="btn btn-lg btn-info btn-publish bold" href="javascript:;">Publish</a>
                            <a class="btn btn-lg btn-warning btn-publish bold" href="javascript:;">Reset</a>
                        </div>
                    </div>
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="mta-header">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="left-thum">
                                            <img src="<?php echo''.$home_url.'';?>/img/bg-integration.png" alt="">
                                        </div>
                                        <div class="left-thum mt-2">
                                            <img class="h40" src="<?php echo''.$home_url.'';?>/img/initial.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-center mta_hover_effect_icons">
                                            <a href="<?php echo''.$home_url.'';?>/pages/mta/mta_customer_facing.php">
                                                <img class="icon-100" src="<?php echo''.$home_url.'';?>/img/icon/icon-customer_facing.png" alt="">
                                            </a>
                                            <a href="<?php echo''.$home_url.'';?>/pages/mta/mta_business_solutions.php">
                                                <img class="icon-100" src="<?php echo''.$home_url.'';?>/img/icon/icon-business_solutions.png" alt="">
                                            </a>
                                            <a href="<?php echo''.$home_url.'';?>/pages/mta/mta_technology_infrastructure.php">
                                                <img class="icon-100" src="<?php echo''.$home_url.'';?>/img/icon/icon-technology_infrastructure.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-right">
                                            <div class="thum">
                                                <img class="h100" src="<?php echo''.$home_url.'';?>/img/rating-scale.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($assessment)
                        @if(count($assessment->children)>0)
                           @foreach ($assessment->children as $section)
                               
                            <div class="card mt-1">
                                <div class="card-title bg-blue">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="card-section-title">
                                                <div class="icon">
                                                    <span class="title-txt">{{$section->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <div class="btn-group">
                                                <div class="btn btn-text btn-sm btn-rating btn-dark avg bold">AVG: 1.57</div> 
                                                    <button class="btn btn-primary btn-sm bold" type="button" data-toggle="modal" data-target="#demoModal">
                                                        Criteria Rating Definitions
                                                    </button>
                                                    <button class="btn btn-success btn-sm bold" type="submit">
                                                    <i class="fas fa-save"></i> Save
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (count($section->children))
                                    @foreach ($section->children as $table)
                                            
                                    <div>
                                        <table class="table section-table">
                                            <tr>
                                                <td class="sub-title-txt bg-gray" style="width: 48%;">{{$table->name}}</td>
                                                <td class="bg-red" style="width: 70px;">
                                                    <select name="" id="" class="form-control sub-title-txt text-black bg-red p-0" style="height: 25px;">
                                                        <option value="">0</option>
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                        <option value="">4</option>
                                                        <option value="">5</option>
                                                        <option value="">6</option>
                                                        <option value="">7</option>
                                                        <option value="">8</option>
                                                        <option value="">9</option>
                                                        <option value="">10</option>
                                                        <option value="">G</option>
                                                    </select>
                                                </td>
                                                <td class="sub-title-txt bg-gray">Response</td>
                                            </tr>
                                        </table>
                                        <div class="card-body">
                                            <table class="table table-bordered hover_effect_table section-table">

                                                @if (count($table->children)> 0)

                                                    @foreach ($table->children as $key=>$question)
                                                    <tr>
                                                        <td class="text-16">
                                                            <span class="bold">{{++$key}}. {{$question->name}}</span>
                                                            <em>({{$question->description}})</em>
                                                        </td>
                                                        <td style="width:50%" class="p-0">
                                                            <textarea name="" id="" rows="3" class="form-control text-16"></textarea>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                @else
                                                    <tr>
                                                        <td colspan="2" class="text-center">Data Not Found</td>
                                                    </tr>
                                                @endif
                                                


                                               
                                                
                                            </table>
                                        </div>
                                    </div>

                                @endforeach
                                @endif

                            </div>

                            @endforeach 
                        @endif
                    @endif



                </div>
            </div>
            <!--end::Container-->
        </div>
        
    <!--end::Footer-->
    </div>
    <!--end::Content-->


</div>
<!--end::Wrapper-->


@endsection