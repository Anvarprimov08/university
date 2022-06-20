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
                  <?
                    if ($_SESSION['rol']=='admin') {
                      echo "Nazoratchi";
                    } else {
                      echo "O'qituvchi";
                    }
                  ?>
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../teacher/teacher.php">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Bosh sahifa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#guruh" aria-expanded="false" aria-controls="guruh"><i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Guruhlar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="guruh">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-lg-block"><a class="nav-link" href="../teacher/guruh.php">Guruhlar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../teacher/guruh_add.php">Guruh qo'shish</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#talaba_add" aria-expanded="false" aria-controls="talaba_add"><i class="fa fa-graduation-cap menu-icon"></i>
              <span class="menu-title">Talaba qo'shish</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="talaba_add">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-lg-block"><a class="nav-link" href="../talaba/excel_import.php">Exceldan yuklash</a></li>
                <li class="nav-item"> <a class="nav-link" href="../talaba/talaba_add.php">Alohida kiritish</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#talaba" aria-expanded="false" aria-controls="talaba"><i class="far fa-file-excel menu-icon"></i>
              <span class="menu-title">Ma'lumotlar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="talaba">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item  d-lg-block"><a class="nav-link" href="../talaba/talaba_view.php"> Ma'lumotlarni ko'rish</a></li>
                <li class="nav-item"> <a class="nav-link" href="../talaba/sort.php"> Saralab ko'rish</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>