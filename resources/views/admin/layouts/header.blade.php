<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fa fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fa fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link " data-toggle="dropdown" href="#">
           <span style="color:green"> {{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-user mr-2"></i>Profile
          </a>
          <a  class="dropdown-item"
          title="Log Out" onclick="event.preventDefault();
           document.getElementById('logout-form').submit();"><i class="fa fa-trash" aria-hidden="true"></i>
</i>Log Out</a>
           <form action="{{ route('logout') }}" id="logout-form" method="POST">
               @csrf

           </form>
          @php
              $user = App\Models\User::find(1);
          @endphp
    @forelse ($user->unreadNotifications as $notification)
    <a class="dropdown-item" href="">{{ $notification->data['message'] }}</a>
    @empty
    <a class="dropdown-item" href="javascript:void(0)">No notification available</a>
    @endforelse
    <a id="no-notification-available" class="dropdown-item text-right" href="">Clear</a>


          <div class="dropdown-divider"></div>





        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fa fa-arrows"></i>
        </a>
      </li>

    </ul>
  </nav>
