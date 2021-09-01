<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admindashboard') }}" class="brand-link text-center">
      <span class="brand-text font-weight-light text-center">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admindashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fa fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-tree"></i>
                  <p>
                    Purchase
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.purchaseinfo.index') }}" class="nav-link">
                      <i class="fa fa-circle nav-icon"></i>
                      <p>Delar Purchase Company</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.srpurchasefromdelar.index') }}" class="nav-link">
                      <i class="fa fa-circle nav-icon"></i>
                      <p>SR Purchase From Delar</p>
                    </a>
                  </li>
                </ul>
              </li>
          <li class="nav-item">
            <a href="{{ route('admin.company.index') }}" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>Company</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.supplierinfo.index') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>Supplier</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.sales-representative.index') }}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>Sales Representative</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product-info.index') }}" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>Product Information</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.brandinfo.index') }}" class="nav-link">
              <i class="nav-icon fa fa-truck"></i>
              <p>Brand Info</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-chart-pie"></i>
              <p>
                Accounts
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.paymentmethod.index') }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Payment Method</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                Settings
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
