  @php
  use App\Models\Comment;

  $count = Comment::whereHas('lesson')->whereHas('user')->where([
    ['type', 2],
    ['seen', 0],
  ])->count();
  @endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('image/AdminLTELogo.png') }}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">VIDEO COURSES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('image/admin.jpg') }}" class="img-circle elevation-2" alt="Admin Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.courses.index') }}" class="nav-link {{ (request()->is('admin/courses*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                KHÓA HỌC
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ (request()->is('admin/users*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                KHÁCH HÀNG
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-sitemap"></i>
              <p>
                THỂ LOẠI
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                THỐNG KÊ GIAO DỊCH
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.comments.index') }}" class="nav-link {{ (request()->is('admin/comments*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-copy"></i>
              <p>
                REPLY COMMENT
                @if($count > 0)
                <span class="badge badge-info right">{{ $count }}</span>
                @endif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.tags.index') }}" class="nav-link {{ (request()->is('admin/tags*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-book"></i>
              <p>
                THẺ TÌM KIẾM
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ (request()->is('admin/contacts*')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-phone"></i>
              <p>
                ĐĂNG KÝ TƯ VẤN
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.info.show') }}" class="nav-link {{ (request()->is('admin/info-page')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                GIAO DIỆN TÙY CHỈNH
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.pageOther.show') }}" class="nav-link {{ (request()->is('admin/info-page-other')) ? 'active' : '' }}">
              <!-- <i class="nav-icon fa fa-edit-book"></i> -->
              <p>
                ĐIỀU KHOẢN / CHÍNH SÁCH 
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>