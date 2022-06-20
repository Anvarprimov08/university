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
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <? include_once "../include/menu_teach.php"; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Excel faylidan talabalar ma'lumotlarini yuklash
            </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Yunalish, kurs va guruh raqamini tanlang</h4>
                  <form class="form-sample" method="post" onchange="submit()">
                    <p class="card-description">
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class=" col-form-label">Yunalishni tanlang</label>
                          <select class="js-example-basic-single w-100" name="yun_id" required="">
                            <option value="0">--Tanlang--</option>
                            <?
                              $kurs_id=$_POST['kurs_id'];
                              $surov=mysql_query("SELECT * from yunalish where fak_id='$fak_id' order by name asc");
                              while ($row=mysql_fetch_assoc($surov)){
                                $m++;
                                if ($_POST[yun_id]==$row['id']) {
                                  print("<option selected value='$row[id]'> $row[name]</option>");
                                } else{
                                  print("<option value='$row[id]'> $row[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Kursni tanlang</label>
                          <select class="js-example-basic-single w-100" name="kurs_id" required="">
                            <option value="">--Tanlang--</option>
                            <option value="1" <?php if ($kurs_id=='1')echo "selected"; ?> > 1-kurs </option>
                            <option value="2" <?php if ($kurs_id=='2')echo "selected"; ?> > 2-kurs </option>
                            <option value="3" <?php if ($kurs_id=='3')echo "selected"; ?> > 3-kurs </option>
                            <option value="4" <?php if ($kurs_id=='4')echo "selected"; ?> > 4-kurs </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Guruhni tanlang</label>
                          <select class="js-example-basic-single w-100" name="guruh_id" required="">
                            <option value="">--Tanlang--</option>
                            <?
                              $kurs_id=$_POST['kurs_id'];
                              $yun_id=$_POST['yun_id'];
                              $guruh_id=$_POST['guruh_id'];
                              $surov1=mysql_query("SELECT * from guruh where fak_id='$fak_id' and yun_id='$yun_id'and kurs_id='$kurs_id' order by name asc");
                              while ($row1=mysql_fetch_assoc($surov1)){
                                if ($_POST['guruh_id']==$row1['id']) {
                                  print("<option selected value='$row1[id]'> $row1[name]</option>");
                                } else{
                                  print("<option value='$row1[id]'> $row1[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                  <?php if (!empty($guruh_id) and !empty($kurs_id)): ?>
                    <form class="cmxform" id="signupForm" action="moslashtir.php" method="post" enctype="multipart/form-data">
                      <fieldset>
                        <div class="form-group">
                          <label>Excel faylni yuklang (.xlsx kengaytmali excel fayl )</label>
                          <input type="file" class="form-control form-control-lg" accept=".xlsx" name="file" required>
                          <input type="hidden" value="<?=$guruh_id?>" name="guruh_id">
                          <input type="hidden" value="<?=$kurs_id?>" name="kurs_id">
                          <input type="hidden" value="<?=$yun_id?>" name="yun_id">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" name="ok">Yuklash</button>
                        <button class="btn btn-light" type="reset">Tozalash</button>
                      </fieldset>
                    </form>
                  <?php endif ?>
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
