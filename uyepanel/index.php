<?php
	include "../ayar/ayar.php";
	if($_SESSION["giris"]=="tamam")
	{
		?>
		<!DOCTYPE HTML>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<title>E-Ticaret Sitesi Üye Paneli</title>
	<link rel="stylesheet" href="stil/stil.css" />
	
		<script type="text/javascript" src="../js/jquery.js"></script>
	<link href="../ayar/editor/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../ayar/editor/css/froala_editor.min.css" rel="stylesheet" type="text/css">
	<link href="../ayar/editor/css/themes/royal.css" rel="stylesheet" type="text/css">

    <script src="../ayar/editor/js/froala_editor.min.js"></script>
  <!--[if lt IE 9]>
    <script src="../ayar/editor/js/froala_editor_ie8.min.js"></script>
  <![endif]-->
  <script src="../ayar/editor/js/plugins/tables.min.js"></script>
  <script src="../ayar/editor/js/plugins/lists.min.js"></script>
  <script src="../ayar/editor/js/plugins/colors.min.js"></script>
  <script src="../ayar/editor/js/plugins/media_manager.min.js"></script>
  <script src="../ayar/editor/js/plugins/font_family.min.js"></script>
  <script src="../ayar/editor/js/plugins/font_size.min.js"></script>
  <script src="../ayar/editor/js/plugins/block_styles.min.js"></script>
  <script src="../ayar/editor/js/plugins/video.min.js"></script>
  <script src="../ayar/editor/js/langs/tr.js"></script>

	  <script>
      $(function(){
	
		$('#resim').editable({inlineMode: false, language: 'tr', width:'500px', theme: 'royal' , buttons: ['insertImage']})	
		$('#icerik').editable({inlineMode: false, language: 'tr', width:'500px', theme: 'royal' })	

		  
	  });
  </script>


	
</head>
<body>
	<table class="tablo" width="100%" height="20px">
		<tr class="menu">
			<td><img src="resimler/xo" height="150px" alt="" style="margin-left:20px;" /></td>
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
						<li><img src="resimler/menu.gif" width="13px" height="13px" />Ürün Yöneticisi
							<ol class="altmenu">
								<li><img src="resimler/altmenu.gif" width="13px" height="13px" /><a href="index.php?menu=urunler">Ürünleriniz</a></li>
								<li><img src="resimler/altmenu.gif" width="13px" height="13px" /><a href="index.php?menu=yeniurun">Yeni Ürün Ekle</a></li>
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
				
				case "urunler":
				include "sayfalar/urunler.php";
				break;
				
				case "yeniurun":
				include "sayfalar/yeniurun.php";
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