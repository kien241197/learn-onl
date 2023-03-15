  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('public/image/AdminLTELogo.png') }}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">WEB SIM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->level == \App\Enums\UserRole::ADMIN)
          <img src="{{ asset('public/image/admin.jpg') }}" class="img-circle elevation-2" alt="Admin Image">
          @else 
          <img src="{{ asset('public/image/ctv.jpg') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{ route('admin.info') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.sim-cards.index') }}" class="nav-link {{ (request()->is('admin/sim-cards*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                SIM SỐ ĐẸP
              </p>
            </a>
          </li>
          @if(Auth::user()->level == \App\Enums\UserRole::ADMIN)
          <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ (request()->is('admin/users*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Đại lý
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.group-packs.index') }}" class="nav-link {{ (request()->is('admin/group-packs*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-sitemap"></i>
              <p>
                Nhóm gói cước
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->is('admin/packs*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/packs*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Gói cước
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.packs.index', App\Enums\NetworkService::VIETTEL) }}" class="nav-link {{ (request()->is('admin/packs/'.App\Enums\NetworkService::VIETTEL.'*')) ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>VIETTEL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.packs.index', App\Enums\NetworkService::VINA) }}" class="nav-link {{ (request()->is('admin/packs/'.App\Enums\NetworkService::VINA.'*')) ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>VINA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.packs.index', App\Enums\NetworkService::MOBI) }}" class="nav-link {{ (request()->is('admin/packs/'.App\Enums\NetworkService::MOBI.'*')) ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>MOBI</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-copy"></i>
              <p>
                Đơn hàng
                <i class="right fa fa-angle-left"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Số đẹp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Sim mạng</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                WEB SITE - Thanh toán
                <i class="fafa-angle-left right"></i>
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>