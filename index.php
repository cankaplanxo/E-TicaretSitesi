<?php include "ayar/ayar.php";?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title><?php echo ayar("adi");?></title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="css/images/favicon" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="java/java.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="js/png-fix.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
	<!-- Header -->
	<div id="header" class="shell">
<html>
<head>
<style>
h1 {
  text-align: center;
  text-transform: uppercase;
  color: #00000;
  margin-top:10px;
}
</style>
</head>
<body>
<div>
  <h1>CAN XO SHOP</h1>

		<div id="logo"><a href="index.php"><img style="position:sticky; margin-top:-25px; margin-left:10px;" src="resimler/xo" height="150px" alt="" /></a><span ><a href="index.php" style="position:fixed; margin-top:-10px; margin-left:60px;font-family: Times New Roman, Arial, Helvatica; font-size:17pt; font-weight:600;color:#000000;"><pre>Selected By C A N  K A P L A N<pre></a></span></div>
		<!-- Navigation -->
		<div id="navigation">
		<br />
		<br />
		<br />
		<br />
			<ul>
				<li><a href="index.php" class="active">Ana Sayfa</a></li>
				<?php
				
				$sayfab=bul("SELECT * FROM sayfalar");
				
				while ($sayfabul=al($sayfab))
				{
				?>
				<li><a href="index.php?tur=sayfa&link=<?php echo $sayfabul["sayfa_link"];?>"><?php echo $sayfabul["adi"];?></a></li>
				<?php
				}
				?>
			</ul>
		</div>
		<!-- End Navigation -->
		<div class="cl">&nbsp;</div>
		<!-- Login-details -->
		<div id="login-details">
			<p >Hoşgeldin, <a href="#" id="user">
			<?php
			if(@$_SESSION["giris"]=="tamam")
			{
				
				echo $_SESSION["kadi"];
				echo "  ";
				
			}else{
			
			?>
			 Misafir - Lütfen Giriş Yap
			<?php
			}
			?>
			
			</a></p>
			<p>
						<?php
							if(@$_SESSION["giris"]=="tamam")
							{
							if (@$_SESSION["krutbe"]=="yonetici")
							{
								echo " | <a id='user' href='yonetici/yonet.php?yonet=acik'>Yönetim Paneli</a>";
							}
							?>
							<p><a href="index.php?tur=sepet"   class="cart" ><img src="css/images/cart-icon.png" alt="" /></a><span >Sepet</span> (<span class="sepeturun"><?php
							$ksira=$_SESSION["ksira"];
							$kacurun=mysql_num_rows(bul("SELECT * FROM sepet WHERE ksira = '$ksira'"));
							echo $kacurun;
							?></span>) <a href="index.php?tur=sepet" class="sum">
							<?php
							
							$ksiraa=$_SESSION["ksira"];
							$kacurunr=bul("SELECT * FROM sepet WHERE ksira = '$ksiraa'");
							$toplam=0;
							while($a=al($kacurunr))
							{
								$toplam=$toplam+$a["top_fiyat"];
							}
							echo $toplam;
							
							
							?> TL
							</a></p>
							| <a href="uyepanel/index.php">Üye Paneli</a>
							 | <a href="ayar/uyegir.php?cikis=yap">Çıkış Yap</a>
							<?php
								
							}else{
							?>
							<div  id="newsletter">
					<form action="ayar/uyegir.php?giris=yap" method="post">
						<input type="text" class="field" name="kadi" value="Kullanıcı Adı" title="Kullanıcı Adı" />
						<input type="password" class="field" name="ksifre" value="Şifreniz" title="Şifreniz" />
						<div class="form-buttons"> <a href="index.php?tur=kayit" style="border:1px solid #eee; padding:4px; background-color:#333;color:#fff;">Üye Ol !</a>   <input type="submit" value="Giriş Yap" class="submit-btn" /></div>
					</form>
					</div>	
					<br />
					<?php
							}
					?>
			</p>
		</div>
		<!-- End Login-details -->
	</div>
	<!-- End Header -->
	<!-- Slider -->
	<div id="slider">
		<div class="shell">
			<ul>
			
			<?php
			$uhitbul=bul("SELECT * FROM urunler ORDER BY uhit DESC Limit 4");
			
			while($hiturunler=al($uhitbul))
			{
			?>
				<li>
					<div class="image">
						<img src="<?php echo $hiturunler["resim"];?>" alt="" />
					</div>
					<div class="details">
						<h2 style="font-size:40px;"><?php echo kisalt($hiturunler["adi"],20);?></h2>
						<p class="title">Kategori : <?php katbul($hiturunler["kategori"]);?></p>
						<p class="description"><?php echo kisalt($hiturunler["icerik"],60);?></p>
						<a href="index.php?tur=urun&usira=<?php echo $hiturunler["usira"];?>" class="read-more-btn">Ürüne Bak</a>
					</div>
				</li>
				<?php
			}
				?>
				
			
			</ul>
			<div class="nav">
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
			</div>
		</div>
	</div>
	<!-- End Slider -->
	<!-- Main -->
	<div id="main" class="shell">
		<!-- Sidebar -->
		<div id="sidebar">
		<ul class="categories">
				<li>
					<h4>Kategoriler</h4>
					<ul>
	<li><a href="index.php">Tüm Kategoriler</a></li>
	<?php
	$kat=bul("Select * from kategoriler");
	while ($ka=al($kat))
	{
	?>
	<li><a href="index.php?kat=<?php echo $ka["sira"];?>"><?php echo $ka["adi"];?></a></li>
	<?php
	}
	?>
					</ul>
				</li>
			</ul>
		</div>
		<!-- End Sidebar -->
		<!-- Content -->
		<div id="content">
<?php
	$tur=$_GET["tur"];
	
	switch($tur)
	{
		default:
		include "ayar/sayfalar/anasayfa.php";
		break;
		
		case "sayfa":
		include "ayar/sayfalar/sayfa.php";
		break;
		
		case "urun":
		include "ayar/sayfalar/urun.php";
		break;
		
		case "kayit":
		include"ayar/sayfalar/kayit.php";
		break;
		
		case "sepet":
		include "ayar/sayfalar/sepet.php";
		break;
		
	}
?>
		</div>
		<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	<!-- Footer -->
	<div id="footer" class="shell">
		<div class="top">
			<div class="cnt">
				<div class="col about">
					<h4>Hakkında</h4>
					<p><?php echo ayar("hakkinda");?></p>
				</div>
				<div class="col store">
					<h4>Menu</h4>
					<ul>
				<li><a href="index.php" class="active">Ana Sayfa</a></li>
				<?php
				
				$sayfab=bul("SELECT * FROM sayfalar");
				
				while ($sayfabul=al($sayfab))
				{
				?>
				<li><a href="index.php?tur=sayfa&link=<?php echo $sayfabul["sayfa_link"];?>"><?php echo $sayfabul["adi"];?></a></li>
				<?php
				}
				?>
					</ul>
				</div>
				<div class="col" id="newsletter">
				
				<?php
		if(@$_SESSION["giris"]<>"tamam")
		{
				?>
					<h4>Giriş Yap</h4>
					<p>Alışveriş Yapmak için Lütfen Giriş Yapınız...</p>
					<form action="ayar/uyegir.php?giris=yap" method="post">
						<input type="text" class="field" name="kadi" value="Kullanıcı Adı" title="Kullanıcı Adı" />
						<input type="password" class="field" name="ksifre" value="Şifreniz" title="Şifreniz" />
						<div class="form-buttons"> <a href="index.php?tur=kayit" style="border:1px solid #eee; padding:4px; background-color:#333;color:#fff;">Üye Ol !</a> <input type="submit" value="Giriş Yap" class="submit-btn" /></div>
					</form>
				
			<?php
			}
			?>		
				</div>
				<div class="cl">&nbsp;</div>
				<div class="copy">
					<p>&copy; <a href="#">CANXOSHOP</a>. Kodlama ve Düzenleme : <a href="#">CAN KAPLAN</a></p>
				</div>
			</div>
		</div>
	</div>
	<!-- End Footer -->
	
	<!-- sepet bu -->
	
<div class="sepetbu">
<span style="position:absolute;right:7px; top:3px; background-color:#333;color:#fff; padding:5px; cursor:pointer;" onclick="sepetkapa()">Kapat</span>

<iframe src="ayar/sepet.php" width="100%" height="100%" style="width:100%; height:100%;" frameborder="0"></iframe>
</div>
	
	<!-- #sepet bu -->
	
</body>
</html>