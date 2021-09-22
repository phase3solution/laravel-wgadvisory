<div class="scorecard-item one">
    <h2>Risk Assessment</h2>
    <div class="card-fixed-header">
        <div class="card-header-tabs-line scorecard-tab pb-5">
            <div class="custom-title">
                <h1 class="title">Value Scorecard</h1>
                <h6 class="sub-title"><span>Risk Assessment (RA)</span></h6>
            </div>
        </div>
        <p class="mb-0 font-900">Risk Heat Map</p>
        <div class="scorecard-rates">
            <div class="item color-four">
                <span>0</span>
            </div>
            <div class="item color-four">
                <span>1</span>
            </div>
            <div class="item color-four">
                <span>2</span>
                <span>(A)</span>
            </div>
            <div class="item color-four">
                <span>3</span>
                <span>(B)</span>
            </div>
            <div class="item color-three">
                <span>4</span>
                <span>(C)</span>
            </div>
            <div class="item color-three">
                <span>5</span>
                <span>(D)</span>
            </div>
            <div class="item color-three">
                <span>6</span>
                <span>(E)</span>
            </div>
            <div class="item color-three">
                <span>7</span>
                <span>(F)</span>
            </div>
            <div class="item color-three">
                <span>8</span>
                <span>(G)</span>
            </div>
        </div>
        <div class="scorecard-rates mb-2">
            <div class="item color-two">
                <span>9</span>
                <span>(H)</span>
            </div>
            <div class="item color-two">
                <span>10</span>
                <span>(I)</span>
            </div>
            <div class="item color-two">
                <span>11</span>
                <span>(J)</span>
            </div>
            <div class="item color-two">
                <span>12</span>
                <span>(K)</span>
            </div>
            <div class="item color-one">
                <span>13</span>
            </div>
            <div class="item color-one">
                <span>14</span>
            </div>
            <div class="item color-one">
                <span>15</span>
            </div>
            <div class="item color-one">
                <span>16</span>
            </div>
            <div class="item bg-dark">
                <span class="text-white"></span>
            </div>
        </div>
    </div>
    
    
    <div class="scroll-item">	
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <tr class="bg-dark">
                    <th class="text-white text-center table-td-title">Letter</th>
                    <th class="text-white text-center table-td-title">Threat (Category)</th>
                    <th class="text-white text-center table-td-title">Rank</th>
                </tr>
                @php
                    $avg = [];
                    $char_arr = [];
                    $char = 'A';

                @endphp
{{-- 
                @foreach ($assessments as $threat)

                    @if ($threat->bcpResult)
                        @php
                            array_push($avg,$threat->bcpResult->average)
                        @endphp
                    @endif
                    
                @endforeach

                @foreach ($avg as $val)
                
                        @php
                            $char_arr[$val] = $char;
                            $char++
                        @endphp

                @endforeach
--}}
                @foreach ($assessments as $assessment) 
                    

                <tr>
                    <td class="text-center bold">
                        @if ($assessment->bcpResult)
                            {{-- {{$char_arr[$assessment->bcpResult->average]}} --}}
                            {{$char++}}
                        @else 
                            {{-- {{$char_arr[0]}} --}}
                            {{$char}}
                        @endif
                    </td>
                    <td class="text-center bold">{{$assessment->name}} ({{$assessment->parent->name}})</td>
                    <td class="text-center bold color-four">
                        @if ($assessment->bcpResult)
                            {{$assessment->bcpResult->average}}
                        @else 
                            0
                        @endif
                    </td>  
                </tr>
                @endforeach
            </table>
        </div>
    </div>														
</div>