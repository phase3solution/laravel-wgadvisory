
<div class="service-group bia-service-new-{{$departmentId}}-{{$serviceRow}}">


    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
        <label class="col-sm-2 col-form-label">New-{{$serviceRow}}</label>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" required name="name[{{$serviceRow}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
            </div>
        </div>
        
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
        <div class="col-sm-10">
        <div class="form-group">
            <textarea class="form-control" name="description[{{$serviceRow}}]" id="" cols="60" rows="5" placeholder="Description"></textarea>
        </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-2">
            <label class=" col-form-label">{{ __('Financial (per day)') }}</label> <br>
            <button class="btn btn-info btn-link btn-sm" rel="tooltip" title="Add More"><i class="material-icons">add</i></button>
        </div>

        <div class="col-sm-10">

            <div class="financial-area" >

            

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="financial[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="financial[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="financial[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="financial[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="financial[{{$serviceRow}}][]" class="form-control" type="text" value="">
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
                            <input name="impact[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="impact[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="impact[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="impact[{{$serviceRow}}][]" class="form-control" type="text" value="">
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
                            <input name="criteria_weight[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="criteria_weight[{{$serviceRow}}][]" class="form-control" type="text" value="">
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <button class="btn btn-danger btn-link btn-sm" rel="tooltip" title="Remove"><i class="material-icons">close</i></button>
                    </div>

                </div>


                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input name="criteria_weight[{{$serviceRow}}][]" class="form-control" type="text" value="">
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
               <select class="form-control" name="impact_criteria_field[{{$serviceRow}}]">
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
            <button type="button" class="btn btn-danger" onclick="removeBiaServiceNew({{$departmentId}},{{$serviceRow}})">Remove</button>
        </div>
        
    </div>

    <hr>

</div>