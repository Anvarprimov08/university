<? 
  session_start();
  if ($_SESSION['rol']!="admin" or !isset($_POST['excel_upload_admin'])) {
    print("<script>window.location='../logout.php'</script>");
  }
  include_once "../include/db.php";
  $fak_id=$_SESSION['fakultet'];
  $turar_joy=$_SESSION['turar_joy'];
  $nogiron=$_SESSION['nogiron'];
  $sql=$_SESSION['sql'];

  $talab=mysql_query("SELECT * from talaba where $sql order by fam asc");
  if (mysql_num_rows($talab)>0) {
  	$export="<table border='1'>";
      $export.="<tr>";
        $export.="<th>Familiya</th>";
      	$export.="<th>Ism</th>";
      	$export.="<th>Sharif</th>";
      	$export.="<th>Grand | shartnoma</th>";
        if ($turar_joy) {
          $export.="<th>Ijara manzil</th>";
        }
      	if ($nogiron) {
          $export.="<th>Nogironligi</th>";
        }
      	$export.="<th>Yunalish</th>";
      	$export.="<th>Guruh</th>";
      $export.="</tr>";

      $yun=mysql_query("SELECT * from yunalish where fak_id='$fak_id' order by name asc");
      $i=0;
      while ($yunalish=mysql_fetch_assoc($yun)) {
        $yun_id=$yunalish['id'];
        $gur=mysql_query("SELECT * from guruh where yun_id='$yun_id' order by name asc");
        while ($guruh=mysql_fetch_assoc($gur)) {
          $guruh_id=$guruh['id'];
          $talab=mysql_query("SELECT * from talaba where guruh_id='$guruh_id' and $sql order by fam asc");
          while ($mal=mysql_fetch_assoc($talab)){
            $i++;
            $export.="<tr>";
              $export.="<td>$mal[fam]</td>";
              $export.="<td>$mal[ism]</td>";
              $export.="<td>$mal[sharif]</td>";
              $export.="<td>$mal[grand]</td>";
              if ($turar_joy==true) {
                $export.="<td>$mal[ijara_manzil]</td>";
              }
              if ($nogiron) {
                $export.="<td>$mal[nogiron]-guruh nogironi</td>";
              }
              $export.="<td>$yunalish[name]</td>";
              $export.="<td>$guruh[name]</td>";
            $export.="</tr>";
          }
        }
      }
    $export.="</table>";
    $fak=mysql_query("SELECT * from fakultet where id='$fak_id'");
    $fakultet=mysql_fetch_assoc($fak);
    $fak_name=$fakultet['name'];
    header("Content-Type: application/xls");
    header("Content-Disposition:attachment; filename=$fak_name.xls");
    echo $export;
    print("<script>window.location='sort_by_admin.php'</script>");
  } else {
  print("<script>window.location='sort_by_admin.php'</script>");
  }
?>