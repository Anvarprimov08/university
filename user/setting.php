<? 
  session_start();
  if ($_SESSION['rol']!="admin" and $_SESSION['rol']!="user") {
    print("<script>window.location='../logout.php'</script>");
  }
  $id=$_SESSION['id'];
?>
<? include_once "../include/db.php" ?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
</head>
<body class="sidebar-fixed">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <? include_once "../include/navbar.php"; ?>
    <!-- partial -->
    <?
      $surov=mysql_query("SELECT * from user where id='$id'");
      $row=mysql_fetch_assoc($surov);        
      $fa=$row['fam'];
      $is=$row['ism'];
      $shar=$row['sharif'];
      $tel=$row['tel'];
      $log=$row['login'];
    ?>
    <?   
      if (isset($_POST['ok'])) {
        $i=0;
        $fa=trim($_POST['fam']);
        $fam=filter($_POST['fam']);
        $is=trim($_POST['ism']);
        $ism=filter($_POST['ism']);
        $shar=trim($_POST['sharif']);
        $sharif=filter($_POST['sharif']);
        $tel=trim($_POST['tel']);
        $log=trim($_POST['login']);
        $login=filter($_POST['login']);
        $apar=$_POST['aparol'];
        $aparol=md5($_POST['aparol']);
        $par=$_POST['parol'];
        $tpar=$_POST['tparol'];
        $parol=md5(trim($_POST['parol']));
        if (preg_match("/^[a-z`'ʼ]{5,}$/i", $fa)) {
          $i++;
        } else {
          $erfam="5 ta belgidan kam bo'lmagan FAMILiYA kiriting";
        }
        if (preg_match("/^[a-z`'ʼ]{3,}$/i", $is)) {
          $i++;
        } else {
          $erism="3 ta belgidan kam bo'lmagan ISM kiriting";
        }
        if (preg_match("/^[a-z `'ʼ]{8,}$/i", $shar) and !empty($sharif)) {
          $i++;
        } else {
          $ersharif="8 ta belgidan kam bo'lmagan OTANGIZNING ISMIni kiriting";
        }
        $test=mysql_query("SELECT * from user where fam='$fam' and ism='$ism' and sharif='$sharif'");
        if (mysql_num_rows($test)==0 or $row['fam']==$fa and $row['ism']==$is and $row['sharif']==$shar) {
          $i++;
        } else {
          $ertest="Ushbu I.F.O avval ro'yxatdan o'tgan iltimos qaytadan urinib ko'ring!";
        }    
        if (preg_match("/^\+[0-9]{12,12}$/", $tel)) {
          $test=mysql_query("SELECT * from user where tel='$tel'");
          if (mysql_num_rows($test)==0 or $row['tel']==$tel) {
            $i++;
          } else {
            $ertel="Ushbu raqam avval ro'yxatdan o'tgan iltimos qaytadan urinib ko'ring!";
          }
        } else {
          $ertel=" Telefon raqamingizni to'g'ri kiriting";
        }
        if (strlen($log)>=5) {
          $test=mysql_query("SELECT * from user where login='$login'");
          if (mysql_num_rows($test)==0 or $login==$row['login']) {
            $i++;
          } else {
            $erlog="Loginni qayta kiriting";
          }            
        } else {
          $erlog="5 ta belgidan kam bo'lmagan login kiriting";
        }
        if ($aparol==$row['parol']) {
          if (strlen($par)>=5) {
            $test=mysql_query("SELECT * from user where parol='$parol'");
            if (mysql_num_rows($test)==0 or $parol==$row['parol']) {
              if ($par==$tpar) {
                $i++;
              } else {
                $ertpar="Takroriy parol xato";
              }              
            } else {
              $erpar="Parolni qayta kiriting";
            } 
          } else {
            $erpar="5 ta belgidan kam bo'lmagan parol kiriting";
          }
        } else {
          $erapar=" Amaldagi parolni noto'g'ri kiritdingiz";
        }
        if ($i==7) {
          $surov=mysql_query("UPDATE user set fam='$fam', ism='$ism', sharif='$sharif', tel='$tel', login='$login', parol='$parol' where id='$id' ");
          if ($surov) {
            $_SESSION['fam']=$fam;
            $_SESSION['ism']=$ism;
            $_SESSION['sharif']=$sharif;
            print("<script>window.alert('Bajarildi!!!')</script>");
            if ($_SESSION['rol']=="admin") {
              print("<script>window.location='../admin/index.php'</script>");
            } else {
              print("<script>window.location='../teacher/teacher.php'</script>");
            }            
          } else {
            print("<script>window.alert('Xatolik')</script>");
          }            
        }
      }
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php if ($_SESSION['rol']=="admin"): ?>
        <? include_once "../include/menu_admin.php"; ?>
      <?php endif ?>
      <?php if ($_SESSION['rol']=="user"): ?>
        <? include_once "../include/menu_teach.php"; ?>
      <?php endif ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Shaxsiy ma'lumotlarini tahrirlang
            </h3>
          </div>
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="">Login va parolni yodda saqlab qoling</h5>
                  <p style="color: red;"><?=$ertest?></p>
                  <form class="cmxform" id="signupForm" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label for="fam">Familyangiz</label>
                        <input id="fam" class="form-control" name="fam" type="text" value="<?=$fa?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$erfam?></span>
                      </div>
                      <div class="form-group">
                        <label for="ism">Ismingiz</label>
                        <input id="ism" class="form-control" name="ism" type="text" value="<?=$is?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$erism?></span>
                      </div>
                      <div class="form-group">
                        <label for="sharif">Otangizning ismi</label>
                        <input id="sharif" class="form-control" name="sharif" type="text" value="<?=$shar?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$ersharif?></span>
                      </div>
                      <div class="form-group">
                        <label for="tel">Telefon raqamingiz</label>
                        <input id="tel" class="form-control" name="tel" type="text" value="<?=$tel?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$ertel?></span>
                      </div>
                      <div class="form-group">
                        <label for="login">Login</label>
                        <input id="login" class="form-control" name="login" type="text" value="<?=$log?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$erlog?></span>
                      </div>
                      <div class="form-group">
                        <label for="aparol">Amaldagi parol</label>
                        <input id="aparol" class="form-control" name="aparol" type="password" value="<?=$apar?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$erapar?></span>
                      </div>
                      <div class="form-group">
                        <label for="parol">Yangi parol</label>
                        <input id="parol" class="form-control" name="parol" type="password" value="<?=$par?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$erpar?></span>
                      </div>
                      <div class="form-group">
                        <label for="tparol">Yangi parolni takrorlang</label>
                        <input id="tparol" class="form-control" name="tparol" type="password" value="<?=$tpar?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$ertpar?></span>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="ok">O'zgartirish</button>
                      <button class="btn btn-light" type="reset">Tozalash</button>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial:partials/_footer.html -->
        <? include_once "../include/footer.php"; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<? include_once "../include/js.php"; ?>
</body>
</html>
