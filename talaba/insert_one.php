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
  $vil_id=filter($_POST['vil_id']);  

  $fam=filter($_POST['fam']);
  $ism=filter($_POST['ism']);
  $sharif=filter($_POST['sharif']);
  $tel=filter($_POST['tel']);
  $millat=filter($_POST['millat']);
  $born=filter($_POST['born']);
  $pasport=filter($_POST['pasport']);
  $grand=filter($_POST['grand']);
  $manzil=filter($_POST['manzil']);
  $ijara_manzil=filter($_POST['ijara_manzil']);
  $turar_joy=filter($_POST['turar_joy']);
  $oilaviy=filter($_POST['oilaviy']);
  $temir_daftar=filter($_POST['temir_daftar']);
  $nogiron=filter($_POST['nogiron']);
  $otasi=filter($_POST['otasi']);
  $onasi=filter($_POST['onasi']);
  $tuman_id=filter($_POST['tuman_id']);
  $imtiyoz_id=filter($_POST['imtiyoz_id']);
  $yutuq_id=filter($_POST['yutuq_id']);
  $jins=filter($_POST['jins']);
  $yetimlik=filter($_POST['yetimlik']);

  if (!empty($guruh_id)) {
    $surov=mysql_query("INSERT INTO talaba(fam, ism, sharif, born, tel, millat, pasport, vil_id, tuman_id, manzil, ijara_manzil, turar_joy, grand, temir_daftar, oilaviy, nogiron, imtiyoz_id, yutuq_id, fak_id, yun_id, kurs_id, guruh_id, otasi, onasi, yetimlik, jins) VALUES ('$fam', '$ism', '$sharif', '$born', '$tel', '$millat', '$pasport', '$vil_id', '$tuman_id', '$manzil', '$ijara_manzil', '$turar_joy', '$grand', '$temir_daftar', '$oilaviy', '$nogiron', '$imtiyoz_id', '$yutuq_id', '$fak_id', '$yun_id', '$kurs_id', '$guruh_id', '$otasi', '$onasi', '$yetimlik', '$jins')");
    if ($surov) {
      print("<script>window.alert('Bajarildi')</script>");
      print("<script>window.location='talaba_add.php'</script>");
    } else {
      print("<script>window.alert('Xatolik')</script>");
      print("<script>window.location='talaba_add.php'</script>");
    }
  } else {
    print("<script>window.alert('Xatolik')</script>");
    print("<script>window.location='talaba_add.php'</script>");
  }
?>