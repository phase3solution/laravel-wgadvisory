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

      
      <div class="row">
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
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Short Info:</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="fa fa-users"></i> Users
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="fa fa-suitcase"></i> Companies
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
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
                <div class="tab-pane active" id="profile">
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
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
  
  
                        @if ($userList)
                          @foreach ($userList as $key=>$user)
                            <tr>
  
                              <td>{{++$key}}</td>
                              <td></td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td></td>
                              <td></td>
                              <td>
                                @if ($user->status)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                              </td>
                      
                            </tr>
                          @endforeach
                            
                        @endif
                    
              
  
  
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane" id="messages">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="settings">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
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