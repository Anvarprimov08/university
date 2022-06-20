<? 
  session_start();
  if ($_SESSION['rol']!="admin") {
    print("<script>window.location='../logout.php'</script>");
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
        mysql_query("DELETE from user where fak_id='$del'");  
        mysql_query("DELETE from talaba where fak_id='$del'");  
        mysql_query("DELETE from guruh where fak_id='$del'");
        mysql_query("DELETE from yunalish where fak_id='$del'");
        mysql_query("DELETE from fakultet where id='$del'");   
      }
    ?>
    <?
      if (isset($_POST['ok'])) {          
        $i=0;
        $nam=trim($_POST['name']);
        $name=filter($_POST['name']);
        if (preg_match("/^[a-z`'ʼ ]{5,}$/i", $nam)) {
          $i++;
        } else {
          $ername="5 ta belgidan kam bo'lmagan NOM kiriting";
        }
        $test=mysql_query("SELECT * from fakultet where name='$name'");
        if (mysql_num_rows($test)==0) {
          $i++;
        } else {
          $ertest="Ushbu NOM avval ro'yxatdan o'tgan iltimos qaytadan urinib ko'ring!";
        }
        if ($i==2) {
          $surov=mysql_query("INSERT into fakultet(name) values('$name')");
          if ($surov) {
            unset($nam);
            print("<script>window.alert('Yangi fakultet qo\'shdingiz!!!')</script>");
            print("<script>window.location='fakultet.php</script>");
          } else {
            print("<script>window.alert('XATOLIK: qaytadan o\'rinib ko\'ring')</script>");
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
              Fakultetlarni ko'ring, nomini tahrirlang, yangi fakultet qo'shing yoki o'chiring
            </h3>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Yangi fakultet qo'shish</h4>
                  <p style="color: red;"><?=$ertest?></p>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label>Fakultet nomi</label>
                      <input type="text" class="form-control form-control-lg" name="name" value="<?=$nam?>" placeholder="* nomi" required>
                      <span style="color: red;"><?=$ername?></span>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="ok">Qo'shish</button>
                    <button class="btn btn-light" type="reset">Tozalash</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Barcha fakultetlar</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>№</th>                        
                          <th>Fakultet nomi</th>
                          <th>Nomini tahrirlash yoki o'chirish</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?
                          $doc=mysql_query("SELECT * from fakultet order by name asc");
                          $i=0;
                          while ($row=mysql_fetch_assoc($doc)): $i++; ?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$row['name']?></td>
                              <td>
                                <button type="button" onclick="if(confirm('Fakultet nomini o\'zgartirmoqchimisiz'))window.location.href='edit.php?id=<?=$row[id]?>'" class="btn btn-outline-primary btn-icon-text"><i class="fa fa-edit btn-icon-prepend">  Nomini tahrirlash</i></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" onclick="if(confirm('Fakultet, fakultetdagi barcha yunalish, guruhlar va talalar o\'chiriladi'))window.location.href='fakultet.php?del=<?=$row[id]?>'" class="btn btn-outline-danger btn-icon-text"><i class="fas fa-trash btn-icon-prepend">  O'chirish</i></button>
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
