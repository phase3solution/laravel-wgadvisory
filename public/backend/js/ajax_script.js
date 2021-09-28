

function updateAssessmentByAjax(key){
    var formData = $('.updateAssessmentByAjax'+key).serialize();
    $.ajax({
        type:"POST",
        url: APP_URL+"/assessment-update",
        data: formData,
        success:function(response){
          if(response.status){
            const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            Toast.fire({
              type: 'success',
              title: 'Saved successfully'
            })



          }else{
            const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            Toast.fire({
              type: 'error',
              title: 'Failed to save'
            })
          }
        },
        error:function(err){
          const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });

          Toast.fire({
            type: 'error',
            title: 'Failed to save'
          })
        }
      })



}



function updateBiaDepartment(){

            var formData =  $('.biaDepartmentForm').serialize();

            $.ajax({
                type:"POST",
                url: APP_URL+"/bia-department-store",
                data: formData,
                success:function(response){
                if(response.status){
                  $('.bia-department-update-btn').prop("disabled",true);

                    const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });

                    Toast.fire({
                    type: 'success',
                    title: 'Saved successfully'
                    })



                }else{
                    const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    });

                    Toast.fire({
                    type: 'error',
                    title: 'Failed to save'
                    })
                }
                },
                error:function(err){
                const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    type: 'error',
                    title: 'Failed to save'
                })
                }
            })

}


function updateBiaService(department_id){

  var formData =  $('.biaServiceForm-'+department_id).serialize();



  $.ajax({
      type:"POST",
      url: APP_URL+"/bia-service-store",
      data: formData,
      success:function(response){
      if(response.status){
        $('.bia-service-update-btn-'+department_id).prop("disabled",true);

          const Toast = Swal.mixin({ 
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
          });

          Toast.fire({
          type: 'success',
          title: 'Saved successfully'
          })



      }else{
          const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
          });

          Toast.fire({
          type: 'error',
          title: 'Failed to save'
          })
      }
      },
      error:function(err){
      const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
      });

      Toast.fire({
          type: 'error',
          title: 'Failed to save'
      })
      }
  })



}







var rowID = 0;
function addMoreBiaDepartment(){

  rowID = rowID + 1;
  $.ajax({
    type:"GET",
    url: APP_URL+"/add-more-bia-department/"+rowID,
    success:function(response){

      $('#bia-department').append(response);

    },
    error:function(err){
      const Toast = Swal.mixin({ 
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'error',
        title: 'Failed to load'
      })
    }
  })


}


var serviceRow = 0;
function addMoreBiaService(department_id){

  serviceRow = serviceRow + 1;
  $.ajax({
    type:"GET",
    url: APP_URL+"/add-more-bia-service/"+serviceRow+"/"+department_id,
    success:function(response){

      $('#bia-service-'+department_id).append(response);

    },
    error:function(err){
      const Toast = Swal.mixin({ 
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'error',
        title: 'Failed to load'
      })
    }
  })


}

function removeBiaDepartmentNew(row_id){

  $('.bia-department-new-'+row_id+'').remove();

}

function removeBiaServiceNew(department_id,row_id){
  $('.bia-service-new-'+department_id+'-'+row_id+'').remove();
}

function removeBiaDepartmentOld(department_id){

  if(confirm("Are you sure?")){

    $.ajax({
      type:"GET",
      url: APP_URL+"/delete-bia-department/"+department_id,
      success:function(response){
  
          if(response.status){
  
  
            $('.bia-department-old-'+department_id+'').remove();
  
  
  
            const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
  
            Toast.fire({
            type: 'success',
            title: response.message
            })
  
          }else{
              const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
              });
  
              Toast.fire({
              type: 'error',
              title: response.message
              })
          }
  
      },
      error:function(err){
        const Toast = Swal.mixin({ 
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
  
        Toast.fire({
          type: 'error',
          title: 'Server Error!'
        })
      }
    })

  }else{
    return false;
  }

  

}

function removeBiaServiceOld(service_id){

  if(confirm("Are you sure?")){

    $.ajax({
      type:"GET",
      url: APP_URL+"/delete-bia-service/"+service_id,
      success:function(response){
  
          if(response.status){
  
  
            $('.bia-service-old-'+service_id+'').remove();
  
  
  
            const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });
  
            Toast.fire({
            type: 'success',
            title: response.message
            })
  
          }else{
              const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
              });
  
              Toast.fire({
              type: 'error',
              title: response.message
              })
          }
  
      },
      error:function(err){
        const Toast = Swal.mixin({ 
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
  
        Toast.fire({
          type: 'error',
          title: 'Server Error!'
        })
      }
    })

  }else{
    return false;
  }

}




// SFIA CATEGORY BACKEDN AJAX

var categoryRow = 0;
function addMoreSfiaCategory(){

  categoryRow = categoryRow + 1;

  $.ajax({
    type:"GET",
    url: APP_URL+"/add-more-sfia-category/"+categoryRow,
    success:function(response){

      $('#sfia-category').append(response);

    },
    error:function(err){
      const Toast = Swal.mixin({ 
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'error',
        title: 'Failed to load'
      })
    }
  })


}

function removeSfiaCategoryNew(row_id){
  $('.sfia-category-new-'+row_id+'').remove();
}

function updateSfiaCateogry(){

  var formData =  $('.sfiaCategoryForm').serialize();

  $.ajax({
      type:"POST",
      url: APP_URL+"/sfia-category-store",
      data: formData,
      success:function(response){
        if(response.status){
            const Toast = Swal.mixin({ 
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            Toast.fire({
            type: 'success',
            title: 'Saved successfully'
            })

            location.reload();

        }
      },
      error:function(err){
        const Toast = Swal.mixin({ 
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'error',
            title: 'Failed to save'
        })
      }
  })

}

function removeSfiaCategoryOld(category_id){

  if(confirm("Are you sure?")){

    $.ajax({
      type:"GET",
      url: APP_URL+"/delete-sfia-category/"+category_id,
      success:function(response){
  
          if(response.status){
  
  
            $('.sfia-category-old-'+category_id+'').remove();
  
  
  
            const Toast = Swal.mixin({ 
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
  
            Toast.fire({
              type: 'success',
              title: response.message
            })
  
          }
  
      },
      error:function(err){
        const Toast = Swal.mixin({ 
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
  
        Toast.fire({
          type: 'error',
          title: 'Server Error!'
        })
      }
    })

  }else{
    return false;
  }

}


// SFIA SUBCATEGORY BACKEDN AJAX

var subcategoryRow = 0;
function addMoreSfiaSubcategory(category_id){

  subcategoryRow = subcategoryRow + 1;
  

  $.ajax({
    type:"GET",
    url: APP_URL+"/add-more-sfia-subcategory",
    data: {
      subcategoryRow : subcategoryRow,
      category_id : category_id
    },
    success:function(response){

      $('#sfia-subcategory-'+category_id).append(response);

    },
    error:function(err){
      const Toast = Swal.mixin({ 
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'error',
        title: 'Failed to load'
      })
    }
  })


}

function removeSfiaSubcategoryNew(category_id,row_id){
  $('.sfia-subcategory-new-'+category_id+'-'+row_id).remove();
}

function updateSfiaSubcateogry(category_id){

  var formData =  $('.sfiaSubcategoryForm-'+category_id).serialize();

  $.ajax({
      type:"POST",
      url: APP_URL+"/sfia-subcategory-store",
      data: formData,
      success:function(response){
        if(response.status){
            const Toast = Swal.mixin({ 
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            Toast.fire({
            type: 'success',
            title: 'Saved successfully'
            })

            location.reload();

        }
      },
      error:function(err){
        const Toast = Swal.mixin({ 
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'error',
            title: 'Failed to save'
        })
      }
  })

}

function removeSfiaSubcategoryOld(category_id){

  if(confirm("Are you sure?")){

    $.ajax({
      type:"GET",
      url: APP_URL+"/delete-sfia-sub-category/"+category_id,
      success:function(response){
  
          if(response.status){
  
  
            $('.sfia-subcategory-old-'+category_id).remove();
  
  
  
            const Toast = Swal.mixin({ 
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
  
            Toast.fire({
              type: 'success',
              title: response.message
            })
  
          }
  
      },
      error:function(err){
        const Toast = Swal.mixin({ 
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
  
        Toast.fire({
          type: 'error',
          title: 'Server Error!'
        })
      }
    })

  }else{
    return false;
  }

}

// SFIA SKILL BACKEDN AJAX

var skillRow = 0;
function addMoreSfiaSkill(category_id){

  skillRow = skillRow + 1;
  

  $.ajax({
    type:"GET",
    url: APP_URL+"/add-more-sfia-skill",
    data: {
      skillRow : skillRow,
      category_id : category_id
    },
    success:function(response){

      $('#sfia-skill-'+category_id).append(response);

    },
    error:function(err){
      const Toast = Swal.mixin({ 
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'error',
        title: 'Failed to load'
      })
    }
  })


}


function removeSfiaSkillNew(category_id,row_id){
  $('.sfia-skill-new-'+category_id+'-'+row_id).remove();
}

function updateSfiaSkill(category_id){

  var formData =  $('.sfiaSkillForm-'+category_id).serialize();

  $.ajax({
      type:"POST",
      url: APP_URL+"/sfia-skill-store",
      data: formData,
      success:function(response){
        if(response.status){
            const Toast = Swal.mixin({ 
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            Toast.fire({
            type: 'success',
            title: 'Saved successfully'
            })

            location.reload();

        }
      },
      error:function(err){
        const Toast = Swal.mixin({ 
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'error',
            title: 'Failed to save'
        })
      }
  })

}



function removeSfiaSkillOld(category_id){

  if(confirm("Are you sure?")){

    $.ajax({
      type:"GET",
      url: APP_URL+"/delete-sfia-skill/"+category_id,
      success:function(response){
  
          if(response.status){
  
  
            $('.sfia-skill-old-'+category_id).remove();
  
  
  
            const Toast = Swal.mixin({ 
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
  
            Toast.fire({
              type: 'success',
              title: response.message
            })
  
          }
  
      },
      error:function(err){
        const Toast = Swal.mixin({ 
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
  
        Toast.fire({
          type: 'error',
          title: 'Server Error!'
        })
      }
    })

  }else{
    return false;
  }

}







