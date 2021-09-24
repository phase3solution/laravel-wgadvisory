<div class="skill-group sfia-skill-new-{{$category_id}}-{{$skillRow}}">

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
        <label class="col-sm-2 col-form-label">New-{{$skillRow}}</label>

        
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" required name="name[{{$skillRow}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
            </div>
        </div>
        
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Code') }}</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control"  name="code[{{$skillRow}}]" id="input-code"  type="text" placeholder="{{ __('Code') }}" value="" />
            </div>
        </div>
        
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Level') }}</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control"  name="level[{{$skillRow}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                <input class="form-control"  name="level[{{$skillRow}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                <input class="form-control"  name="level[{{$skillRow}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                <input class="form-control"  name="level[{{$skillRow}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                <input class="form-control"  name="level[{{$skillRow}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />
                <input class="form-control"  name="level[{{$skillRow}}][]" id="input-level"  type="text" placeholder="{{ __('Level') }}" value="" />

            </div>
        </div>
        
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
        <div class="col-sm-10">
        <div class="form-group">
            <textarea class="form-control" name="description[{{$skillRow}}]" id="" cols="60" rows="5" placeholder="Description"></textarea>
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
            <button type="button" class="btn btn-danger" onclick="removeSfiaSkillNew({{$category_id}},{{$skillRow}})">Remove</button>
        </div>
        
    </div>

    <hr>

</div>