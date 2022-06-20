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
      if (isset($_GET['id'])) {
        $id=$_GET['id'];
      }
      $surov=mysql_query("SELECT * from yunalish where id='$id'");
      $row=mysql_fetch_assoc($surov);        
      $nam=$row['name'];
      $fak_id=$row['fak_id'];
    ?>
    <?   
      if (isset($_POST['ok'])) {
        $i=0;
        $nam=trim($_POST['name']);
        $name=filter($_POST['name']);
        if (preg_match("/^[a-z`'ʼ ]{5,}$/i", $nam)) {
          $i++;
        } else {
          $ername="5 ta belgidan kam bo'lmagan NOM kiriting";
        }
        $test=mysql_query("SELECT * from yunalish where name='$name' and fak_id='$fak_id'");
        if (mysql_num_rows($test)==0 or $row['name']==$nam and $row['fak_id']==$fak_id) {
          $i++;
        } else {
          $ertest="Ushbu NOM avval ro'yxatdan o'tgan iltimos qaytadan urinib ko'ring!";
        }
        if ($i==2) {
          $surov=mysql_query("UPDATE yunalish set name='$name' where id='$id'");
          if ($surov) {
            print("<script>window.alert('Bajarildi')</script>");
            print("<script>window.location='yunalish.php'</script>");
          } else {
            print("<script>window.alert('Xatolik')</script>");
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
              Yunalishlarning nomini tahrirlang
            </h3>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="">Yunalish nomini to'g'ri kiriting</h5>
                  <p style="color: red;"><?=$ertest?></p>
                  <form class="cmxform" id="signupForm" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label for="name"> Yunalish nomi</label>
                        <input id="name" class="form-control" name="name" type="text" value="<?=$nam?>" required="">
                        <span style="color: red; font-size: 14px;"><?=$ername?></span>
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
