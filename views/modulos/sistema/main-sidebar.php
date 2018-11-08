<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://cdn.icon-icons.com/icons2/827/PNG/512/user_icon-icons.com_66546.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nombre"];?></p>
          <!-- Estado Usuario -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" >
        <li class="header">Menú</li>
  
        <li class="treeview">
                <a href="home">
                    <img src="views/dist/img/iconos/resumen.png" style="width: 25px;">
                    <span>Home</span>
                    <span class="pull-right-container">
                        <i class="fa fa-link"></i>
                    </span>
                </a>
            </li>
            <ul></ul>
    

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>