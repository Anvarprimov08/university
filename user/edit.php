<? 
  session_start();
  if ($_SESSION['rol']!="admin") {
    print("<script>window.location='../logout.php'</script>");
  }
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
      if (isset($_GET['log'])) {
        $id=$_GET['log'];
      }
    ?>
    <?
      $surov=mysql_query("SELECT * from user where id='$id'");
      $row=mysql_fetch_assoc($surov);        
      $fa=$row['fam'];
      $is=$row['ism'];
      $shar=$row['sharif'];
      $tel=$row['tel'];
      $log=$row['login'];
      $fak_id=$row['fak_id'];
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
        $fak_id=trim($_POST['fak_id']);
        $log=trim($_POST['login']);
        $login=filter($_POST['login']);
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
          $ersharif="8 ta belgidan kam bo'lmagan OTASINING ISMIni kiriting";
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
        $test=mysql_query("SELECT * from fakultet where id='$fak_id'");
        if (mysql_num_rows($test)==1) {
          $i++;
        } else {
          $erjob="Fakultetni tanlang";
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
        if ($i==8) {
          $surov=mysql_query("UPDATE user set fam='$fam', ism='$ism', sharif='$sharif', tel='$tel', fak_id='$fak_id', login='$login', parol='$parol' where id='$id' ");
          if ($surov) {
            print("<script>window.alert('Foydalanuvchining ma\'lumotlari muvaffaqiyatli o\'zgartirildi!!!')</script>");
            if ($row['rol']=='admin') {
              print("<script>window.location='admin.php'</script>");
            } else {
              print("<script>window.location='user_view.php'</script>");
            }
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
              O'qituvchining shaxsiy ma'lumotlarini tahrirlang
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
                        <label for="fam">Familyasi</label>
                        <input id="fam" class="form-control" name="fam" type="text" value="<?=$fa?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$erfam?></span>
                      </div>
                      <div class="form-group">
                        <label for="ism">Ismi</label>
                        <input id="ism" class="form-control" name="ism" type="text" value="<?=$is?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$erism?></span>
                      </div>
                      <div class="form-group">
                        <label for="sharif">Otasining ismi</label>
                        <input id="sharif" class="form-control" name="sharif" type="text" value="<?=$shar?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$ersharif?></span>
                      </div>
                      <div class="form-group">
                        <label for="tel">Telefon raqami</label>
                        <input id="tel" class="form-control" name="tel" type="text" value="<?=$tel?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$ertel?></span>
                      </div>
                      <div class="form-group">
                        <label for="fak_id">Fakultet</label>
                        <select id="fak_id" class="js-example-basic-single w-100" name="fak_id" required="">
                          <option value="0">--Tanlang--</option>
                          <?
                            $surov=mysql_query("SELECT * from fakultet order by name asc");
                            $m=0;
                            while ($row=mysql_fetch_assoc($surov)){
                              $m++;
                              if ($fak_id==$row['id']) {
                                print("<option selected value='$row[id]'> $row[name]</option>");
                              } else{
                                print("<option value='$row[id]'> $row[name]</option>");
                              }
                            }                                  
                          ?>
                        </select>
                        <span style="color: red; font-size: 14px;"><?=$erjob?></span>
                      </div>
                      <div class="form-group">
                        <label for="login">Yangi login</label>
                        <input id="login" class="form-control" name="login" type="text" value="<?=$log?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$erlog?></span>
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
