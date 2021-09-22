
<div class="department-group bia-department-new-{{$rowID}}">

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
        <label class="col-sm-2 col-form-label">New - {{$rowID}}</label>
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
            <button type="button" class="btn btn-danger" onclick="removeBiaDepartmentNew({{$rowID}})">Remove</button>
        </div>
    </div>


    <hr>





</div>