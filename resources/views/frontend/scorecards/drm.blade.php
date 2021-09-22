<div class="scorecard-item one">
    <h2>DRM Assessment</h2>
    <div class="card-fixed-header">
        <div class="card-header-tabs-line scorecard-tab pb-5">
            <div class="custom-title">
                <h1 class="title">Value Scorecard</h1>
                <h6 class="sub-title"><span>Disaster Recovery Maturity</span></h6>
            </div>
        </div>
    </div>
    
    
    <div class="scroll-item">	
        <div class="table-responsive">
            <table class="table table-bordered mb-0">

                @if ($assessments)

                    @if (count($assessments->children)>0)
                        @foreach ($assessments->children as $area)
                            <tr class="bg-dark">
                                <th colspan="2" class="text-white text-center table-td-title">{{$area->name}}</th>
                            </tr>
                
                            <tr class="bg-primary">
                                <td class="text-center bold"></td>
                                <td class="text-center bold">Rating Level</td>
                            </tr>
            
                            @if (count($area->children)>0)

                                @foreach ($area->children as $section)

                                @if (count($section->children)>0)
                                    @foreach ($section->children as $table)
                                    <tr>
                                        <td style="width: 80%">{{$table->name}}</td>
                                        <td style="width: 20%">
                                            @if ($table->drmResult)
                                            {{$table->drmResult->average}}
                                            @else
                                            0.0
                                            @endif
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                @endif
                                  
                                @endforeach
                                
                            @endif
                           
                        @endforeach
                    @endif
                    
                @endif

                

            </table>
        </div>
    </div>														
</div>