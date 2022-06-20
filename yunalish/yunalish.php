<? 
  session_start();
  if ($_SESSION['rol']!="admin") {
    print("<script>window.location='../index.php'</script>");
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
      if (isset($_GET['del'])) {
        $del=$_GET['del'];
        mysql_query("DELETE from talaba where yun_id='$del'");  
        mysql_query("DELETE from guruh where yun_id='$del'");
        mysql_query("DELETE from yunalish where id='$del'");
      }
    ?>
    <?
      if (isset($_POST['ok'])) {          
        $i=0;
        $nam=trim($_POST['name']);
        $name=filter($_POST['name']);
        $fak_id=trim($_POST['fak_id']);
        if (preg_match("/^[a-z`'ʼ ]{5,}$/i", $nam)) {
          $i++;
        } else {
          $ername="5 ta belgidan kam bo'lmagan NOM kiriting";
        }
        $test=mysql_query("SELECT * from yunalish where name='$name' and fak_id='$fak_id'");
        if (mysql_num_rows($test)==0) {
          $i++;
        } else {
          $ertest="Ushbu NOM avval ro'yxatdan o'tgan iltimos qaytadan urinib ko'ring!";
        }
        if ($i==2) {
          $surov=mysql_query("INSERT into yunalish(name, fak_id) values('$name','$fak_id')");
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
              Yunalishlarni ko'ring, nomini tahrirlang, yangi yunalish qo'shing yoki o'chiring
            </h3>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <h4 class="card-title">Ko'rish</h4>
                    <div class="form-group">
                      <label>Fakultetni tanlang</label>
                      <select class="js-example-basic-single w-100" name="fak_id" onchange="submit()">
                        <option value="">--Tanlang--</option>
                        <?
                          $surov=mysql_query("SELECT * from fakultet order by name asc");
                          while ($row=mysql_fetch_assoc($surov)){
                            if ($_POST[fak_id]==$row['id']) {
                              $name=$row[name];
                              print("<option selected value='$row[id]'> $row[name]</option>");
                            } else{
                              print("<option value='$row[id]'> $row[name]</option>");
                            }
                          }                                  
                        ?>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <? if (isset($_POST['fak_id'])): 
              $fak_id=$_POST['fak_id']; ?>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Yunalish qo'shish</h4>
                    <p style="color: red;"><?=$ertest?></p>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label>Yunalish nomi</label>
                        <input type="text" class="form-control form-control-lg" name="name" value="<?=$nam?>" placeholder="* nomi" required>
                        <input type="hidden" name="fak_id" value="<?=$fak_id?>">
                        <span style="color: red;"><?=$ername?></span>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="ok">Qo'shish</button>
                      <button class="btn btn-light" type="reset">Tozalash</button>
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
                  <h4 class="card-title">Barcha yunalishlar</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>№</th>                        
                          <th>Yunalish nomi</th>
                          <th>Nomini tahrirlash yoki o'chirish</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?
                          $doc=mysql_query("SELECT * from yunalish where fak_id='$fak_id' order by name asc");
                          $i=0;
                          while ($row=mysql_fetch_assoc($doc)): $i++; ?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$row['name']?></td>
                              <td>
                                <button type="button" onclick="if(confirm('Nomini o\'zgartirmoqchimisiz'))window.location.href='edit.php?id=<?=$row[id]?>'" class="btn btn-outline-primary btn-icon-text"><i class="fa fa-edit btn-icon-prepend">  Nomini tahrirlash</i></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" onclick="if(confirm('Yunalish, yunalishdagi barcha guruhlar va talalar o\'chiriladi'))window.location.href='yunalish.php?del=<?=$row[id]?>'" class="btn btn-outline-danger btn-icon-text"><i class="fas fa-trash btn-icon-prepend">  O'chirish</i></button>
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
