<?php
	include "../ayar/ayar.php";
	if($_SESSION["krutbe"]=="yonetici" && $_GET["yonet"]=="acik")
	{
		?>
		<!DOCTYPE HTML>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<title>E-Ticaret Sitesi Yönetici Paneli</title>
	<link rel="stylesheet" href="stil/stil.css" />
</head>
<body>
	<table class="tablo" width="100%" height="20px">
		<tr class="menu">
			<td><img src="resimler/logo"height="150px" style="margin-left:20px;" /></td>
			<td align="right">
				<table class="kullanici">
					<tr>
						<td colspan="2" align="left">Hoşgeldiniz</td>
					</tr>
					<tr>
						<td><img src="resimler/avatar.jpg" width="30px" height="30px" /></td>
						<td>
								<ul class="kmenu">
									<li><?php echo $_SESSION["kadi"];?>
											<ol>
												<li><a href="../ayar/uyegir.php?cikis=yap">Çıkış</a></li>
											</ol>
										</li>
								</ul>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td width="200px" valign="top">
					<ul class="menu">
						<li><img src="resimler/menu.gif" width="13px" height="13px" />Kategori Yöneticisi
							<ol class="altmenu">
								<li><img src="resimler/altmenu.gif" width="13px" height="13px" /><a href="yonet.php?yonet=acik&menu=kategoriler">Kategoriler</a></li>
								<li><img src="resimler/altmenu.gif" width="13px" height="13px" /><a href="yonet.php?yonet=acik&menu=yenikategori">Yeni Kategori Ekle</a></li>
							</ol>
						</li><br>
						<li><img src="resimler/menu.gif" width="13px" height="13px" />Üye Yöneticisi
							<ol class="altmenu">
								<li><img src="resimler/altmenu.gif" width="13px" height="13px" /><a href="yonet.php?yonet=acik&menu=uyeler">Üyeler</a></li>
								<li><img src="resimler/altmenu.gif" width="13px" height="13px" /><a href="yonet.php?yonet=acik&menu=yeniuye">Yeni Üye Ekle</a></li>
							</ol>
						</li><br>
						
					</ul>
			</td>
			<td valign="top">
			<div class="menu icerik">
			<?php
			$menune=$_GET["menu"];
			$goster=1;
			
			switch($menune)
			{
				case "kategoriler":
				include "sayfalar/kategoriler/kategoriler.php";
				break;
				
				case "yenikategori":
				include "sayfalar/kategoriler/yenikategori.php";
				break;
				
				case "yeniuye":
				include "sayfalar/uyeler/yeniuye.php";
				break;
				
				case "uyeler":
				include "sayfalar/uyeler/uyeler.php";
				break;
				
				
				default:
				include "sayfalar/anasayfa.php";
				break;
				
				
			}
			
			
			?>
			</div>
			</td>
		</tr>
		</table>

</body>
</html>
		
		<?php
	}else
	{
		header("Location: ../index.php");
		
	}
?>