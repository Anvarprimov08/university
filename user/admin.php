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
        if ($_SESSION['id']!=$del) {
          $del=mysql_query("DELETE from user where id='$del'");
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
              Nazoratchilarga yangi parol berish yoki ularni o'chirish
            </h3>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h5 class="">Nazoratchilar</h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>№</th>
                          <th>F.I.O</th>
                          <th>Telefon raqam</th>
                          <th>Roli</th>
                          <th>Tahrirlash yoki o'chirish</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?
                          $surov=mysql_query("SELECT * from user  where rol='admin' order by fam asc");
                          $u=0;
                          while ($row=mysql_fetch_assoc($surov)): $u++;?>
                            <tr>
                              <td><?=$u?></td>
                              <td><?=$row['fam']?> <?=$row['ism']?> <?=$row['sharif']?></td>
                              <td><a href="tel:/<?=$row['tel']?>"><?=$row['tel']?></a></td>
                              <td>Nazoratchi</td>
                              <td>
                                <button type="button" onclick="if(confirm('shaxsiy ma\'lumotlari, Login & parolini o\'zgarmoqchimisiz'))window.location.href='edit_admin.php?log=<?=$row['id']?>'" class="btn btn-outline-primary btn-icon-text"><i class="fas fa-edit btn-icon-prepend">  Tahrirlash</i></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" onclick="if(confirm('O\'chirish kerakligiga ishonchingiz komilmi'))window.location.href='admin.php?del=<?=$row[id]?>'" class="btn btn-outline-danger btn-icon-text"><i class="fas fa-trash btn-icon-prepend">  O'chirish</i></button>
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
