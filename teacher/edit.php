<? 
  session_start();
  if ($_SESSION['rol']!="user") {
    print("<script>window.location='../logout.php'</script>");
  }
  $fak_id=$_SESSION['fak_id'];
  $fak_name=$_SESSION['fak_name'];
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
      if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $surov1=mysql_query("SELECT * from guruh where id='$id' and fak_id='$fak_id'");
        if (mysql_num_rows($surov1)==0) {
          print("<script>window.location='guruh.php'</script>");
        }else{
          $row=mysql_fetch_assoc($surov1);
          $name=$row['name'];
          $kurs_id=$row['kurs_id'];
        }
      }
    ?>
    <?
      if (isset($_POST['ok'])) {          
        $i=0;
        $name=$_POST['name'];
        $kurs_id=$_POST['kurs_id'];
        if (preg_match("/^[0-9]{3,3}$/", $name)) {
          $test=mysql_query("SELECT * from guruh where name='$name' and fak_id='$fak_id'");
          if (mysql_num_rows($test)==0 or $row['name']==$name) {
            $i++;
          } else {
            $ername="Ushbu guruh avval ro'yxatdan o'tgan iltimos qaytadan urinib ko'ring!";
          }
        } else {
          $ername=" Guruh raqamingizni to'g'ri kiriting";
        }
        if ($kurs_id=='1' or $kurs_id=='2' or $kurs_id=='3' or $kurs_id=='4') {
          $i++;
        } else {
          $erkurs="Kursni tanlang";
        }
        if ($i==2) {
          $surov1=mysql_query("UPDATE talaba set kurs_id='$kurs_id' where fak_id='$fak_id' and guruh_id='$id'");
          $surov=mysql_query("UPDATE guruh set name='$name', kurs_id='$kurs_id' where fak_id='$fak_id' and id='$id'");
          if ($surov) {
            print("<script>window.alert('Bajarildi')</script>");
            print("<script>window.location='guruh.php'</script>");
          } else {
            print("<script>window.alert('Xatolik')</script>");
          }            
        }
      }
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <? include_once "../include/menu_teach.php"; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Guruh yunalishi, kursini va raqamini o'zgartirish
            </h3>
          </div>
          <div class="row grid-margin">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="">Guruh ma'motlarini to'g'ri tahrirlang</h5>
                  <form class="cmxform" id="signupForm" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label>Kursni o'zgartiring</label>
                        <select class="form-control" name="kurs_id" required="">
                          <option value="">--Tanlang--</option>
                          <option value="1" <?php if ($kurs_id=='1')echo "selected"; ?> > 1-kurs </option>
                          <option value="2" <?php if ($kurs_id=='2')echo "selected"; ?> > 2-kurs </option>
                          <option value="3" <?php if ($kurs_id=='3')echo "selected"; ?> > 3-kurs </option>
                          <option value="4" <?php if ($kurs_id=='4')echo "selected"; ?> > 4-kurs </option>
                        </select>
                        <span style="color: red;"><?=$erkurs?></span>
                      </div>
                      <div class="form-group">
                        <label>Guruh ozgartiring</label>
                        <input type="number" class="form-control form-control-lg" name="name" value="<?=$name?>" placeholder="203" required>
                        <span style="color: red;"><?=$ername?></span>
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
