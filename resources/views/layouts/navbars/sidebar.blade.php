<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->


  @php
    $user = \App\Models\UserRole::where('user_id',Auth::id() )->first();
  
  @endphp



  <div class="logo">
    <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
      <img class="advisory-logo" src="{{asset('backend/img/advisory-logo.png')}}" >
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item dashboard {{ $activePage == 'dashboardddd' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons"><img src="{{asset('backend')}}/img/sidebar-menu-icons/dashboard.png"></i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="nav-item {{ ($activePage == 'role' || $activePage == 'user' || $activePage == 'createUser' ) ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="{{ ($activePage == 'role' || $activePage == 'user') ? ' true' : 'false' }}">
          <i><img style="width:24px" src="{{asset('backend')}}/img/sidebar-menu-icons/menu-user.png"></i>
          <p>{{ __('User Management') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'role' || $activePage == 'user'  || $activePage == 'createUser') ? ' show' : '' }}" id="laravelExample">
          <ul class="nav">

            <li class="nav-item{{ $activePage == 'createUser' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.create') }}">
                 <i class="material-icons"><img src="{{asset('backend')}}/img/sidebar-menu-icons/add-user.png"></i>
                <span class="sidebar-normal"> {{ __('Add User') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'user' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                 <i class="material-icons"><img src="{{asset('backend')}}/img/sidebar-menu-icons/user.png"></i>
                <span class="sidebar-normal"> {{ __('User List') }} </span>
              </a>
            </li>
            @if ($user->role_id == 1 )
            <li class="nav-item{{ $activePage == 'role' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('role.index') }}">
                 <i class="material-icons"><img src="{{asset('backend')}}/img/sidebar-menu-icons/id-card.png"></i>
                <span class="sidebar-normal"> {{ __('Roles') }} </span>
              </a>
            </li>
            @endif

          </ul>
        </div>
      </li>

      
      <li class="nav-item {{ ($activePage == 'company' || $activePage == 'createCompany' || $activePage == 'assign-user' || $activePage == 'assign-assessment' ) ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#company" aria-expanded="{{ ($activePage == 'company' || $activePage == 'assign-user' || $activePage == 'assign-assessment' ) ? ' true' : 'false' }}">
          <i><img style="width:24px" src="{{asset('backend')}}/img/sidebar-menu-icons/suitcase.png"></i>
          <p>{{ __('Company') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'company' || $activePage == 'createCompany' || $activePage == 'assign-user' || $activePage == 'assign-assessment' ) ? ' show' : '' }}" id="company">
          <ul class="nav">


            <li class="nav-item{{ $activePage == 'createCompany' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('company.create') }}">
                 <i class="material-icons"><img src="{{asset('backend')}}/img/sidebar-menu-icons/add.png"></i>
                <span class="sidebar-normal"> {{ __('Add Company') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'company' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('company.index') }}">
                 <i class="material-icons"><img src="{{asset('backend')}}/img/sidebar-menu-icons/files.png"></i>
                <span class="sidebar-normal"> {{ __('Company List') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'assign-user' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('company.assign.user') }}">
                 <i class="material-icons"><img src="{{asset('backend')}}/img/sidebar-menu-icons/user_sub.png"></i>
                <span class="sidebar-normal"> {{ __('Assign User') }} </span>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'assign-assessment' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('company.assign.assessment') }}">
                 <i class="material-icons"><img src="{{asset('backend')}}/img/sidebar-menu-icons/evaluation.png"></i>
                <span class="sidebar-normal"> {{ __('Assign Assessment') }} </span>
              </a>
            </li>

          </ul>
        </div>
      </li>


      @if ($user->role_id == 1 )
        <li class="nav-item {{ ($activePage == 'assessmentType' || $activePage == 'assessmentLabel') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#assessmentSettings" aria-expanded="{{ ($activePage == 'role' || $activePage == 'user') ? ' true' : 'false' }}">
            <i><img style="width:24px" src="{{asset('backend')}}/img/sidebar-menu-icons/settings.png"></i>
            <p>{{ __('Settings') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse {{ ($activePage == 'assessmentType' || $activePage == 'assessmentLabel') ? ' show' : '' }}" id="assessmentSettings">
            <ul class="nav">

              <li class="nav-item{{ $activePage == 'assessmentType' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('assessmentType.index') }}">
                  <i class="material-icons">content_paste</i>
                    <p>{{ __('Assessment Types') }}</p>
                </a>
              </li>

              <li class="nav-item{{ $activePage == 'assessmentLabel' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('assessmentLabel.index') }}">
                  <i class="material-icons">content_paste</i>
                    <p>{{ __('Assessment Labels') }}</p>
                </a>
              </li>

            </ul>
          </div>
        </li>
      @endif


           

      <li class="nav-item {{ ($activePage == 'sfiaTeam' || $activePage == 'sfiaRole' || $activePage == 'sfiaTeamRole' || $activePage == 'sfiaUser' || $activePage == 'sfiaRoleUser') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#sfiaSettings" aria-expanded="{{ ($activePage == 'sfiaTeam' || $activePage == 'sfiaRole' || $activePage == 'sfiaTeamRole' || $activePage == 'sfiaUser' || $activePage == 'sfiaRoleUser') ? ' true' : 'false' }}">
          <i><img style="width:25px" src="{{asset('backend')}}/img/sidebar-menu-icons/settings.png"></i>
          <p>{{ __('SFIA Settings') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'sfiaTeam' || $activePage == 'sfiaRole' || $activePage == 'sfiaTeamRole' || $activePage == 'sfiaUser' || $activePage == 'sfiaRoleUser') ? ' show' : '' }}" id="sfiaSettings">
          <ul class="nav">

            <li class="nav-item{{ $activePage == 'sfiaTeam' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('sfiaTeam.index') }}">
                <i class="material-icons">content_paste</i>
                  <p>{{ __('SFIA Teams') }}</p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'sfiaRole' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('sfiaRole.index') }}">
                <i class="material-icons">content_paste</i>
                  <p>{{ __('SFIA Roles') }}</p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'sfiaTeamRole' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('sfiaTeamRole.index') }}">
                <i class="material-icons">content_paste</i>
                  <p>{{ __('Assign Team-Roles') }}</p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'sfiaUser' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('sfiaUser.index') }}">
                <i class="material-icons">content_paste</i>
                  <p>{{ __('SFIA Users') }}</p>
              </a>
            </li>

            <li class="nav-item{{ $activePage == 'sfiaRoleUser' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('sfiaRoleUser.index') }}">
                <i class="material-icons">content_paste</i>
                  <p>{{ __('Assign Role-Users') }}</p>
              </a>
            </li>

          </ul>
        </div>
      </li>

     





        
      <li class="nav-item {{ ($activePage == 'assessment') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#assessment" aria-expanded="{{ ($activePage == 'assessment') ? ' true' : 'false' }}">
          <i><img style="width:24px" src="{{asset('backend')}}/img/sidebar-menu-icons/clipboard.png"></i>
          <p>{{ __('Assessments') }}
            <b class="caret"></b>
          </p>
        </a>

        @php
            $assessmentTypes = \App\Models\AssessmentType::all();
        @endphp

          <div class="collapse {{ ($activePage == 'assessment') ? ' show' : '' }}" id="assessment">
            <ul class="nav">
              @foreach ($assessmentTypes as $item)
              <li class="nav-item {{ $titlePage == $item->name ? ' active' : '' }}">
                <a class="nav-link" href="{{ URL::to('assessment-type', $item->id) }}">
                   <i class="material-icons">content_paste</i>
                  <span class="sidebar-normal"> {{$item->name}} </span>
                </a>
              </li>
              @endforeach


              <li class="nav-item {{ $titlePage == "BIA" ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('bia.index') }}">
                   <i class="material-icons">content_paste</i>
                  <span class="sidebar-normal"> BIA </span>
                </a>
              </li>

              <li class="nav-item {{ $titlePage == "SFIA" ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('sfia.index') }}">
                   <i class="material-icons">content_paste</i>
                  <span class="sidebar-normal"> SFIA </span>
                </a>
              </li>


            </ul>
          </div>

      

      </li>




    </ul>
  </div>
</div>
