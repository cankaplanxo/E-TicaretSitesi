<?php
include "ayar.php";

if($_GET["giris"]=="yap")
{
	
	$kadi=mysql_real_escape_string($_POST["kadi"]);
$ksifre=mysql_real_escape_string(md5($_POST["ksifre"]));

$uyebul=bul("SELECT * FROM uyeler WHERE kadi = '$kadi' && ksifre = '$ksifre'");

if(mysql_affected_rows())
{
	$ue=al($uyebul);
	$_SESSION["giris"]="tamam";
	$_SESSION["kadi"]=$ue["kadi"];
	$_SESSION["krutbe"]=$ue["krutbe"];
	$_SESSION["ksira"]=$ue["ksira"];
	header("Location: ../index.php");
	
	
}else
{
?>
<script type="text/javascript">
alert("Kullanıcı adı veya şifre yanlış");
window.open("../index.php","_top");
</script>
<?php	
}
	
}elseif ($_GET["cikis"]=="yap")
{
	
	session_destroy();
	header("Location: ../index.php");
}

?>