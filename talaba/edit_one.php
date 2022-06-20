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
  $vil_id=filter($_POST['vil_id']);  
  $id=filter($_POST['id']);  
  $guruh_id=filter($_POST['guruh_id']);

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
  $yetimlik=filter($_POST['yetimlik']);

    $surov=mysql_query("UPDATE talaba SET fam='$fam',ism='$ism',sharif='$sharif',born='$born',tel='$tel',millat='$millat',pasport='$pasport',tuman_id='$tuman_id',manzil='$manzil',ijara_manzil='$ijara_manzil',turar_joy='$turar_joy',grand='$grand',temir_daftar='$temir_daftar',oilaviy='$oilaviy',nogiron='$nogiron',imtiyoz_id='$imtiyoz_id',yutuq_id='$yutuq_id',guruh_id='$guruh_id',otasi='$otasi',onasi='$onasi',yetimlik='$yetimlik' WHERE id='$id' and vil_id='$vil_id' and fak_id='$fak_id' and yun_id='$yun_id' and kurs_id='$kurs_id'");

  if ($surov) {
    print("<script>window.alert('Bajarildi')</script>");
    print("<script>window.location='talaba_view.php'</script>");
  } else {
    print("<script>window.alert('Xatolik')</script>");
    print("<script>window.location='talaba_view.php'</script>");
  }
?>