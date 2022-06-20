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
              Talaba qo'shish
            </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Yunalish, kurs, guruh raqamini va viloyatini tanlang</h4>
                  <form class="form-sample" method="post"  onchange="submit()">
                    <p class="card-description">
                    </p>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" col-form-label">Yunalishni tanlang</label>
                          <select class="js-example-basic-single w-100" name="yun_id" >
                            <option value="0">--Tanlang--</option>
                            <?
                              $kurs_id=$_POST['kurs_id'];
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
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="col-form-label">Talabaning viloyatini tanlang</label>
                          <select class="js-example-basic-single w-100" name="vil_id" >
                            <option value="">--Tanlang--</option>
                            <?
                              $vil_id=$_POST['vil_id'];
                              $surov2=mysql_query("SELECT * from viloyat order by name asc");
                              while ($row2=mysql_fetch_assoc($surov2)){
                                if ($_POST['vil_id']==$row2['id']) {
                                  print("<option selected value='$row2[id]'> $row2[name]</option>");
                                } else{
                                  print("<option value='$row2[id]'> $row2[name]</option>");
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
          <?php if (!empty($_POST['guruh_id']) and !empty($_POST['vil_id'])): ?>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Talaba ma'lumotlarini to'g'ri kiriting</h4>
                    <form class="form-sample" action="insert_one.php" method="post">
                      <p class="card-description">
                      </p>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Familiyasi</label>
                            <input type="text" class="form-control form-control-lg" name="fam" placeholder="*" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Ismi</label>
                            <input type="text" class="form-control form-control-lg" name="ism" placeholder="*" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Sharifi</label>
                            <input type="text" class="form-control form-control-lg" name="sharif" placeholder="*" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Telafon raqami</label>
                            <input type="text" class="form-control form-control-lg" name="tel" placeholder="*" required>
                          </div>
                        </div>                      
                        <div class="col-md-3">
                          <div class="form-group ">
                            <label class="col-form-label">Jinsi</label>
                            <div class="col-md-12 row">
                              <div class="col-sm-7">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jins" id="membershipRadios1" value="1" required="">
                                    Erkak
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jins" id="membershipRadios2" value="0" required="">
                                    Ayol
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
                                    <input type="radio" class="form-check-input" name="grand" id="membershipRadios1" value="shartnoma" checked>
                                    Shartnoma
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-5">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="grand" id="membershipRadios2" value="grand">
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
                                    <input type="radio" class="form-check-input" name="temir_daftar" id="membershipRadios1" value="0" checked>
                                    Turmaydi
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="temir_daftar" id="membershipRadios2" value="1">
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
                                    <input type="radio" class="form-check-input" name="oilaviy" id="membershipRadios1" value="oliasiz" checked>
                                    Oilasiz
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="oilaviy" id="membershipRadios2" value="oilali">
                                    oilali
                                  </label>
                                </div>
                              </div>
                            </div>
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
                                  print("<option value='$row4[id]'> $row4[name]</option>");
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
                                  print("<option value='$row5[id]'> $row5[name]</option>");
                                }                                  
                              ?>
                            </select>
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
                                  print("<option value='$row3[id]'> $row3[name]</option>");
                                }                                  
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="col-form-label">Qayerda turadi</label>
                            <select class="js-example-basic-single w-100" name="turar_joy" required="">
                              <option value="">--Tanlang--</option>
                              <option value="ijara" > Ijarada turadi</option>
                              <option value="yotoqxona" > Talabalar turar joyi</option>
                              <option value="qarindosh" > Yaqin qarindoshinida turadi</option>
                              <option value="uyidan" > O'zining uyida turadi</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Tug'ilgan yili va joyi</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="born" required=""></textarea>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Pasport ma'lumotlari</label>
                            <textarea class="form-control" id="exampleTextarea1" name="pasport" required="" rows="4"></textarea>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Doimiy yashash manzili</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4"  name="manzil" required="" ></textarea>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Vaqtincha yashash manzili</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="ijara_manzil" required="" ></textarea>
                          </div>
                        </div>                      
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Otasi</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="otasi" required="" ></textarea>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Onasi</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="onasi" required="" ></textarea>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class=" col-form-label">Millati</label>
                            <input type="text" class="form-control form-control-lg" name="millat" placeholder="*" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="col-form-label">Nogironligi</label>
                            <select class="js-example-basic-single w-100" name="nogiron">
                              <option value="0" > Yo'q</option>
                              <option value="1" > 1-guruh nogironi</option>
                              <option value="2" > 2-guruh nogironi</option>
                              <option value="3" > 3-guruh nogironi</option>
                              <option value="4" > 4-guruh nogironi</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group ">
                            <label class="col-form-label">Chin yetimmi</label>
                            <div class="col-md-12 row">                            
                              <div class="col-sm-6">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="yetimlik" id="membershipRadios2" value="0" checked>
                                    Yo'q
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="yetimlik" id="membershipRadios1" value="1">
                                    Ha
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <input type="hidden" name="yun_id" value="<?=$yun_id?>">
                            <input type="hidden" name="kurs_id" value="<?=$kurs_id?>">
                            <input type="hidden" name="guruh_id" value="<?=$guruh_id?>">
                            <input type="hidden" name="vil_id" value="<?=$vil_id?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="ok">Yuklash</button>
                      <button class="btn btn-light" type="reset">Tozalash</button>
                    </form>
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
