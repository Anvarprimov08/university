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
  <title>Fakultet</title>
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
      if (isset($_GET['del'])) {
        $del=$_GET['del']; 
        mysql_query("DELETE from talaba where guruh_id='$del'");  
        mysql_query("DELETE from guruh where id='$del'");   
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
              Guruhlari raqamini o'zgartirish yoki guruhlarni o'chirish
            </h3>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <h4 class="card-title">Ko'rish</h4>
                    <div class="form-group">
                      <label>Yunalishni tanlang</label>
                      <select class="js-example-basic-single w-100" name="yun_id" onchange="submit()">
                        <option value="0">--Tanlang--</option>
                        <?
                          $kurs_id=$_POST['kurs_id'];
                          $surov=mysql_query("SELECT * from yunalish where fak_id='$fak_id' order by name asc");
                          $m=0;
                          while ($row=mysql_fetch_assoc($surov)){
                            if ($_POST[yun_id]==$row['id']) {
                              $yun_name=$row[name];
                              print("<option selected value='$row[id]'>$row[name]</option>");
                            } else{
                              print("<option value='$row[id]'>$row[name]</option>");
                            }
                          }                                  
                        ?>
                      </select>
                    </div>
                    <input type="hidden" name="kurs_id" value="<?=$kurs_id?>">
                  </form>
                </div>
              </div>
            </div>
            <? if (isset($_POST['yun_id'])): 
              $yun_id=$_POST['yun_id'];
              $kurs_id=$_POST['kurs_id']; ?>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form method="post">
                      <h4 class="card-title">Kurs</h4>
                      <div class="form-group">
                        <label>Kursni tanlang</label>
                        <select class="form-control" name="kurs_id" onchange="submit()">
                          <option value="0">--Tanlang--</option>
                          <option value="1" <?php if ($kurs_id=='1')echo "selected"; ?> > 1-kurs </option>
                          <option value="2" <?php if ($kurs_id=='2')echo "selected"; ?> > 2-kurs </option>
                          <option value="3" <?php if ($kurs_id=='3')echo "selected"; ?> > 3-kurs </option>
                          <option value="4" <?php if ($kurs_id=='4')echo "selected"; ?> > 4-kurs </option>
                        </select>
                      </div>
                      <input type="hidden" name="yun_id" value="<?=$yun_id?>">
                    </form>
                  </div>
                </div>
              </div>
            <? endif; ?>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tanlangan yunalish va kurs bo'yicha guruhlar</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>№</th>                        
                          <th>Guruh raqami</th>
                          <th>Raqamini tahrirlash yoki guruhni o'chirish</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?
                          $doc=mysql_query("SELECT * from guruh where yun_id='$yun_id' and kurs_id='$kurs_id' and fak_id='$fak_id' order by name asc");
                          $i=0;
                          while ($row=mysql_fetch_assoc($doc)): $i++; ?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$row['name']?></td>
                              <td>
                                <button type="button" onclick="if(confirm('Guruh ma\'lumotlarini o\'zgartirmoqchimisiz'))window.location.href='edit.php?id=<?=$row[id]?>'" class="btn btn-outline-primary btn-icon-text"><i class="fa fa-edit btn-icon-prepend">  Raqmini tahrirlash</i></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" onclick="if(confirm('Guruhni o\'chirsangiz, guruhdagi barcha talabalarning ma\'lumotlari o\'chiriladi'))window.location.href='guruh.php?del=<?=$row[id]?>'" class="btn btn-outline-danger btn-icon-text"><i class="fas fa-trash btn-icon-prepend">  O'chirish</i></button>
                              </td>
                            </tr>
                          <? endwhile; ?>
                      </tbody>
                    </table>
                  </div>
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