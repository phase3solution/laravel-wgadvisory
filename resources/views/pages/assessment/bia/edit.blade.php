@extends('layouts.app', ['activePage' => 'assessment', 'titlePage' =>'Assessments'])

@section('content')
  <div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
              <form method="post"  autocomplete="off" class="form-horizontal biaUpdateForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="bia_id" class="bia_id" value="{{$bia->id}}" >

                <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">BIA</h4>
                    <p class="card-category">General</p>
                  </div>
                  <div class="card-body ">
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$bia->name}}" required="true" aria-required="true"/>
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$bia->description}}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                        <div class="col-sm-7">
                         <input type="file" name="image">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Select Company') }}</label>
                        <div class="col-sm-7">
                          <select name="company_id" required class="form-control select2">
                              <option value="">--</option>
                              @if (count($companies)> 0)

                                @foreach ($companies as $company)

                                    <option value="{{$company->id}}" @if($company->id == $bia->company_id) selected @endif >{{$company->name}}</option>
                                    
                                @endforeach
                                  
                              @endif
                          </select>
                        </div>
                    </div>

                   

                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                  </div>
                </div>
              </form>
            </div>
        </div>


    </div>
  </div>
@endsection

@push('js')

<script>

    $(document).ready(function(){
        $('.biaUpdateForm').on('submit', function(e){

        e.preventDefault();
        var id = $('.bia_id').val();
        var formData =  $(this).serialize();
        $.ajax({
            type:"PUT",
            url: "{{url('bia')}}/"+id,
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



        })
    })


</script>
    
@endpush

@push('js')

<script>
  $(document).ready(function() {
    $('.select2').select2();
});
</script>
    
@endpush