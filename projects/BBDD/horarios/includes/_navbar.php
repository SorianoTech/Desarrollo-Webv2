<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="empleados.php"><img src="../images/<?echo $_COOKIE['empresa']?>.png" alt="logo"></a>
        <a class="navbar-brand brand-logo-mini" href="post.php"><img src=""
            alt="logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block align-self-center mr-2" type="button"
          data-toggle="minimize">
          <span class="icon-list icons"></span>
        </button>
        <p class="page-name d-none d-lg-block"><? echo $nombre_empresa?></p>
        <ul class="navbar-nav ml-lg-auto">
          <li class="nav-item lang-dropdown d-none d-sm-block">
            <a class="nav-link" href="../includes/cerrar_session.php">
              <p class="mb-0">Cerrar Sesion <i class="icon-lock-open"></i></p>
            </a>
          <li class="nav-item lang-dropdown d-none d-sm-block">
            <a class="nav-link" href="#">
              <p class="mb-0">Español <i class="flag-icon flag-icon-es"></i></p>
            </a>
          </li>
          <!--<li class="nav-item d-none d-sm-block profile-img">
            <a class="nav-link profile-image" href="#">
              <img src="../../images/faces/face4.jpg" alt="profile-img">
              <span class="online-status online bg-success"></span>
            </a>
          </li>-->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center ml-auto" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu icons"></span>
        </button>
      </div>
    </nav>