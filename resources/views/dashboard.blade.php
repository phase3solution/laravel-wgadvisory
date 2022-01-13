@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@push('css')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    
@endpush


@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6">
          <a href="{{route('user.index')}}">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">content_copy</i>
                </div>
                <p class="card-category">Total Users</p>
                <h3 class="card-title">{{count($users)}}
                </h3>
              </div>
              {{-- 
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-warning">list</i>
                    <a href="{{route('user.index')}}">Get User List...</a>
                  </div>
                </div> --}}


            </div>
          </a>


        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <a href="{{route('company.index')}}">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Total Company</p>
                <h3 class="card-title">{{count($companies)}}</h3> 
              </div>

              {{-- <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i> Last 24 Hours
                </div>
              </div> --}}


            </div>
          </a>

        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <a href="{{route('assessmentType.index')}}">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">Assessment Types</p>
                <h3 class="card-title">{{count($assessments)}}</h3>
              </div>

              {{-- <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">local_offer</i> Tracked from Github
                </div>
              </div> --}}


            </div>
          </a>

        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">

          <a href="{{route('role.index')}}">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="fa fa-twitter"></i>
                </div>
                <p class="card-category">Roles</p>
                <h3 class="card-title">{{count($roles)}}</h3>
              </div>


              {{-- <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">update</i> Just Updated
                </div>
              </div> --}}


            </div>
          </a>


        </div>

      </div>

      
      {{-- <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Email Subscriptions</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Short Info:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#users" data-toggle="tab">
                        <i class="fa fa-users"></i> Users
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#companies" data-toggle="tab">
                        <i class="fa fa-suitcase"></i> Companies
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#assessments" data-toggle="tab">
                        <i class="fa fa-list"></i> Assessments
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">


                <div class="tab-pane active" id="users">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Company</th>
                        </tr>
                      </thead>
                      <tbody>
  
  
                        @if ($userList)
                          @foreach ($userList as $key=>$user)
                            <tr>
  
                              <td>
                                

                                @if ($user->status)
                                <span class="badge badge-pill badge-success">{{++$key}}</span>
                                @else
                                <span class="badge badge-pill badge-danger">{{++$key}}</span>
                                @endif
                              
                              </td>
                              <td> 
                                @if ($user->image)

                                <img src="{{asset($user->image)}}" class="rounded-circle" style="max-height:40px; max-width:40px" alt="">
                                    
                                @else
                                  <img src="{{asset('no-image-found.jpeg')}}" class="rounded-circle" style="max-height:40px; max-width:40px"  alt="">

                                @endif
                              </td>
                              <td>{{$user->name}}</td>
                              <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                              <td> 
                                
                                {{$user->userRole->role->name}} 
                              </td>
                              <td> 

                                @if ($user->userCompany)
                                {{$user->userCompany->company->name}}
                                @else 
                                --

                                @endif

                              </td>
                              
                      
                            </tr>
                          @endforeach
                            
                        @endif
                    
              
  
  
                      </tbody>
                    </table>
                  </div>
                </div>


                <div class="tab-pane" id="companies">

                  <div class="table-responsive">
                    <table class="table">

                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>User</th>
                        </tr>
                      </thead>
  
                      <tbody>
                        @if ($companyList)
  
                          @foreach ($companyList as $index=>$company)
                            <tr>
                              <td>
                                @if ($company->status)
  
                                <span class="badge badge-pill badge-success">{{++$index}}</span>
                                    
                                @else
                                <span class="badge badge-pill badge-danger">{{++$index}}</span>
  
                                @endif
                              </td>
                              <td>
  
                                @if ($company->image)
  
                                  <img src="{{asset($company->image)}}" class="rounded" style="max-height:40px; max-width:40px" alt="">
                                      
                                  @else
                                    <img src="{{asset('no-image-found.jpeg')}}" class="rounded" style="max-height:40px; max-width:40px"  alt="">
  
                                  @endif
                              
                              </td>
                              <td>{{$company->name}}</td>
                              <td>
                                
                                
                                @if (count($company->userCompany)>0)
  
                                  @foreach ($company->userCompany as $userCompany)
                                   <span class="badge"> <a href="mailto:{{$userCompany->user->email}}">{{$userCompany->user->name}}</a> </span> 
                                 @endforeach
  
                                 
                                @else
                                    --
                                @endif
                               
                              
                              </td>
                            </tr>
                          @endforeach
                            
                        @endif
                       
  
                      </tbody>
  
  
                    </table>
                  </div>

                


                </div>

                <div class="tab-pane" id="assessments">

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Company</th>
                          <th>Created at</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
  
                        @if ($assessmentList)
  
                          @foreach ($assessmentList as $key=>$assessment)
  
                            <tr>
                              <td>{{++$key}}</td>
                              <td>  
                                @if ($assessment->image)
  
                                <img src="{{asset($assessment->image)}}" class="rounded" style="max-height:40px; max-width:40px" alt="">
                                    
                                @else
                                  <img src="{{asset('no-image-found.jpeg')}}" class="rounded" style="max-height:40px; max-width:40px"  alt="">
  
                                @endif 
                              </td>
                              <td>{{$assessment->name}}</td>
                              <td>
  
                                @if ($assessment->company)
  
                                {{$assessment->company->company->name}}
                                    
                                @else
                                    --
                                @endif
  
                              </td>
                              <td>
                                {{date('Y-m-d h:i a', strtotime($assessment->created_at))}}
                              </td>
                              <td>
                                @if ($assessment->status==0)
                                <span class="badge badge-danger">Inactive</span>
                                @elseif($assessment->status==1)
                                <span class="badge badge-success">Active</span>
                                @elseif($assessment->status==2)
                                <span class="badge badge-info">Pending Review</span>
                                @elseif($assessment->status==3)
                                <span class="badge badge-danger">Draft</span>
                                @elseif($assessment->status==4)
                                <span class="badge badge-secondary">Archived</span>
                                @elseif($assessment->status==5)
                                <span class="badge badge-secondary">Published</span>
                                @endif
                              </td>
                            </tr>
                              
                          @endforeach
                            
                        @endif
  
                      
                       
                      </tbody>
                    </table>
                  </div>


                </div>


              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Calendar</h4>
              <p class="card-category">All events information on date.</p>
            </div>
            <div class="card-body table-responsive">
              <div id='calendar-container'>
                <div id='calendar'></div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>


<script>
  $(document).ready(function() {
      // page is now ready, initialize the calendar...
      $('#calendar').fullCalendar({
          // put your options and callbacks here
          events : [
              {
                  title : 'Test Task',
                  start : '2021-10-06 T16:00:00',
              },
          ]
      })
  });
</script>
@endpush