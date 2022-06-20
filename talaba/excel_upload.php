<? 
  session_start();
  if ($_SESSION['rol']!="user" or !isset($_POST['excel_upload'])) {
    print("<script>window.location='../logout.php'</script>");
  }
  include_once "../include/db.php";
  $fak_id=$_SESSION['fak_id'];
  $guruh_id=$_POST['guruh_id'];
  $talab=mysql_query("SELECT * from talaba where fak_id='$fak_id' and guruh_id='$guruh_id' order by fam asc");
  if (mysql_num_rows($talab)>0) {
  	$export="<table border='1'>";
      $export.="<tr>";
      	$export.="<th>F.I.O va telefon raqam</th>";
      	$export.="<th>Millati</th>";
      	$export.="<th>Tug'ilgan yili va joyi</th>";
      	$export.="<th>Pasport ma'lumotlari</th>";
      	$export.="<th>Grand sharnoma</th>";
      	$export.="<th>Yashash manzil</th>";
      	$export.="<th>Ijara manzil</th>";
      	$export.="<th>Otasi</th>";
      	$export.="<th>Onasi</th>";
      	$export.="<th>Oilali oilasiz</th>";
      	$export.="<th>Qayerda turishi</th>";
      	$export.="<th>Temir daftar</th>";
      	$export.="<th>Nogironligi</th>";
      	$export.="<th>Imtiyozlari</th>";
        $export.="<th>Yutuqlari</th>";
      $export.="</tr>";
    	while ($mal=mysql_fetch_assoc($talab)){
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

    		$export.="<tr>";
          $export.="<td>$mal[fam] $mal[ism] $mal[sharif] $mal[tel]</td>";
          $export.="<td>$mal[millat]</td>";
          $export.="<td>$mal[born]</td>";
          $export.="<td>$mal[pasport]</td>";
          $export.="<td>$mal[grand]</td>";
          $export.="<td>$viloyat[name] $tuman[name] $mal[manzil]</td>";
          $export.="<td>$mal[ijara_manzil]</td>";
          $export.="<td>$mal[otasi]</td>";
          $export.="<td>$mal[onasi]</td>";
          $export.="<td>$mal[oilaviy]</td>";
          $export.="<td>$mal[turar_joy]</td>";
          if ($mal['yetimlik']) {
            $export.="<td>Chin yetim</td>";
          } else {
            $export.="<td></td>";
          }
          if ($mal['temir_daftar']) {
            $export.="<td>Turadi</td>";
          } else {
            $export.="<td></td>";
          }
          if ($mal['nogiron']) {
            $export.="<td>$mal[nogiron]-guruh nogironi</td>";
          } else {
            $export.="<td></td>";
          }
          $export.="<td>$imtiyoz[name]</td>";
          $export.="<td>$yutuq[name]</td>";         
        $export.="</tr>";
    	}
      $export.="</table>";
      $filename=$_POST['guruh_name'];
      header("Content-Type: application/xls");
      header("Content-Disposition:attachment; filename=$filename.xls");
      echo $export;
      print("<script>window.location='talaba_view.php'</script>");
  } else {
  	print("<script>window.location='talaba_view.php'</script>");
  }  

?>