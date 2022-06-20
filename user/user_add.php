<? 
  session_start();
  if ($_SESSION['rol']!="admin") {
    print("<script>window.location='../logout.php'</script>");
  }
?>
<? include_once "../include/db.php"; ?>
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
      if (isset($_POST['ok'])) {          
        $i=0;
        $fa=trim($_POST['fam']);
        $fam=filter($_POST['fam']);
        $is=trim($_POST['ism']);
        $ism=filter($_POST['ism']);
        $shar=trim($_POST['sharif']);
        $sharif=filter($_POST['sharif']);
        $fak_id=filter($_POST['fak_id']);
        $log=trim($_POST['login']);
        $login=filter($_POST['login']);
        $par=trim($_POST['parol']);
        $parol=md5(trim($_POST['parol']));
        $tel=trim($_POST['tel']);
        if (preg_match("/^[a-z`'ʼ]{5,}$/i", $fa)) {
          $i++;
        } else {
          $erfam="5 ta belgidan kam bo'lmagan FAMILYA kiriting";
        }
        if (preg_match("/^[a-z`'ʼ]{3,}$/i", $is)) {
          $i++;
        } else {
          $erism="3 ta belgidan kam bo'lmagan ISM kiriting";
        }
        if (preg_match("/^[a-z `'ʼ]{8,}$/i", $shar) and !empty($sharif)) {
          $i++;
        } else {
          $ersharif="8 ta belgidan kam bo'lmasin";
        }
        $test=mysql_query("SELECT * from fakultet where id='$fak_id'");
        if (mysql_num_rows($test)==1) {
          $i++;
        } else {
          $erfak="Fakultetni tanlang";
        }
        $test=mysql_query("SELECT * from user where fam='$fam' and ism='$ism' and sharif='$sharif'");
        if (mysql_num_rows($test)==0) {
          $i++;
        } else {
          $ertest="Ushbu I.F.O avval ro'yxatdan o'tgan iltimos qaytadan urinib ko'ring!";
        }
        if (preg_match("/^\+[0-9]{12,12}$/", $tel)) {
          $test=mysql_query("SELECT * from user where tel='$tel'");
          if (mysql_num_rows($test)==0) {
            $i++;
          } else {
            $ertel="Raqamni qayta kiriting";
          }
        } else {
          $ertel=" Telefon raqamni to'g'ri kiriting";
        }
        if (strlen($log)>=5) {
          $test=mysql_query("SELECT * from user where login='$login'");
          if (mysql_num_rows($test)==0) {
            $i++;
          } else {
            $erlogin="Loginni qayta kiriting";
          }            
        } else {
          $erlogin="5 ta belgidan kam bo'lmagan login kiriting";
        }
        if (strlen($par)>=5) {
          $test1=mysql_query("SELECT * from user where parol='$parol'");
          if (mysql_num_rows($test1)==0) {
            $i++;
          } else {
            $erparol="Parolni qayta kiriting";
          } 
        } else {
          $erparol="5 ta belgidan kam bo'lmagan parol kiriting";
        }
        if ($i==8) {
          $surov=mysql_query("INSERT into user(fam, ism, sharif, tel, login, parol, rol, fak_id) values('$fam', '$ism', '$sharif', '$tel', '$login', '$parol', 'user', '$fak_id')");
          if ($surov) {
            print("<script>window.alert('Yangi admin qo\'shdingiz!!!')</script>");
            print("<script>window.location='user_view.php'</script>");
          } else {
            print("<script>window.alert('XATOLIK: qaytadan o\'rinib ko\'ring')</script>");
          }            
        }
      }
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <? include_once "../include/menu_admin.php"; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              O'qituvchi o'z fakulteti uchun mas'ul shaxs
            </h3>
          </div>
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="">O'qituvchi qo'shish</h5>
                  <span style="color: red;"><?=$ertest?></span>
                  <form class="cmxform" id="signupForm" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label>Familiyasi</label>
                        <input type="text" class="form-control form-control-lg" name="fam" value="<?=$fa?>" placeholder="Familiyasi" required>
                        <span style="color: red;"><?=$erfam?></span>
                      </div>
                      <div class="form-group">
                        <label>Ismi</label>
                        <input type="text" class="form-control form-control-lg" name="ism" value="<?=$is?>" placeholder="Ismi" required>
                        <span style="color: red;"><?=$erism?></span>
                      </div>
                      <div class="form-group">
                        <label>Otasining ismi</label>
                        <input type="text" class="form-control form-control-lg" name="sharif" value="<?=$shar?>" placeholder="Otasining ismi" required>
                        <span style="color: red;"><?=$ersharif?></span>
                      </div>
                      <div class="form-group">
                        <label>Telefon raqami</label>
                        <input type="tel" class="form-control form-control-lg" name="tel" value="<?=$tel?>" required>
                        <span style="color: red;"><?=$ertel?></span>
                      </div>
                      <div class="form-group">
                        <label>Fakultetni tanlang</label>
                        <select class="js-example-basic-single w-100" name="fak_id" required="">
                          <option value="-1">--Tanlang--</option>
                          <?
                            $surov=mysql_query("SELECT * from fakultet order by name asc");
                            $m=0;
                            while ($row=mysql_fetch_assoc($surov)){
                              $m++;
                              if ($_POST[fak_id]==$row['id']) {
                                print("<option selected value='$row[id]'>$m:&nbsp;&nbsp; $row[name]</option>");
                              } else{
                                print("<option value='$row[id]'>$m:&nbsp;&nbsp; $row[name]</option>");
                              }
                            }                                  
                          ?>
                        </select>
                        <span style="color: red;"><?=$erfak?></span>
                      </div>
                      <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control form-control-lg" name="login" value="<?=$log?>" required="">
                        <span style="color: red;"><?=$erlogin?></span>
                      </div>
                      <div class="form-group">
                        <label>Parol</label>
                        <input type="password" class="form-control form-control-lg" name="parol" value="<?=$par?>" required="">
                        <span style="color: red;"><?=$erparol?></span>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="ok">Yuklash</button>
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
