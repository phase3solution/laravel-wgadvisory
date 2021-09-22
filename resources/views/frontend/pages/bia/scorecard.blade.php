<div class="scorecard-item one">
    <h2>{{$bia->name}}</h2>
    <div class="card-fixed-header">
        <div class="card-header-tabs-line scorecard-tab pb-5">
            <div class="custom-title">
                <h1 class="title">Value Scorecard</h1>
                <h6 class="sub-title"><span>Business Impact Analysis (BIA)</span></h6>
            </div>
        </div>
    </div>
    
    
    <div class="scroll-item">	
        <div class="table-responsive">
            <table class="table table-bordered mb-0">

                @if ($departments)

                    @foreach ($departments as $department)
                        <tr>
                            <th colspan="2" class="bg-primary">
                                Department: {{$department->name}}
        
                            </th>
                            <th class="text-center bg-primary">
                                <a href="{{url('pdf-bia-scorecard',$department->id)}}" target="_blank" class="btn btn-sm btn-link btn-secondary"> <i class="fa fa-file-pdf"></i> </a>
                            
                            
                                @php

                                    $avgRatingColor = 'bg-primary';

                                    if($department->avg_rating >0 && $department->avg_rating <=20){
                                        $avgRatingColor = "c-5";
                                    }elseif ($department->avg_rating >21 && $department->avg_rating <=40) {
                                        $avgRatingColor = "c-4";
                                    }elseif ($department->avg_rating >41 && $department->avg_rating <=60) {
                                        $avgRatingColor = "c-3";
                                    }elseif ($department->avg_rating >61 && $department->avg_rating <=80) {
                                        $avgRatingColor = "c-2";
                                    }elseif ($department->avg_rating >80) {
                                        $avgRatingColor = "c-1";
                                    }
                                @endphp
                              
                            
                            
                            </th>
                            <th class="{{$avgRatingColor}}">
                               {{$department->criticality_level}}
                            </th>
        
                        </tr>
        
                        <tr class="bg-dark">
                            <th class="text-white text-center table-td-title">Service/Process</th>
                            <th class="text-white text-center table-td-title">Calculated RTO</th>
                            <th class="text-white text-center table-td-title">Criticality Rating</th>
                            <th class="text-white text-center table-td-title">IT Services</th>
                        </tr>
                        
                        @if ($department->biaService)

                            @foreach ($department->biaService as $service)
                                <tr>
                                    <td class="bold bg-primary">{{$service->name}}</td>
                                    <td class="text-center bold ">
                                        @if ($service->biaServiceResult)
                                            {{$service->biaServiceResult->calculated_rto}}
                                        @else 
                                        --
                                            
                                        @endif

                                        @php
                                            $critical_rating_color = "bg-primary";
                                        @endphp

                                        @if ($service->biaServiceResult)


                                            @if ($service->biaServiceResult->criticality_rating)

                                                @php


                                    

                                                    if($service->biaServiceResult->criticality_rating >0 && $service->biaServiceResult->criticality_rating <=20){
                                                        $critical_rating_color = "c-5";
                                                    }elseif ($service->biaServiceResult->criticality_rating >21 && $service->biaServiceResult->criticality_rating <=40) {
                                                        $critical_rating_color = "c-4";
                                                    }elseif ($service->biaServiceResult->criticality_rating >41 && $service->biaServiceResult->criticality_rating <=60) {
                                                        $critical_rating_color = "c-3";
                                                    }elseif ($service->biaServiceResult->criticality_rating >61 && $service->biaServiceResult->criticality_rating <=80) {
                                                        $critical_rating_color = "c-2";
                                                    }elseif ($service->biaServiceResult->criticality_rating >80) {
                                                        $critical_rating_color = "c-1";
                                                    }

                                                @endphp
                                                
                                            @endif
                                           

                                          

                                        @endif 
                                    </td>
                                    <td class="text-center bold {{$critical_rating_color}}">
                                        @if ($service->biaServiceResult)
                                            {{$service->biaServiceResult->criticality_rating}}
                                        @else 
                                        --
                                            
                                        @endif


                                        @php
                                            $counti = 0;
                                        @endphp

                                    @if ($service->biaServiceResult)

                                        @if ($service->biaServiceResult->spe_upstream_dependencies)

                                            @php
                                                $upStream = array();
                                                $upStream =  json_decode($service->biaServiceResult->spe_upstream_dependencies, true ); 
                                                
                                                $count = count($upStream);

                                            

                                                if($count>1){
                                                    $counti = $count - 1;
                                                }


                                            @endphp
                                            
                                        @endif
                                    
                                    @endif 



                                    </td>


                                   


                                    <td class="text-center bold @if($counti >=1 ) bg-danger @else bg-success @endif  ">
                                        @if ($service->biaServiceResult)

                                            @if ($service->biaServiceResult->spe_upstream_dependencies)

                                                {{$counti}}
                                                
                                            @endif
                                            
                                        @else 
                                        --
                                            
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            
                        @endif
            
                        



                    @endforeach
                    
                @endif
              
               
                                    

                

            </table>
        </div>
    </div>														
</div>