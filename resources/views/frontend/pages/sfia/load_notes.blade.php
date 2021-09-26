<div class="row">

    <div class="col-md-10">
        <div class="form-group">
            <label for="notes"><img src="{{ asset('frontend') }}/assets/img/sfia/notes.png"
                    alt="" srcset=""></label>

            <textarea class="form-control" name="notes" id="notes" rows="7"></textarea>

        </div>

    </div>

    <div class="col-md-2 text-center">
        <label for="level_desc"><img
                src="{{ asset('frontend') }}/assets/img/sfia/level_desc.png" alt=""
                srcset=""></label>

            <select name="level" class="form-control" id="level_desc">
                <option value="1">Level 1 </option>
                <option value="2">Level 2 </option>
                <option value="3">Level 3 </option>
                <option value="4">Level 4 </option>
                <option value="5">Level 5 </option>
                <option value="6">Level 6 </option>
                <option value="7">Level 7 </option>

            </select>
            
    </div>

</div>

<div class="row">


    <div class="col-md-10">

        <div class="row">
            <div class="col-md-4">
                <label for="skill_fit"> <img
                        src="{{ asset('frontend') }}/assets/img/sfia/skills_fit.png"
                        alt="" srcset=""> </label>
                <p id="skill_fit">N/A</p>
                <input type="hidden" id="skill_fit_input" name="skill_fit" class="skill_fit_input" value="">
            </div>
            <div class="col-md-4">
                <label for="technical_score"> <img
                        src="{{ asset('frontend') }}/assets/img/sfia/technica_score.png"
                        alt="" srcset=""> </label>
                <p>N/A</p>
                <input type="hidden" name="technical_score">
            </div>
            <div class="col-md-4">
                <label for="start_edit"> <img
                        src="{{ asset('frontend') }}/assets/img/sfia/start-red.png"
                        alt="" srcset=""> </label>
            </div>

        </div>

    </div>

    <div class="col-md-2">
    </div>

</div>