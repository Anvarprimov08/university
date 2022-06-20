<? 
  session_start();
  if ($_SESSION['rol']!="user") {
    print("<script>window.location='../logout.php'</script>");
  }
  $fak_id=$_SESSION['fak_id'];
  $fak_name=$_SESSION['fak_name'];
?>
<? include_once "../include/db.php" ?>
<? //include_once "../Classes/PHPExcel.php" ?>
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
      if (isset($_GET['del'])) {
        $del=$_GET['del'];
        $del=mysql_query("DELETE from talaba where id='$del' and id='$del'and fak_id='$fak_id'");   
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
              Talabalarning to'liq ma'lumotlari
            </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Yunalish, kurs va guruh raqamini tanlang</h4>
                  <form class="form-sample" method="post"  onchange="submit()">
                    <p class="card-description">
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class=" col-form-label">Yunalishni tanlang</label>
                          <select class="js-example-basic-single w-100" name="yun_id" >
                            <option value="0">--Tanlang--</option>
                            <?
                              $kurs_id=$_POST['kurs_id'];
                              $surov=mysql_query("SELECT * from yunalish where fak_id='$fak_id' order by name asc");
                              while ($row=mysql_fetch_assoc($surov)){
                                if ($_POST[yun_id]==$row['id']) {
                                  $yun_name=$row[name];
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
                          <select class="js-example-basic-single w-100" name="kurs_id">
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
                          <select class="js-example-basic-single w-100" name="guruh_id" >
                            <option value="">--Tanlang--</option>
                            <?
                              $kurs_id=$_POST['kurs_id'];
                              $yun_id=$_POST['yun_id'];
                              $guruh_id=$_POST['guruh_id'];
                              $surov1=mysql_query("SELECT * from guruh where fak_id='$fak_id' and yun_id='$yun_id'and kurs_id='$kurs_id' order by name asc");
                              $m=0;
                              while ($row1=mysql_fetch_assoc($surov1)){
                                if ($_POST['guruh_id']==$row1['id']) {
                                  $guruh_name=$row1[name];
                                  print("<option selected value='$row1[id]'>$row1[name]</option>");
                                } else{
                                  print("<option value='$row1[id]'>$row1[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"><!-- card-title -->                  
                  <?php if (!empty($_POST['guruh_id'])): ?>
                    <h4 class="display-5">
                      Tanlangan yunalish , kurs va guruh bo'yicha talabalar
                      <form method="post" action="excel_upload.php" style="float: right">
                        <input type="hidden" name="guruh_name" value="<?=$guruh_name?>">
                        <input type="hidden" name="guruh_id" value="<?=$guruh_id?>">
                        <button type="submit" class="btn btn-danger btn-lg" name="excel_upload"><i class="fas fa-cloud-upload-alt"></i> Yuklash</button>
                      </form>
                    </h4>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>№</th>                        
                            <th>F.I.O va telefon raqam</th>
                            <th>Millati</th>
                            <th>Tug'ilganligi</th>
                            <th>Pasport ma'lumotlari</th>
                            <th>Grand sharnoma</th>
                            <th>Yashash manzil</th>
                            <th>Ijara manzil</th>
                            <th>Otasi</th>                          
                            <th>Onasi</th>                          
                            <th>Oilali oilasiz</th>                          
                            <th>Qayerda turishi</th>
                            <th>Chin yetimlik</th>
                            <th>Temir daftar</th>
                            <th>Nogironligi</th>
                            <th>Imtiyozlari</th>
                            <th>Yutuqlari</th>
                            <th>Tahrirlash<br>yoki<br>O'chirish</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                            $talab=mysql_query("SELECT * from talaba where yun_id='$yun_id' and kurs_id='$kurs_id' and fak_id='$fak_id' and guruh_id='$guruh_id' order by fam asc");
                            $i=0;
                            while ($mal=mysql_fetch_assoc($talab)): $i++; ?>
                              <?
                                $vil_id=$mal['vil_id'];
                                $tuman_id=$mal['tuman_id'];
                                $yutuq_id=$mal['yutuq_id'];
                                $imtiyoz_id=$mal['imtiyoz_id'];
                                $vil=mysql_query("SELECT * from viloyat where id='$vil_id'");
                                $tum=mysql_query("SELECT * from tuman where id='$tuman_id'");
                                $yut=mysql_query("SELECT * from yutuq where id='$yutuq_id'");
                                $imt=mysql_query("SELECT * from imtiyoz where id='$imtiyoz_id'");
                                $viloyat=mysql_fetch_assoc($vil);
                                $tuman=mysql_fetch_assoc($tum);
                                $yutuq=mysql_fetch_assoc($yut);
                                $imtiyoz=mysql_fetch_assoc($imt);
                              ?>
                              <tr>
                                <td><?=$i?></td>
                                <td>
                                  <?=$mal['fam']?> 
                                  <?=$mal['ism']?> 
                                  <?=$mal['sharif']?>
                                  <?=$mal['tel']?>
                                </td>
                                <td>
                                  <?=$mal['millat']?>
                                </td>
                                <td><?=$mal['born']?></td>
                                <td><?=$mal['pasport']?></td>
                                <td><?=$mal['grand']?></td>
                                <td><?=$viloyat['name']?> v, <?=$tuman['name']?> t, <?=$mal['manzil']?></td>
                                <td><?=$mal['ijara_manzil']?></td>
                                <td>
                                  <?=$mal['otasi']?>
                                </td>                                  
                                <td>
                                  <?=$mal['onasi']?>
                                </td>
                                <td><?=$mal['oilaviy']?></td>
                                <td><?=$mal['turar_joy']?></td>
                                <td><? if($mal['yetimlik'])echo "Chin yetim" ?></td>
                                <td><? if($mal['temir_daftar'])echo "Turadi" ?></td>
                                <td><? if($mal['nogiron'])echo $mal['nogiron']; ?></td>
                                <td><?=$imtiyoz['name']?></td>
                                <td><?=$yutuq['name']?></td>
                                <td>
                                  <button type="button" onclick="if(confirm('Talaba ma\'lumotlarini o\'zgartirmoqchimisiz'))window.location.href='talaba_edit.php?id=<?=$mal[id]?>'" class="btn btn-outline-primary btn-icon-text"><i class="fa fa-edit btn-icon-prepend"> Tahrirlash</i></button><br>
                                  <button type="button" onclick="if(confirm('Talaba ma\'lumotlarini o\'chirmoqchimisiz'))window.location.href='talaba_view.php?del=<?=$mal[id]?>'" class="btn btn-outline-danger btn-icon-text"><i class="fas fa-trash btn-icon-prepend">&nbsp;&nbsp;&nbsp; O'chirish</i></button>
                                </td>
                              </tr>
                            <? endwhile; ?>
                        </tbody>
                      </table>
                    </div>
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
