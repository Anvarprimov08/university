      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="../images/no-image.jpg" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  <?=$_SESSION['fam']?> <?=$_SESSION['ism']?>
                </p>
                <p class="designation">
                  Nazoratchi
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/index.php">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Bosh sahifa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/view1.php">
              <i class="fa fa-puzzle-piece menu-icon"></i>
              <span class="menu-title">Tumanlar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../fakultet/fakultet.php">
              <i class="fa fa-university menu-icon"></i>
              <span class="menu-title">Fakultetlar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../yunalish/yunalish.php">
              <i class="fa fa-arrows-alt menu-icon"></i>
              <span class="menu-title">Yunalishlar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../imtiyoz/imtiyoz.php">
              <i class="fa fa-star menu-icon"></i>
              <span class="menu-title">Imtiyozlar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../yutuq/yutuq.php">
              <i class="fa fa-trophy menu-icon"></i>
              <span class="menu-title">Yutuqlar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user"><i class="fa fa-user menu-icon"></i>
              <span class="menu-title">Nazoratchilar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-lg-block"><a class="nav-link" href="../user/admin.php"> Nazoratchilar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../user/admin_add.php">Nazoratchi qo'shish</a></li>
                <li class="nav-item"> <a class="nav-link" href="../user/user_view.php">O'qituvchilar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../user/user_add.php">O'qituvchi qo'shish</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sort" aria-expanded="false" aria-controls="sort"><i class="fa fa-graduation-cap menu-icon"></i>
              <span class="menu-title">Talabalar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sort">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-lg-block"><a class="nav-link" href="../admin/sort_by_admin.php"> Fakultetlar miqyosida</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>