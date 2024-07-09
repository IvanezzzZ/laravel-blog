<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('person.main')}}" class="nav-link">
                        <p>Главная</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('person.liked.index')}}" class="nav-link">
                        <p>Понравившиеся посты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('person.comment.index')}}" class="nav-link">
                        <p>Комментарии</p>
                    </a>
                </li>
        </ul>
    </div>
    <!-- /.sidebar -->
  </aside>