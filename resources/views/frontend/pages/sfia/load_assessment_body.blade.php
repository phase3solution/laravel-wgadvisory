<div class="card mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">

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
                                    <select name="category_id" onchange="newCategoryChange(1)"  class="form-control new-category-1">
                                        <option value="">Category</option>
                                        @if ($categories)

                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                            
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <select name="subcategory_id" onchange="newSubcategoryChange(1)" disabled class="form-control new-subcategory-1">
                                        <option value="">Subcategory</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="skill_id" onchange="newSkillChange(1)" disabled class="form-control new-skill-1">
                                        <option value="">Skills</option>
                                    </select>
                                </td>
                                <td>
                                    <span class="new-code-1"></span>
                                </td>
                                <td>
                                    {{-- onchange="newRankChange(1)" --}}
                                    <select name="rank"  class="form-control rank new-rank-1">
                                        <option value="core">Core</option>
                                        <option value="contributor">Contributor</option>
                                        <option value="awarness">Awarness</option>
                                    </select>
                                </td>
                                <td>
                                    {{-- onchange="newTargetChange(1)" --}}
                                    <select name="target"  disabled class="form-control target new-target-1">
                                        <option value="">Target</option>
                                    </select>
                                </td>
                                <td>
                                    {{-- onchange="newEvaluationChange(1)" --}}
                                    <select name="evaluation"   disabled class="form-control evaluation new-evaluation-1">
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

    <div class="card-body">
        <h1 class="card-title">Summary 1</h1>
        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <textarea name="summary_1" class="form-control" rows="10"></textarea>

                </div>

            </div>

        </div>

    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Save</button>

            </div>

        </div>

    </div>

</div>

<div class="card mt-5">

    <div class="card-body">
        <h1 class="card-title">Summary 2</h1>
        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <textarea name="summary_2" class="form-control" rows="10"></textarea>
                </div>

            </div>

        </div>

    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Save</button>

            </div>

        </div>

    </div>

</div>