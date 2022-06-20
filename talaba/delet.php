<? 
  session_start();
  if ($_SESSION['rol']!="user") {
    print("<script>window.location='../logout.php'</script>");
  }
  $fak_id=$_SESSION['fak_id'];
  include_once "../include/db.php";
  $del=$_GET['del'];
  $del=mysql_query("DELETE from talaba where id='$del' and id='$del'and fak_id='$fak_id'");
  print("<script>window.location='talaba_view.php'</script>");
?>

