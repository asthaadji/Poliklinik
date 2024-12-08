<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('pasien.dashboard')}}" class="nav-link" style="color: #ffffff;">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
      <li class="nav-item menu-open" >
        <a href="#" class="nav-link " style="color: #ffffff;">
            <i class="nav-icon fas fa-th"></i>
          <p>
            Master
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('pasien.periksa')}}" class="nav-link" style="color: #ffffff;">
              <i class="far fa-circle nav-icon"></i>
              <p>Daftar Periksa</p>
            </a>
          </li>
          
        </ul>
      </li>
      <li class="nav-item ">
        <form action="{{route('pasien.logout')}}" method="POST">
            @csrf
            <button class="btn btn-danger btn-block" type="submit">Logout</button>
        </form>
      </li>
    </ul>
  </nav>