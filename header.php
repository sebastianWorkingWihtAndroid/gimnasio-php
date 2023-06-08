
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="img/weightlifting.png" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">Kastyn</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Terceros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Terceros</h6>
            <a class="collapse-item" href="nuevotercero.php">Nuevo</a>
            <a class="collapse-item" href="ReportesTerceros.php">Reportes</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="facturacion.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;
          ">Facturacion </font></font></span></a>

        
      </li>

      <li class="nav-item">
        <a class="nav-link " href="asistencia.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;
          ">Asistencia </font></font></span></a>
        
        
      </li>


      <li class="nav-item">
        <a class="nav-link " href="gastos.php">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;
          ">Gastos </font></font></span></a>   
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Reportes" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-search"></i>
          <span>Reportes</span>
        </a>
        <div id="Reportes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Reportes</h6>
            <a class="collapse-item" href="estadoderesultado.php">Estado de Resultado</a>
            <a class="collapse-item" href="historicogasto.php">Historico de gastos</a>
            <a class="collapse-item" href="historicopago.php">Historico de pagos</a>
            <a class="collapse-item" href="historicoasistencia.php">Historico de asistencia</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="configuracion.php">
          <i class="fas fa-fw fa-cog"></i>
          <span><font style="vertical-align: inherit;"> <font style="vertical-align: inherit;
          ">Configuracion </font></font></span></a>   
      </li>



      <!-- Nav Item - Utilities Collapse Menu -->
      

     

      <!-- Nav Item - Pages Collapse Menu -->
      
      <!-- Nav Item - Charts -->
      

      <!-- Nav Item - Tables -->
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            

            <!-- Nav Item - Messages -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                <img class="img-profile rounded-circle" src="img/man.png " width="60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="cerrar.php" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>
        