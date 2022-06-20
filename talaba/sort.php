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
              Talabalarning ma'lumotlarini saralab olish
            </h3>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-3">
                        <p class="card-description">Turar joyi bo'yicha</p>
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="turar_joy" id="optionsRadios1" value="ijara" <? if ($_POST['turar_joy']=="ijara")echo "checked"; ?> >
                              Ijarada turuvchilar
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="turar_joy" id="optionsRadios2" value="yotoqxona" <? if ($_POST['turar_joy']=="yotoqxona")echo "checked"; ?> >
                              Talabalar yotoqxonasidagilar
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="turar_joy" id="optionsRadios3" value="qarindosh" <? if ($_POST['turar_joy']=="qarindosh")echo "checked"; ?> >
                              Qarindoshinikida turuvchilar
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="turar_joy" id="optionsRadios4" value="uyidan" <? if ($_POST['turar_joy']=="uyidan")echo "checked"; ?> >
                              Uyida qatnovchilar
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label" style="color: red">
                              <input type="radio" class="form-check-input" name="turar_joy" id="optionsRadios4" value="" >
                              Yuqorini tozalash
                            </label>
                          </div>
                        </div>
                      </div>                      
                      <div class="col-md-3">
                        <p class="card-description">Ijimoiy ma'lumotlar</p>
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="yetimlik" id="optionsRadios4" <? if ($_POST['yetimlik'])echo "checked"; ?> >
                              Chin yetimlar
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="temir_daftar" id="optionsRadios2" <? if($_POST['temir_daftar'])echo "checked" ?> >
                              Temir daftarda turuvchilar
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="nogiron" id="optionsRadios3"  <? if ($_POST['nogiron'])echo "checked"; ?> >
                              Nogironigi borlar
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="oilaviy" id="optionsRadios4" <? if ($_POST['oilaviy'])echo "checked"; ?> >
                              Oilalilar
                            </label>
                          </div>                          
                        </div>
                      </div>
                      <div class="col-md-3">
                        <p class="card-description">Hududlar kesimida</p>
                        <div class="form-group">
                          <label class="">Viloyatlar kesimida</label>
                          <select class="form-control" name="vil_id" >
                            <option value="0">--Kerak emas--</option>
                            <?
                              $surov1=mysql_query("SELECT * from viloyat order by name asc");
                              while ($row1=mysql_fetch_assoc($surov1)){
                                if ($_POST['vil_id']==$row1['id']) {
                                  print("<option selected value='$row1[id]'>$row1[name]</option>");
                                } else{
                                  print("<option value='$row1[id]'>$row1[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="">Tumanlar kesimida</label>
                          <select class="form-control" name="tuman_id" >
                            <option value="0">--Kerak emas--</option>
                            <?
                              $surov2=mysql_query("SELECT * from tuman where vid='9' order by name asc");
                              while ($row2=mysql_fetch_assoc($surov2)){
                                if ($_POST['tuman_id']==$row2['id']) {
                                  print("<option selected value='$row2[id]'>$row2[name]</option>");
                                } else{
                                  print("<option value='$row2[id]'>$row2[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <p class="card-description">Imtiyoz va yutuqlar</p>
                        <div class="form-group">
                          <label class="">Imtiyozlilar</label>
                          <select class="form-control" name="imtiyoz_id" >
                            <option value="0">--Kerak emas--</option>
                            <?
                              $surov3=mysql_query("SELECT * from imtiyoz order by name asc");
                              while ($row3=mysql_fetch_assoc($surov3)){
                                if ($_POST['imtiyoz_id']==$row3['id']) {
                                  print("<option selected value='$row3[id]'>$row3[name]</option>");
                                } else{
                                  print("<option value='$row3[id]'>$row3[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="">Yutuqlar</label>
                          <select class="form-control" name="yutuq_id" >
                            <option value="0">--Kerak emas--</option>
                            <?
                              $surov4=mysql_query("SELECT * from yutuq order by name asc");
                              while ($row4=mysql_fetch_assoc($surov4)){
                                if ($_POST['yutuq_id']==$row4['id']) {
                                  print("<option selected value='$row4[id]'>$row4[name]</option>");
                                } else{
                                  print("<option value='$row4[id]'>$row4[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="ok">Ko'rish</button>
                      <button class="btn btn-light" type="reset">Tozalash</button>
                    </div>
                  </form>
                </div>                
              </div>
            </div>
          </div>
          <?php if ($_POST['turar_joy'] or $_POST['yetimlik'] or $_POST['temir_daftar'] or $_POST['nogiron'] or $_POST['oilaviy'] or $_POST['vil_id'] or $_POST['tuman_id'] or $_POST['imtiyoz_id'] or $_POST['yutuq_id']):
            $sql="fak_id='$fak_id'";
            if ($_POST['turar_joy']=="ijara") {
              $turar_joy=true;
              $sql=$sql." and turar_joy='ijara'";
            } else if ($_POST['turar_joy']=="yotoqxona") {
              $turar_joy=true;
              $sql=$sql." and turar_joy='yotoqxona'";
            } else if ($_POST['turar_joy']=="qarindosh") {
              $turar_joy=true;
              $sql=$sql." and turar_joy='qarindosh'";
            } else if ($_POST['turar_joy']=="uyidan") {
              $turar_joy=true;
              $sql=$sql." and turar_joy='uyidan'";
            }
            if ($_POST['yetimlik']) {
              $sql=$sql." and yetimlik='1'";
            }
            if ($_POST['temir_daftar']) {
              $sql=$sql." and temir_daftar='1'";
            }
            if ($_POST['nogiron']) {
              $nogiron=true;
              $sql=$sql." and nogiron!='0'";
            }
            if ($_POST['oilaviy']) {
              $sql=$sql." and oilaviy='oilali'";
            }
            if ($_POST['vil_id']) {
              $vil_id=$_POST['vil_id'];
              $sql=$sql." and vil_id='$vil_id'";
            }
            if ($_POST['tuman_id']) {
              $tuman_id=$_POST['tuman_id'];
              $sql=$sql." and tuman_id='$tuman_id'";
            }
            if ($_POST['imtiyoz_id']) {
              $imtiyoz_id=$_POST['imtiyoz_id'];
              $sql=$sql." and imtiyoz_id='$imtiyoz_id'";
            }
            if ($_POST['yutuq_id']) {
              $yutuq_id=$_POST['yutuq_id'];
              $sql=$sql." and yutuq_id='$yutuq_id'";
            }
            ?>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="display-5">
                      Surov bo'yicha ma'lumotlar
                      <!-- excelga yuklash -->
                      <form method="post" action="excel_upload_by_sort.php" style="float: right">
                        <?
                          $_SESSION['turar_joy']=$turar_joy;
                          $_SESSION['nogiron']=$nogiron;
                          $_SESSION['sql']=$sql;
                        ?>
                        <button type="submit" class="btn btn-danger btn-lg" name="excel_upload"><i class="fas fa-cloud-upload-alt"></i> Yuklash</button>
                      </form>
                    </h4>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>№</th>
                            <th>Familiya</th>
                            <th>Ism</th>
                            <th>Sharif</th>
                            <th>Grand | shartnoma</th>
                            <?php if ($_POST['turar_joy']): ?>
                              <th>Ijara manzil</th>
                            <?php endif ?>
                            <?php if ($_POST['nogiron']): ?>
                              <th>Nogironligi</th>
                            <?php endif ?>
                            <th>Yunalish</th>
                            <th>Guruh</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?
                            $yun=mysql_query("SELECT * from yunalish where fak_id='$fak_id' order by name asc");
                            $i=0;
                            while ($yunalish=mysql_fetch_assoc($yun)) {
                              $yun_id=$yunalish['id'];
                              $gur=mysql_query("SELECT * from guruh where yun_id='$yun_id' order by name asc");
                              while ($guruh=mysql_fetch_assoc($gur)) {
                                $guruh_id=$guruh['id'];
                                $talab=mysql_query("SELECT * from talaba where guruh_id='$guruh_id' and $sql order by fam asc");
                                while ($mal=mysql_fetch_assoc($talab)):$i++ ?>
                                  <tr>
                                    <td><?=$i?></td>
                                    <td><?=$mal['fam']?></td>
                                    <td><?=$mal['ism']?></td>
                                    <td><?=$mal['sharif']?></td>
                                    <td><?=$mal['grand']?></td>
                                    <?php if ($_POST['turar_joy']): ?>
                                      <td><?=$mal['ijara_manzil']?></td>
                                    <?php endif ?>
                                    <?php if ($_POST['nogiron']): ?>
                                      <td><?=$mal['nogiron']?>-guruh nogironi</td>
                                    <?php endif ?>
                                    <td><?=$yunalish['name']?></td>
                                    <td><?=$guruh['name']?></td>
                                  </tr>
                                <? endwhile;
                              }
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endif ?>            
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
