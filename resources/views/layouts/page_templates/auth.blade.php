<div class="wrapper ">
  @include('layouts.navbars.sidebar')
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')

    {{-- <div id="ph3-loader">
      <div class="loading">Loading&#8230;</div>
    </div> --}}
    
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>