<tr class="row-new-{{$rowCount}}">
    <td>{{$rowCount}}</td>
    <td>
        <select name="category_id[{{$rowCount}}]" onchange="newCategoryChange({{$rowCount}})" class="form-control new-category-{{$rowCount}}">
            <option value="">Category</option>
            @if ($categories)

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                
            @endif
        </select>
    </td>
    <td>
        <select name="subcategory_id[{{$rowCount}}]" onchange="newSubcategoryChange({{$rowCount}})" disabled class="form-control new-subcategory-{{$rowCount}}">
            <option value="">Subcategory</option>
        </select>
    </td>
    <td>
        <select name="skill_id[{{$rowCount}}]" onchange="newSkillChange({{$rowCount}})" disabled class="form-control new-skill-{{$rowCount}}">
            <option value="">Skills</option>
        </select>
    </td>
    <td>
        <span class="new-code-{{$rowCount}}"></span>
        <input type="hidden" class="new-code-{{$rowCount}}-input" name="code[{{$rowCount}}]">
    </td>
    <td>
        {{-- onchange="newRankChange({{$rowCount}})" --}}
        <select name="rank[{{$rowCount}}]"  class="form-control rank new-rank-{{$rowCount}}">
            <option value="core">Core</option>
            <option value="contributor">Contributor</option>
            <option value="awarness">Awarness</option>
        </select>
    </td>
    <td>
        {{-- onchange="newTargetChange({{$rowCount}})" --}}
        <select name="target[{{$rowCount}}]"  disabled class="form-control target  new-target-{{$rowCount}}">
            <option value="">Target</option>
        </select>
    </td>
    <td>
        {{-- onchange="newEvaluationChange({{$rowCount}})" --}}
        <select name="evaluation[{{$rowCount}}]"  disabled class="form-control evaluation new-evaluation-{{$rowCount}}">
            <option value="">Evaluation</option>
        </select>
    </td>
    <td>
        <button type="button" disabled class="btn btn-primary"> 
            <i class="fa fa-info"></i> 
        </button>
        <button type="button" onclick="newRemoveThisCategories({{$rowCount}})" class="btn btn-danger "> 
            <i class="fa fa-trash"></i> 
        </button>
    </td>
</tr>
