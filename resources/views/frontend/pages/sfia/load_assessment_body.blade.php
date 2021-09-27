<div class="card mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">

                    <form id="sfiaResultCategoryForm2" method="post">
                        @csrf
                        <input type="hidden" name="company_id" value="{{$company_id}}">
                        <input type="hidden" name="sfia_id" value="{{$sfia_id}}">
                
                        <input type="hidden" name="sfia_team_id" value="{{$sfia_team_id}}">
                        <input type="hidden" name="sfia_name_role_id" value="{{$sfia_name_role_id}}">

                        <table class="table">
                            <thead>
                                <tr class="bg-dark">
                                    <th>NO.</th>
                                    <th>CATEGORY</th>
                                    <th>SUB-CATEGORY</th>
                                    <th>SKILL</th>
                                    <th>CODE</th>
                                    <th>RANK</th>
                                    <th>TARGET</th>
                                    <th>EVALUATION</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="categoriesTable">

                            

                                <tr class="row-new-1">
                                    <td>1</td>
                                    <td>
                                        <select name="category_id[1]" onchange="newCategoryChange(1)"  class="form-control new-category-1">
                                            <option value="">Category</option>
                                            @if ($categories)

                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                                
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <select name="subcategory_id[1]" onchange="newSubcategoryChange(1)" disabled class="form-control new-subcategory-1">
                                            <option value="">Subcategory</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="skill_id[1]" onchange="newSkillChange(1)" disabled class="form-control new-skill-1">
                                            <option value="">Skills</option>
                                        </select>
                                    </td>
                                    <td>
                                        <span class="new-code-1"></span>
                                        <input class="new-code-1-input" type="hidden" name="code[]">
                                    </td>
                                    <td>
                                        {{-- onchange="newRankChange(1)" --}}
                                        <select name="rank[1]"  class="form-control rank new-rank-1">
                                            <option value="core">Core</option>
                                            <option value="contributor">Contributor</option>
                                            <option value="awarness">Awarness</option>
                                        </select>
                                    </td>
                                    <td>
                                        {{-- onchange="newTargetChange(1)" --}}
                                        <select name="target[1]"  disabled class="form-control target new-target-1">
                                            <option value="">Target</option>
                                        </select>
                                    </td>
                                    <td>
                                        {{-- onchange="newEvaluationChange(1)" --}}
                                        <select name="evaluation[1]"   disabled class="form-control evaluation new-evaluation-1">
                                            <option value="">Evaluation</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" disabled class="btn btn-primary"> 
                                            <i class="fa fa-info"></i> 
                                        </button>
                                        <button type="button" onclick="newRemoveThisCategories(1)" class="btn btn-danger"> 
                                            <i class="fa fa-trash"></i> 
                                        </button>
                                    </td>
                                </tr>



                            </tbody>

                        </table>

                    </form>

                </div>

            </div>

        </div>

    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-12 text-right">
                <button type="button" onclick="addMoreCategories({{$company_id}})" class="btn btn-primary"><i class="fa fa-plus"></i> Add
                    Skill</button>
                <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Save</button>

            </div>

        </div>

    </div>

</div>

<div class="card mt-5">

    <form id="sfiaResultForm3" method="POST">

        @csrf
        <input type="hidden" name="company_id" value="{{$company_id}}">
        <input type="hidden" name="sfia_id" value="{{$sfia_id}}">

        <input type="hidden" name="sfia_team_id" value="{{$sfia_team_id}}">
        <input type="hidden" name="sfia_name_role_id" value="{{$sfia_name_role_id}}">


        <div class="card-body">
            <h1 class="card-title">Summary 1</h1>
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group">
                        <textarea name="summary_1" class="form-control" required rows="10"></textarea>

                    </div>

                </div>

            </div>

        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>

                </div>

            </div>

        </div>
    </form>

</div>

<div class="card mt-5">

    <form id="sfiaResultForm4" method="post">
        @csrf

        <input type="hidden" name="company_id" value="{{$company_id}}">
        <input type="hidden" name="sfia_id" value="{{$sfia_id}}">

        <input type="hidden" name="sfia_team_id" value="{{$sfia_team_id}}">
        <input type="hidden" name="sfia_name_role_id" value="{{$sfia_name_role_id}}">


        <div class="card-body">
            <h1 class="card-title">Summary 2</h1>
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group">
                        <textarea name="summary_2" required class="form-control" rows="10"></textarea>
                    </div>

                </div>

            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>

                </div>

            </div>

        </div>
    </form>

</div>