<div class="row form-group">
    <label for=""> Select  Name </label>
    <input type="hidden" name="parent_id" value="0">
    <select class="assessnemtName" name="name">
        <option value=""></option>
        @if ($assessments)
            @foreach ($assessments as $assessment)
                <option value="{{$assessment->id}}">{{$assessment->name}}</option>
            @endforeach
        @endif
    </select>
</div> 