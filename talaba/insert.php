<?
session_start();
  if ($_SESSION['rol']!="user" or !isset($_POST[ok])) {
    print("<script>window.location='../logout.php'</script>");
  }
?>
<? include_once "../include/db.php" ?>
<?php
  
  $fak_id=$_SESSION['fak_id'];
  $yun_id=filter($_POST['yun_id']);
  $kurs_id=filter($_POST['kurs_id']);
  $guruh_id=filter($_POST['guruh_id']);

  $arr=$_SESSION['arr'];
  $count=count($arr);
  $con=0;
  for ($i=1; $i < $count; $i++) {
    $fam=filter($arr[$i][0]);
    $ism=filter($arr[$i][1]);
    $sharif=filter($arr[$i][2]);
    $tel=filter($arr[$i][3]);
    $millat=filter($arr[$i][4]);
    $born=filter($arr[$i][5]);
    $pasport=filter($arr[$i][6]);
    $grand=filter($arr[$i][7]);
    $vil_id=filter($arr[$i][8]);  
    //$=filter($arr[$i][9]);
    $manzil=filter($arr[$i][10]);
    $ijara_manzil=filter($arr[$i][11]);
    $turar_joy=filter($arr[$i][12]);
    $oilaviy=filter($arr[$i][13]);
    $temir_daftar=filter($arr[$i][14]);
    $nogiron=filter($arr[$i][15]);
    //$=filter($arr[$i][16]);
    //$=filter($arr[$i][17]);
    $otasi=filter($arr[$i][18]);
    $onasi=filter($arr[$i][19]);
    $yetimlik=filter($arr[$i][20]);
    $jins=filter($arr[$i][21]);

    $grand = ($grand==1) ? "grand" : "shartnoma" ;
    $oilaviy = ($oilaviy==1) ? "oilali" : "oliasiz" ;
    if ($turar_joy==2) {
        $turar_joy="yotoqxona";
    } else if ($turar_joy==3) {
        $turar_joy="qarindosh";
    } else if ($turar_joy==4) {
        $turar_joy="uyidan";
    } else {
        $turar_joy="ijara";
    }    

    $tuman_id=filter($_POST["tuman_id$i"]);
    $imtiyoz_id=filter($_POST["imtiyoz_id$i"]);
    $yutuq_id=filter($_POST["yutuq_id$i"]);
    $surov=mysql_query("INSERT INTO talaba(fam, ism, sharif, born, tel, millat, pasport, vil_id, tuman_id, manzil, ijara_manzil, turar_joy, grand, temir_daftar, oilaviy, nogiron, imtiyoz_id, yutuq_id, fak_id, yun_id, kurs_id, guruh_id, otasi, onasi, yetimlik, jins) VALUES ('$fam', '$ism', '$sharif', '$born', '$tel', '$millat', '$pasport', '$vil_id', '$tuman_id', '$manzil', '$ijara_manzil', '$turar_joy', '$grand', '$temir_daftar', '$oilaviy', '$nogiron', '$imtiyoz_id', '$yutuq_id', '$fak_id', '$yun_id', '$kurs_id', '$guruh_id', '$otasi', '$onasi', '$yetimlik', '$jins')");
    if ($surov)$con++;
  }
  print("<script>window.alert('$con ta talaba yuklandi')</script>"); 
  print("<script>window.location='talaba_view.php'</script>");
?>