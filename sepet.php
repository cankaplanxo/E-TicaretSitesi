<?php
include "ayar/ayar.php";
if  ($_SESSION["giris"]=="tamam")
{
			if ($_GET["urun"]=="ekle")
			{
				if($_POST)
				{
					$usira = $_POST["urunsira"];
					$urunfiyat=al(bul("SELECT * FROM urunler WHERE usira = '$usira'"));
					$ksira=$_SESSION["ksira"];
					$adet = 1;
					$tutar = $urunfiyat["fiyat"];
				
				$sepetebak=bul("SELECT * FROM sepet WHERE urun_no = '$usira' && ksira = '$ksira'");
				if(mysql_affected_rows())
				{
					$sn= al($sepetebak);
					$snb=$sn["sira"];
					$top=$sn["top_adet"]+1;
					$adetgun=bul("UPDATE sepet SET top_adet='$top' WHERE urun_no = '$usira' && ksira = '$ksira'");
					
					if($adetgun)
					{
						$tp_adet=al($adetgun);
						$top_adet=$tp_adet["top_adet"] * $tutar;
						$urunfiyatgun=bul("UPDATE sepet SET top_fiyat = top_adet * '$tutar' WHERE urun_no = '$usira' && ksira = '$ksira'");
						
							if ($urunfiyatgun)
							{
								
								echo "Ürün Sepete Eklenmiştir...";
								
							}else
							{
								
								echo "Bir Hata Oluştu..".mysql_error();
							}
						
					}else
					{
						echo "Bir Hata Oluştu..".mysql_error();
						
					}
				
					
				}
				else{
								
				$sepetekle = bul("INSERT INTO sepet SET
				urun_no = '$usira',
				ksira = '$ksira',
				top_adet  = '$adet',
				top_fiyat  = '$tutar' ");
				
				if ($sepetekle)
				{
					
					echo "Ürün Sepete Eklenmiştir...";
					
				}else
				{
					
					echo "Bir Hata Oluştu..".mysql_error();
				}
					
				}
				
				
				
					
				}
			}elseif($_GET["urun"]=="duzenle")
			{
				$sepetno=$_GET["sepetno"];
				$urunno=$_POST["urun_no"];
				$adet=$_POST["adet"];
				$birimfiyat= al(bul("SELECT * FROM urunler WHERE usira = '$urunno'"));
				$ubf=$birimfiyat["fiyat"];
				$top_fiyat=$adet*$ubf;
				$guncelle=bul("UPDATE sepet SET
				top_fiyat = '$top_fiyat',
				top_adet = '$adet' WHERE sira = '$sepetno'");
				
				if($guncelle)
				{
					?>
					<script type="text/javascript">
					alert("Ürün Başarıyla Güncellendi...");
					</script>
					<?php
					header("Refresh:0;url=sepet.php");
				}
				
				
			}elseif($_GET["urun"]=="sil")
			{
				$usira=$_GET["sepetno"];
				
				$sil=bul("DELETE FROM sepet WHERE sira = '$usira'");
				
				if($sil)
				{
					header("Location:sepet.php");
				}else
				{
					
					?>
					<script type="text/javascript">
					alert("Ürün Silinemedi....");
					</script>
					<?php
				}
				
				
			}		
			else
			{
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="ayar/extra/css/font-awesome.css" />
	<link rel="stylesheet" href="ayar/extra/css/pure.css" />
	<style type="text/css">
	.kirmizi
	{	
			background-color:red;
			color:#fff;
	}
	.yesil
	{
		
		background-color:green;
		color:#fff;	
	}
	</style>
</head>
<body>
<h1 style="text-align:right;padding-right:15px;"><i><?php echo $_SESSION["kadi"];?></i> üyesine ait sepeti görüntülüyorsunuz</h1>
<a href="sepet.php" style="margin-left:20px;" class="pure-button yesil">Sepeti Yenile</a>
<table width="100%" class="pure-table" align="center" style="text-align:center;"> 
<caption>Sepetteki Ürünlerin Bilgileri</caption>
	<thead>
	<tr align="center"> 
		<td width="10%">Ürün Resim</td>
		<td width="25%">Ürün İsmi</td>
		<td>Ürün Fiyat</td>
		<td width="5%">Ürün Adet</td>
		<td width="20%">Ürün İşlemleri</td>
	</tr>
	</thead>
	<tbody>
	

	<?php
	$ksira=$_SESSION["ksira"];
	$uyesepeti=bul("SELECT * FROM sepet WHERE ksira = '$ksira'");
	$toplam=0;
	while($sepeturun=al($uyesepeti))
	{
	$usira=$sepeturun["urun_no"];
	$urunbul = al(bul("SELECT * FROM urunler WHERE usira = '$usira'"));
	?>
	<form action="sepet.php?urun=duzenle&sepetno=<?php echo $sepeturun["sira"];?>" method="post" class="pure-form">
	<input type="hidden" name="urun_no" value="<?php echo $sepeturun["urun_no"];?>" />
	<tr>
		<td width="10%"><img src="<?php echo $urunbul["resim"];?>"  width="100px" alt="" /></td>
		<td width="25%"><?php echo $urunbul["adi"];?></td>
		<td>
		Adet Fiyat:<?php echo $urunbul["fiyat"];?> TL<br />
		Toplam Fiyat: <?php echo $sepeturun["top_fiyat"];?> TL
		</td>
		<td width="5%"><input type="number" style="width:60px; border:1px solid #eee; text-align:center;"  value="<?php echo $sepeturun["top_adet"];?>" name="adet"/></td>
		<td width="20%"><button class="pure-button pure-button-primary">Ürün Güncelle</button>  <a onclick="return confirm('Silmek istediğiniden Emin misiniz?....')" href="sepet.php?urun=sil&sepetno=<?php echo $sepeturun["sira"];?>"  class="pure-button kirmizi">Sil</a></td>
	</tr>
	</form>
	

		<?php
		$toplam=$toplam+$sepeturun["top_fiyat"];
	}
	?>
	
	</tbody>
</table>	
	<div style="text-align:right; padding:40px; padding-right:50px;">
	<table class="pure-table" align="right">
		<thead>
			<tr>
				<td>Toplam Tutar</td>
			</tr>
		</thead>
		<tbody>
			<tr align="right">
				<td><?php echo $toplam;?> TL</td>
			</tr>
		</tbody>
	</table>
	<br />
	<br />
	<br />
	<br />
	<br />
    Satış Koşullarını Kabul Etmiş Sayılırsınız > <button class="pure-button" style="background-color:#145b44; color:#fff;">Satın Almaya Devam Et</button>
	
	
	
	
	</div>
</body>
</html>
<?php

		}
			



}else
{
	echo "Lütfen Üye Girişi Yapınız...";
	
}
?>