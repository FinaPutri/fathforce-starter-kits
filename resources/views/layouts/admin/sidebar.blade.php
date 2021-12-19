<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('dashboard')}}">{{ env('APP_NAME') }}</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard')}}">{{ env('APP_AKA') }}</a>
          </div>
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{route('home')}}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> HomePage
            </a>
                <ul class="sidebar-menu">
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                    <li>
                            <li class="dropdown {{ request()->is('article-*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Article</span></a>
                            <ul class="dropdown-menu" style="display: none;">
                              <li class="{{ request()->is('article-post*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('article-posts.index') }}">Post</a></li>
                              <li class=""><a class="nav-link" href="/category">Category</a></li>
                            </ul>
                            </li>
                    </li>
                    <li><a class="nav-link" href="/galery"><i class="fas fa-image"></i> <span>Gallery</span></a></li>
                    <li><a class="nav-link" href="/user"><i class="fas fa-user"></i> <span>Manage User</span></a></li>
                    <li>
                            <li class="dropdown ">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Settings</span></a>
                            <ul class="dropdown-menu" style="display: none;">
                                <li class=""><a class="nav-link" href="/backup">Backup</a></li>
                                <li class=""><a class="nav-link" href="/import">Import</a></li>
                                <li class=""><a class="nav-link" href="/api">Rest API</a></li>
                                <li class=""><a class="nav-link" href="/modules">Modules</a></li>
                            </ul>
                            </li>
                    </li>
                    <li><a class="nav-link" href="/credit"><i class="fas fa-fire"></i> <span>Credits</span></a></li>
                </ul>
        </aside>
      </div>
