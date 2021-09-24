<div class="subcategory-group sfia-subcategory-new-{{$category_id}}-{{$subcategoryRow}}">

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
        <label class="col-sm-2 col-form-label">New-{{$subcategoryRow}}</label>

        
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
        <div class="col-sm-10">
            <div class="form-group">
                <input class="form-control" required name="name[{{$subcategoryRow}}]" id="input-name"  type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
            </div>
        </div>
        
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
        <div class="col-sm-10">
        <div class="form-group">
            <textarea class="form-control" name="description[{{$subcategoryRow}}]" id="" cols="60" rows="5" placeholder="Description"></textarea>
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
            <button type="button" class="btn btn-danger" onclick="removeSfiaSubcategoryNew({{$category_id}},{{$subcategoryRow}})">Remove</button>
        </div>
        
    </div>

    <hr>

</div>