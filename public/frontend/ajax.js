function newRemoveThisCategories(rowID){
    $('.row-new-'+rowID).remove()
}

function newCategoryChange(rowID){




    var findTr = $('.row-new-'+rowID);
    var subcategoryClass = findTr.find('.new-subcategory-'+rowID);
    var skillClass = findTr.find('.new-skill-'+rowID);
    var codeClass = findTr.find('.new-code-'+rowID);
    var targetClass = findTr.find('.new-target-'+rowID);
    var evaluationClass = findTr.find('.new-evaluation-'+rowID);


    var category_id = $('.new-category-'+rowID).val();


    findTr.removeClass('sfia-color- sfia-color-1 sfia-color-2 sfia-color-3 sfia-color-4 sfia-color-5 sfia-color-7')
    findTr.addClass('sfia-color-'+category_id);

    subcategoryClass.removeClass('sfia-color- sfia-color-1 sfia-color-2 sfia-color-3 sfia-color-4 sfia-color-5 sfia-color-7')
    subcategoryClass.addClass('sfia-color-'+category_id);

    skillClass.removeClass('sfia-color- sfia-color-1 sfia-color-2 sfia-color-3 sfia-color-4 sfia-color-5 sfia-color-7')
    skillClass.addClass('sfia-color-'+category_id);

    codeClass.removeClass('sfia-color- sfia-color-1 sfia-color-2 sfia-color-3 sfia-color-4 sfia-color-5 sfia-color-7')
    codeClass.addClass('sfia-color-'+category_id);


    if(category_id){
        $.ajax({
            type: "get",
            url: APP_URL+"/sfia-subcategory-by-category-id/"+category_id,
            success:function(response){
                subcategoryClass.prop('disabled', false);
                subcategoryClass.html(response);

            },
            error:function(err){
                console.log(err);
            }
            
        })

    }else{

        subcategoryClass.prop('disabled', true);
        subcategoryClass.html('<option value="">Subcategory</option');

        skillClass.prop('disabled', true);
        skillClass.html('<option value="">Skills</option');

        targetClass.prop('disabled', true);
        targetClass.html('<option value="" >Target</option>');

        evaluationClass.prop('disabled', true);
        evaluationClass.html('<option value="">Evaluation</option>');

        codeClass.html(" ");
    }



}

function newSubcategoryChange(rowID){

    var findTr = $('.row-new-'+rowID);

    var skillClass = findTr.find('.new-skill-'+rowID);

    var codeClass = findTr.find('.new-code-'+rowID);
    var targetClass = findTr.find('.new-target-'+rowID);
    var evaluationClass = findTr.find('.new-evaluation-'+rowID);


    var subcategory_id = $('.new-subcategory-'+rowID).val();

    if(subcategory_id){
        $.ajax({
            type: "get",
            url: APP_URL+"/sfia-skill-by-subcategory-id/"+subcategory_id,
            success:function(response){
                skillClass.prop('disabled', false);
                skillClass.html(response);

            },
            error:function(err){
                console.log(err);
            }
            
        })

    }else{
        skillClass.prop('disabled', true);
        skillClass.html('<option value="">Skills</option');

        targetClass.prop('disabled', true);
        targetClass.html('<option value="" >Target</option>');

        evaluationClass.prop('disabled', true);
        evaluationClass.html('<option value="">Evaluation</option>');

        codeClass.html(" ");
    }

}

function newSkillChange(rowID){

    var findTr = $('.row-new-'+rowID);

    var codeClass = findTr.find('.new-code-'+rowID);
    var targetClass = findTr.find('.new-target-'+rowID);
    var evaluationClass = findTr.find('.new-evaluation-'+rowID);



    var skill_id = $('.new-skill-'+rowID).val();

    if(skill_id){
        $.ajax({
            type: "get",
            url: APP_URL+"/sfia-skill-details-by-id/"+skill_id,
            success:function(response){
                targetClass.prop('disabled', false);
                targetClass.html(response.targetLevel);

                evaluationClass.prop('disabled', false);
                evaluationClass.html(response.evaluationLevel);

                codeClass.html(response.code);



            },
            error:function(err){
                console.log(err);
            }
            
        })

    }else{
        targetClass.prop('disabled', true);
        targetClass.html('<option value="" >Target</option>');

        evaluationClass.prop('disabled', true);
        evaluationClass.html('<option value="">Evaluation</option>');

        codeClass.html(" ");
    }


}

$(document).on('change', '.rank, .target, .evaluation', function(e){
    e.preventDefault();

    sfiaCalculateSkillsFit()

})

function sfiaCalculateSkillsFit(){
    var rowCount = 0;
    var total = 0;
    var avg = '';
    var avg_value = 'N/A';
    var avg_text = 'N/A';

    $('.categoriesTable tr').each(function(){

        let rank = $(this).find('.rank').val();
        if(rank == "core"){
            let evaluation = parseInt($(this).find('.evaluation').val());
            let target = parseInt($(this).find('.target').val());

            if(!isNaN(evaluation) && !isNaN(target)){
                
               let skillValue = 0;

                if(evaluation && target && evaluation >0){

                    if(evaluation >= target){
                        skillValue = 1;
                    }else if(evaluation == (target - 1)){
                        skillValue = 0.5;
                    }else if(evaluation == (target - 2)){
                        skillValue = 0.3;
                    }else if(evaluation == (target - 1)){
                        skillValue = 0.1;
                    }else{
                        skillValue = 0;
                    }

                }else{
                     skillValue = 0;
                }

                total += skillValue;
                rowCount++ 

            }

        }


    })


    if(rowCount){
        avg = (total / rowCount) * 100;
        avg_value  = avg;
        avg_text = avg.toFixed(0) + '%';
    }

    $("#skill_fit").html(avg_text);
    $("#skill_fit_input").val(avg);








}


// $(document).on('change', '.category', function(e){
//     e.preventDefault();


//     var findTr = $(this).closest('tr');
//     var subcategoryClass = findTr.find('.subcategory');

//     var skillClass = findTr.find('.skill');

//     var codeClass = findTr.find('.code');
//     var targetClass = findTr.find('.target');
//     var evaluationClass = findTr.find('.evaluation');


//     var category_id = $(this).val();

//     if(category_id){
//         $.ajax({
//             type: "get",
//             url: APP_URL+"/sfia-subcategory-by-category-id/"+category_id,
//             success:function(response){
//                 subcategoryClass.prop('disabled', false);
//                 subcategoryClass.html(response);

//             },
//             error:function(err){
//                 console.log(err);
//             }
            
//         })

//     }else{
//         subcategoryClass.prop('disabled', true);
//         subcategoryClass.html('<option value="">Subcategory</option');

//         skillClass.prop('disabled', true);
//         skillClass.html('<option value="">Skills</option');

//         targetClass.prop('disabled', true);
//         targetClass.html('<option value="" >Target</option>');

//         evaluationClass.prop('disabled', true);
//         evaluationClass.html('<option value="">Evaluation</option>');

//         codeClass.html(" ");
//     }

       
    
// })


// $(document).on('change', '.subcategory', function(e){
//     e.preventDefault();


//     var findTr = $(this).closest('tr');
//     var skillClass = findTr.find('.skill');

//     var codeClass = findTr.find('.code');
//     var targetClass = findTr.find('.target');
//     var evaluationClass = findTr.find('.evaluation');


//     var subcategory_id = $(this).val();

//     if(subcategory_id){
//         $.ajax({
//             type: "get",
//             url: APP_URL+"/sfia-skill-by-subcategory-id/"+subcategory_id,
//             success:function(response){
//                 skillClass.prop('disabled', false);
//                 skillClass.html(response);

//             },
//             error:function(err){
//                 console.log(err);
//             }
            
//         })

//     }else{
//         skillClass.prop('disabled', true);
//         skillClass.html('<option value="">Skills</option');

//         targetClass.prop('disabled', true);
//         targetClass.html('<option value="" >Target</option>');

//         evaluationClass.prop('disabled', true);
//         evaluationClass.html('<option value="">Evaluation</option>');

//         codeClass.html(" ");
//     }

       
    
// })

// $(document).on('change', '.skill', function(e){
//     e.preventDefault();


//     var findTr = $(this).closest('tr');

//     var codeClass = findTr.find('.code');
//     var targetClass = findTr.find('.target');
//     var evaluationClass = findTr.find('.evaluation');



//     var skill_id = $(this).val();

//     if(skill_id){
//         $.ajax({
//             type: "get",
//             url: APP_URL+"/sfia-skill-details-by-id/"+skill_id,
//             success:function(response){
//                 targetClass.prop('disabled', false);
//                 targetClass.html(response.targetLevel);

//                 evaluationClass.prop('disabled', false);
//                 evaluationClass.html(response.evaluationLevel);

//                 codeClass.html(response.code);



//             },
//             error:function(err){
//                 console.log(err);
//             }
            
//         })

//     }else{
//         targetClass.prop('disabled', true);
//         targetClass.html('<option value="" >Target</option>');

//         evaluationClass.prop('disabled', true);
//         evaluationClass.html('<option value="">Evaluation</option>');

//         codeClass.html(" ");
//     }

       
    
// })