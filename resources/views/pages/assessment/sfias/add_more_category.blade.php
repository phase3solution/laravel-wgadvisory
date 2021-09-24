<div class="category-group sfia-category-new-{{$categoryRow}}">
                                                           
    <div class="row">
        <label class="col-sm-2 col-form-label">{{ __('#SL') }}</label>
        <label class="col-sm-2 col-form-label">New - {{$categoryRow}}</label>

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
            <button type="button" class="btn btn-danger" onclick="removeSfiaCategoryNew({{$categoryRow}})">Remove</button>
        </div>
    </div>


    <hr>
</div>