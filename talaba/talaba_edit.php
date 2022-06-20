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
      if (isset($_GET[id])) {
        $id=$_GET[id];
        $surov=mysql_query("SELECT * from talaba where id='$id'");
        $row=mysql_fetch_assoc($surov);
        $yun_id=$row['yun_id'];
        $kurs_id=$row['kurs_id'];
        $guruh_id=$row['guruh_id'];
        $vil_id=$row['vil_id'];
        $fam=$row['fam'];
        $ism=$row['ism'];
        $sharif=$row['sharif'];
        $tel=$row['tel'];
        $millat=$row['millat'];
        $born=$row['born'];
        $pasport=$row['pasport'];
        $grand=$row['grand'];
        $manzil=$row['manzil'];
        $ijara_manzil=$row['ijara_manzil'];
        $turar_joy=$row['turar_joy'];
        $oilaviy=$row['oilaviy'];
        $temir_daftar=$row['temir_daftar'];
        $nogiron=$row['nogiron'];
        $otasi=$row['otasi'];
        $onasi=$row['onasi'];
        $tuman_id=$row['tuman_id'];
        $imtiyoz_id=$row['imtiyoz_id'];
        $yutuq_id=$row['yutuq_id'];
        $yetimlik=$row['yetimlik'];
      } else {
        print("<script>window.location='talaba_view.php'</script>");
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
              Talaba ma'lumotlarini tahrirlash
            </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Talaba ma'lumotlarini tahrirlang</h4>
                  <form class="form-sample" action="edit_one.php" method="post">
                    <p class="card-description">
                    </p>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Familiyasi</label>
                          <input type="text" class="form-control form-control-lg" name="fam" value="<?=$fam?>" value="<?=$fam?>" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Ismi</label>
                          <input type="text" class="form-control form-control-lg" name="ism" value="<?=$ism?>" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Sharifi</label>
                          <input type="text" class="form-control form-control-lg" name="sharif" value="<?=$sharif?>" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Telafon raqami</label>
                          <input type="text" class="form-control form-control-lg" name="tel" value="<?=$tel?>" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group ">
                          <label class="col-form-label">Chin yetimmi</label>
                          <div class="col-md-12 row">
                            <div class="col-sm-7">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="yetimlik" id="membershipRadios1" value="0" <? if ($yetimlik=='0')echo "checked"; ?> >
                                  Yo'q
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="yetimlik" id="membershipRadios2" value="1" <? if ($yetimlik=='1')echo "checked"; ?> >
                                  Ha
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group ">
                          <label class="col-form-label">Grand yoki shartnoma</label>
                          <div class="col-md-12 row">
                            <div class="col-sm-7">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="grand" id="membershipRadios1" value="shartnoma" <? if ($grand=="shartnoma")echo "checked"; ?> >
                                  Shartnoma
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="grand" id="membershipRadios2" value="grand" <? if ($grand=="grand")echo "checked"; ?> >
                                  Grand
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group ">
                          <label class="col-form-label">Temir daftarda turishi</label>
                          <div class="col-md-12 row">
                            <div class="col-sm-6">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="temir_daftar" id="membershipRadios1" value="0"  <? if ($temir_daftar==0)echo "checked"; ?>>
                                  Turmaydi
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="temir_daftar" id="membershipRadios2" value="1" <? if ($temir_daftar)echo "checked"; ?>>
                                  turadi
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group ">
                          <label class="col-form-label">Oilaviy axvoli</label>
                          <div class="col-md-12 row">
                            <div class="col-sm-6">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="oilaviy" id="membershipRadios1" value="oliasiz" <? if ($oilaviy=="oliasiz")echo "checked"; ?>>
                                  Oilasiz
                                </label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="oilaviy" id="membershipRadios2" value="oilali"<? if ($oilaviy=="oilali")echo "checked"; ?>>
                                  oilali
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Tumanini tanlang</label>
                          <select class="js-example-basic-single w-100" name="tuman_id" required="">
                            <option value="">--Tanlang--</option>
                            <?
                              $surov3=mysql_query("SELECT * from tuman where vid='$vil_id' order by name asc");
                              while ($row3=mysql_fetch_assoc($surov3)){
                                if ($tuman_id==$row3['id']) {
                                  print("<option selected value='$row3[id]'> $row3[name]</option>");
                                } else{
                                  print("<option value='$row3[id]'>$row3[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Imtiyozi bormi</label>
                          <select class="js-example-basic-single w-100" name="imtiyoz_id">
                            <option value="0">Yo'q</option>
                            <?
                              $surov4=mysql_query("SELECT * from imtiyoz order by name asc");
                              while ($row4=mysql_fetch_assoc($surov4)){
                                if ($imtiyoz_id==$row4['id']) {
                                  print("<option selected value='$row4[id]'> $row4[name]</option>");
                                } else{
                                  print("<option value='$row4[id]'>$row4[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Yutuqlari bormi</label>
                          <select class="js-example-basic-single w-100" name="yutuq_id" >
                            <option value="0">Yo'q</option>
                            <?
                              $surov5=mysql_query("SELECT * from yutuq order by name asc");
                              while ($row5=mysql_fetch_assoc($surov5)){
                                if ($yutuq_id==$row5['id']) {
                                  print("<option selected value='$row5[id]'> $row5[name]</option>");
                                } else{
                                  print("<option value='$row5[id]'>$row5[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Qayerda turadi</label>
                          <select class="js-example-basic-single w-100" name="turar_joy" required="">
                            <option value="ijara" <? if($turar_joy=="ijara")echo "selected"; ?> > Ijarada turadi</option>
                            <option value="yotoqxona" <? if($turar_joy=="yotoqxona")echo "selected"; ?> > Yotoqxonada turadi</option>
                            <option value="qarindosh" <? if($turar_joy=="qarindosh")echo "selected"; ?> > Yaqin qarindoshinida turadi</option>
                            <option value="uyidan" <? if($turar_joy=="uyidan")echo "selected"; ?> > O'zining uyida turadi</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Tug'ilgan yili va joyi</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="4" name="born" required=""><?=$born?></textarea>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Pasport ma'lumotlari</label>
                          <textarea class="form-control" id="exampleTextarea1" name="pasport" required="" rows="4"><?=$pasport?></textarea>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Doimiy yashash manzili</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="4"  name="manzil" required="" ><?=$manzil?></textarea>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Vaqtincha yashash manzili</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="4" name="ijara_manzil" required="" ><?=$ijara_manzil?></textarea>
                        </div>
                      </div>                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Otasi</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="4" name="otasi" required="" ><?=$otasi?></textarea>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Onasi</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="4" name="onasi" required="" ><?=$onasi?></textarea>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Nogironligi</label>
                          <select class="js-example-basic-single w-100" name="nogiron">
                            <option value="0" <? if($nogiron=="0")echo "selected"; ?>> Yo'q</option>
                            <option value="1" <? if($nogiron=="1")echo "selected"; ?>> 1-guruh nogironi</option>
                            <option value="2" <? if($nogiron=="2")echo "selected"; ?>> 2-guruh nogironi</option>
                            <option value="3" <? if($nogiron=="3")echo "selected"; ?>> 3-guruh nogironi</option>
                            <option value="4" <? if($nogiron=="4")echo "selected"; ?>> 4-guruh nogironi</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Guruhni tanlang</label>
                          <select class="js-example-basic-single w-100" name="guruh_id" >
                            <?
                              $surov1=mysql_query("SELECT * from guruh where fak_id='$fak_id' and yun_id='$yun_id'and kurs_id='$kurs_id' order by name asc");
                              while ($row1=mysql_fetch_assoc($surov1)){
                                if ($guruh_id==$row1['id']) {
                                  print("<option selected value='$row1[id]'>$row1[name]</option>");
                                } else{
                                  print("<option value='$row1[id]'>$row1[name]</option>");
                                }
                              }                                  
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Millati</label>
                          <input type="text" class="form-control form-control-lg" name="millat" value="<?=$millat?>" required>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="yun_id" value="<?=$yun_id?>">
                    <input type="hidden" name="kurs_id" value="<?=$kurs_id?>">
                    <input type="hidden" name="vil_id" value="<?=$vil_id?>">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <button type="submit" class="btn btn-primary mr-2" name="ok">Yuklash</button>
                    <button class="btn btn-light" type="reset">Tozalash</button>
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
