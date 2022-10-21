<aside class="main-sidebar @yield('custom') sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('key.text')}}" class="brand-link">
      <img src="{{ asset('dist/img/nuce.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LocalHost</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/file.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">T.D.T</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Hoạt động</li>
          <li class="nav-item">
            <a href="{{ route('transfer.text')}}" class="nav-link @yield('text')"> 
              <i class="nav-icon fas fa-file"></i>
              <p>Phiên dịch</p>
            </a>
          </li>
          <li class="nav-item @yield('menu_paragraph')">
            <a href="#" class="nav-link @yield('nav_icon_paragraph')">
              <i class="nav-icon fas fa-thin fa-paragraph"></i>
              <p>
                Văn bản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('list')}}" class="nav-link @yield('list')">
                  <i class="nav-icon fas fa-thin fa-align-right"></i>
                  <p>Danh sách văn bản</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paragraph')}}" class="nav-link">
                  <i class="nav-icon fas fa-thin fa-pen"></i>
                  <p>Mẫu văn bản</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add.paragraph')}}" class="nav-link @yield('add.paragraph')">
                  <i class="nav-icon fas fa-thin fa-pen"></i>
                  <p>Thêm văn bản </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('edit.paragraph')}}" class="nav-link @yield('edit.paragraph.v1')">
                  <i class="nav-icon fas fa-thin fa-pen"></i>
                  <p>Sửa văn bản v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link @yield('')">
                  <i class="nav-icon fas fa-thin fa-pen"></i>
                  <p>Sửa văn bản v2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item @yield('tool_menu')">
            <a href="#" class="nav-link @yield('tool')">
              <i class="nav-icon fas fa-thin fa-paragraph"></i>
              <p>
                Tool Cào bài 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('implements')}}" class="nav-link @yield('caobai')">
                  <i class="nav-icon fas fa-thin fa-align-right"></i>
                  <p>Cào bài</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('caobai.searchlist')}}" class="nav-link @yield('key_manage')">
                  <i class="nav-icon fas fa-thin fa-pen"></i>
                  <p>Quản lý Key</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blacklist')}}" class="nav-link @yield('blacklist')">
                  <i class="nav-icon fas fa-thin fa-pen"></i>
                  <p>Danh sách đen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('key.text')}}" class="nav-link @yield('key')">
                  <i class="nav-icon fas fa-table"></i>
                  <p class="text">Danh sách Key</p>
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