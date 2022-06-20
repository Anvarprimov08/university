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
      if (isset($_POST['ok'])) {          
        $i=0;
        $name=$_POST['name'];
        $yun_id=$_POST['yun_id'];
        $kurs_id=$_POST['kurs_id'];
        if (preg_match("/^[0-9]{3,3}$/", $name)) {
          $test=mysql_query("SELECT * from guruh where name='$name' and fak_id='$fak_id'");
          if (mysql_num_rows($test)==0) {
            $i++;
          } else {
            $ername="Ushbu guruh avval ro'yxatdan o'tgan iltimos qaytadan urinib ko'ring!";
          }
        } else {
          $ername=" Guruh raqamingizni to'g'ri kiriting";
        }
        $test=mysql_query("SELECT * from yunalish where id='$yun_id' and fak_id='$fak_id'");
        if (mysql_num_rows($test)==1) {
          $i++;
        } else {
          $eryun="Yunalishni tanlang";
        }
        if ($kurs_id=='1' or $kurs_id=='2' or $kurs_id=='3' or $kurs_id=='4') {
          $i++;
        } else {
          $erkurs="Kursni tanlang";
        }
        if ($i==3) {
          $surov=mysql_query("INSERT into guruh(name, yun_id, kurs_id, fak_id) values('$name', '$yun_id', '$kurs_id', '$fak_id')");
          if ($surov) {
            print("<script>window.alert('Bajarildi')</script>");
            print("<script>window.location='guruh_add.php'</script>");
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
              Yangi guruhlar qo'shish
            </h3>
          </div>
          <div class="row grid-margin">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="">Guruh qo'shish</h5>
                  <form class="cmxform" id="signupForm" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label>Yunalishni tanlang</label>
                        <select class="js-example-basic-single w-100" name="yun_id" required="">
                          <option value="">--Tanlang--</option>
                          <?
                            $surov=mysql_query("SELECT * from yunalish where fak_id='$fak_id' order by name asc");
                            while ($row=mysql_fetch_assoc($surov)){
                              if ($_POST[yun_id]==$row['id']) {
                                print("<option selected value='$row[id]'> $row[name]</option>");
                              } else{
                                print("<option value='$row[id]'> $row[name]</option>");
                              }
                            }                                  
                          ?>
                        </select>
                        <span style="color: red;"><?=$eryun?></span>
                      </div>
                      <div class="form-group">
                        <label>Kursni tanlang</label>
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
                        <label>Guruh raqami</label>
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
