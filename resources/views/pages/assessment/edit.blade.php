@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>$assessmentTypeForTitle->name])


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


                                        @if ($assessment->assessmentType->assessmentLabel)
                                            @foreach ($assessment->assessmentType->assessmentLabel as $label)
                                                <li class="nav-item">
                                                    <a onclick='getContentTab( {{$assessment->assessment_type_id}},  {{ $label->id }},{{$assessment->id}}, "{{ $label->name }}" )'
                                                        class="nav-link @if ($label->id == $assessment->assessment_label_id ) active @endif"
                                                        href="#{{ $label->name }}"
                                                        data-toggle="tab">{{ $label->name }}</a>
                                                </li>
                                            @endforeach
                                        @endif


                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="card-body ">
                            <div class="tab-content">
                                <div class="tab-pane active" id="{{ $assessment->assessmentLabel->name }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card dynamic-card">

                                                <div class="card-header card-header-primary">
                                                    <h4 class="card-title"> {{ $assessment->assessmentType->name }}<span>:</span> {{$assessment->name}} </h4>
                                                    <p class="card-category assessment-label ">{{ $assessment->assessmentLabel->name }} </p>
                                                </div>


                                                <form method="post" action="{{URL::to('assessment-parent-update')}}" autocomplete="off" class="form-horizontal">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                        
                                                                
                                                                <input type="hidden" name="parent_id" value="0" >
                                                                <input type="hidden" name="assessment_type_id" value="{{$assessment->assessment_type_id}}">
                                                                <input type="hidden" name="assessment_label_id" value="{{$assessment->assessment_label_id}}">
                                                                <input type="hidden" name="id" value="{{$assessment->id}}">

                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                                    <div class="col-sm-7">
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="name" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="{{$assessment->name}}" required="true" aria-required="true"/>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                
                                                                <div class="row">
                                                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                                                    <div class="col-sm-7">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$assessment->description}}</textarea>
                                                                    </div>
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
        function getContentTab( typeId , labelId, assessmentId, labelName) {
         
            // alert( typeId + "," +labelId+ ", " + assessmentId + "," + labelName  );
            $.ajax({
              type:"POST",
              url:"{{ route('findTabContent') }}",
              data: {
                "_token": "{{ csrf_token() }}",
                "labelId" : labelId,
                "assessmentId" : assessmentId,
                "typeId" : typeId
              },
              success:function(response){
                $('.dynamic-card').html(response);

                if(labelName){
                    $('.assessment-label').html(labelName);
                }

              },
              error:function(err){

              }
            })


        }


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
