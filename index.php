<?
  include_once "include/db.php";
  session_start();
  if (isset($_POST['ok'])) {
    $login=$_POST['login'];
    $parol=md5($_POST['parol']);
    $surov=mysql_query("SELECT * from user where login='$login' and parol='$parol'");
    if (mysql_num_rows($surov)==1) {
      $row=mysql_fetch_assoc($surov);
      $_SESSION['rol']=$row['rol'];
      $_SESSION['fam']=$row['fam'];
      $_SESSION['ism']=$row['ism'];
      $_SESSION['id']=$row['id'];
      $_SESSION['fak_id']=$row['fak_id'];
      if ($_SESSION['rol']=='admin') {
        print("<script>window.location='admin/index.php'</script>");
      }
      else if ($_SESSION['rol']=='user') {
        $fak_id=$row['fak_id'];
        $fak=mysql_query("SELECT * from fakultet where id='$fak_id'");
        $fakultet=mysql_fetch_assoc($fak);
        $_SESSION['fak_name']=$fakultet['name'];
        print("<script>window.location='teacher/teacher.php'</script>");
      }
    }else{
      $error="Login yoki parol xato";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="images/2.png" alt="logo">
              </div>
              <h4>Kirish</h4>
              <h6 class="font-weight-light">Davom eting</h6>
              <form class="pt-3" method="post" action="index.php">
                <div class="popover-static-demo">
                <p style="color: red"><b><?=$error?></b></p>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1"  required="" name="login">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" required="" name="parol">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="ok">KIRISH</button>
                </div>                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <? include_once "include/js.php" ?>
  <!-- endinject -->
</body>
</html>
