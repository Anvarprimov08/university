<? 
  session_start();
  if ($_SESSION['rol']!="user" and !isset($_POST['ok'])) {
    print("<script>window.location='../logout.php'</script>");
  }
  $fak_id=$_SESSION['fak_id'];
?>
<? include_once "../include/db.php" ?>
<? include_once "../include/PHPexcel.php" ?>
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
    <?php 
      $arr=[];
      $yul=$_FILES['file']['tmp_name'];
      $rows=SimpleXLSX::parse($yul);
      foreach ($rows->rows() as $row) {
        $arr[]=$row;
      }
      $_SESSION[arr]=$arr;
      $kurs_id=$_POST['kurs_id'];
      $yun_id=$_POST['yun_id'];
      $guruh_id=$_POST['guruh_id'];
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <? include_once "../include/menu_teach.php"; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Talabalarning tumani, imtiyoz va yutuqlarini tanlang
            </h3>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h5 class=""></h5>
                  <form method="post" action="insert.php">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>№</th>
                            <th>Talaba</th>
                            <th>Tuman</th>
                            <th>Imtiyoz</th>
                            <th>Yutuq</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                            for ($i=1; $i < count($arr); $i++): ?>
                              <tr>
                                <td><?=$i?></td>
                                <td><?=$arr[$i][0]?> <?=$arr[$i][1]?></td>
                                <td>
                                  <label class=""><?=$arr[$i][9]?></label><br>
                                  <select class="js-example-basic-single w-100" name="tuman_id<?=$i?>" required="">
                                    <option value="">--Tanlang--</option>
                                    <?
                                      $vid=$arr[$i]['8'];
                                      $surov1=mysql_query("SELECT * from tuman where vid='$vid' order by name asc");
                                      while ($row1=mysql_fetch_assoc($surov1)){
                                        print("<option value='$row1[id]'> $row1[name]</option>");
                                      }                                  
                                    ?>
                                  </select>
                                </td>
                                <td>
                                  <?php if (!empty($arr[$i][16])): ?>
                                    <label class=""><?=$arr[$i][16]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
                                    <select class="js-example-basic-single w-100" name="imtiyoz_id<?=$i?>" required="">
                                      <option value="0">Yo'q</option>
                                      <?
                                        $surov2=mysql_query("SELECT * from imtiyoz order by name asc");
                                        while ($row2=mysql_fetch_assoc($surov2)){
                                          print("<option value='$row2[id]'> $row2[name]</option>");
                                        }                                  
                                      ?>
                                    </select>
                                  <?php endif ?>
                                </td>                                    
                                <td>
                                  <?php if (!empty($arr[$i][17])): ?>
                                    <label class=""><?=$arr[$i][17]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
                                    <select class="js-example-basic-single w-100" name="yutuq_id<?=$i?>" required="">
                                      <option value="0">Yo'q</option>
                                      <?
                                        $surov3=mysql_query("SELECT * from yutuq order by name asc");
                                        while ($row3=mysql_fetch_assoc($surov3)){
                                          print("<option value='$row3[id]'> $row3[name]</option>");
                                        }                                  
                                      ?>
                                    </select>
                                  <?php endif ?>
                                </td>
                              </tr>
                            <? endfor; ?>
                        </tbody>
                      </table>
                      <div class="form-group">
                        <input type="hidden" value="<?=$guruh_id?>" name="guruh_id">
                        <input type="hidden" value="<?=$kurs_id?>" name="kurs_id">
                        <input type="hidden" value="<?=$yun_id?>" name="yun_id">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="ok">Yuklash</button>
                      <button class="btn btn-light" type="reset">Tozalash</button>
                    </div>
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
