<?php 
if($goster==1)
{
	
	if($_GET["urun"]=="duzenle")
	{
		$usira=$_GET["urunsira"];
		
		$urunoku=al(bul("SELECT * FROM urunler WHERE usira = '$usira'"));
		
		?>
		
		
		
		<style type="text/css">
#klink
{
	<?php
	if($urunoku["cins"]=="urun")
	{
	?>
	display:none;
	<?php
	}
	?>
}
</style>
	
	<script type="text/javascript">
	$(function(){
		$("select[name=cins]").click(function(){
			
			
				var deger =	$("select[name=cins]").val();		
	
	if(deger=="site")
	{
		$("#klink").show(500);
		
	}else
	{
		$("#klink").hide(500);
		
	}
			
			
			
		});

	
	
	
	
		
	});
	</script>
			<span class="menuadi">Ürün Düzenle</span>
						<hr>
						<br />
						
						<form action="index.php?menu=urunler&urun=duzenle&urunu=dzn" method="post">
						<table align="center">
							<tr>
								<td>Ürün Adı</td>
								<td><input type="text" name="adi" value="<?php echo $urunoku["adi"];?>" /></td>
							</tr>
							<tr>
								<td>Ürün İçerik</td>
								<td><textarea name="icerik" id="icerik" cols="30" rows="10"><?php echo $urunoku["icerik"];?></textarea></td>
							</tr>
							<tr>
								<td>Fiyat</td>
								<td><input type="number" name="fiyat" value="<?php echo $urunoku["fiyat"];?>" /></td>
							</tr>
							<tr>
								<td>Kategori</td>
								<td>
								<select name="kategori" id="">
							<?php
	$kat=bul("Select * from kategoriler");
	while ($ka=al($kat))
	{
	?>
									<option value="<?php echo $ka["sira"];?>" <?php if ($urunoku["kategori"]==$ka["sira"]){?>selected<?php } ?>><?php echo $ka["adi"];?></option>
										<?php
	}
	?>
								</select>
								</td>
							</tr>
							<tr>
								<td>Resim</td>
								<td>
								<input type="url" value="<?php echo $urunoku["resim"];?>" name="resim" placeholder="Lütfen Bir Resim Adresi Giriniz..." />
								</td>
							</tr>
							<tr>
								<td>Cins</td>
								<td>
								<select name="cins" id="">
									<option value="site" <?php echo $urunoku["cins"]=="site" ? "selected" : null; ?>>Site</option>
									<option value="urun" <?php echo $urunoku["cins"]=="urun" ? "selected" : null; ?>>Ürün</option>
								</select>
								</td>
							</tr>
							<tr id="klink">
								<td>Link</td>
								<td><input type="url" value="<?php echo $urunoku["link"];?>" name="link" /></td>
							</tr>
							<tr>
								<td></td>
								<td align="right"><button class="duzenle" type="submit">Ürün Düzenle</button></td>
							</tr>
						</table>
						</form>
						<br />
						<br />
						<br />
						<br />
						
						
						<?php
						
						if(@$_GET["urunu"]=="dzn")
						{
							$adi=$_POST["adi"];
							$icerik=$_POST["icerik"];
							$kategori=$_POST["kategori"];
							$link=$_POST["link"];
							$cins=$_POST["cins"];
							$fiyat=$_POST["fiyat"];
							$resim=$_POST["resim"];
							$ksira=$_SESSION["ksira"];
							
							$uekle=bul("UPDATE urunler SET
							adi = '$adi',
							icerik = '$icerik',
							kategori = '$kategori',
							link = '$link',
							cins = '$cins',
							fiyat = '$fiyat',
							resim = '$resim',
							ksira = '$ksira' WHERE usira = '$usira'");
							
							if($uekle)
							{
								?>
								<script type="text/javascript">
								alert("Ürün Başarıyla Düzenlenmiştir..");
								window.open("index.php?menu=urunler","_top");
								</script>
								<?php
							}
							
							
							
						}
						
						?>
		
		
		
		
		
		
		
		
		
		
		
		<?php
	}elseif($_GET["urun"]=="sil")
	{
		$urunsira=$_GET["urunsira"];
		$ksira=$_SESSION["ksira"];
		if(!$urunsira){
			header("Location:../index.php");
		}else
		{
			
			$sil=bul("DELETE FROM urunler WHERE usira='$urunsira' && ksira='$ksira'");
			
			if($sil)
			{
				?>
				<ul class="statu">
					<li class="basarili">Başarılı : Ürününüz Başarıyla Silindi....</li>
				</ul>
				<?php
				header("Refresh:3;url=index.php?menu=urunler");
			}else
				
				{
					
					?>
						<ul class="statu">
					<li class="hata">hata : Ürün silinirken hata oluştu... Hata: <?php echo mysql_error();?></li>
				</ul>
					<?php
				}
			
			
			
		}
		
	}else
	{
		?>
		
								<span class="menuadi">Ürünleriniz</span>
						<hr>
						<br />
						
					<table width="100%" style="padding:5px; font-size:18px;" align="center">
						<tr bgcolor="black" style="color:#fff; padding:10px;"  align="center">
								<td>Ürün Adı</td>
								<td>Cins</td>
								<td>Kategori</td>
								<td>Fiyat</td>
								<td>İşlemler</td>
						</tr>
					<?php
					$ksira=$_SESSION["ksira"];
					$urunleriniz=bul("SELECT * FROM urunler WHERE ksira = '$ksira'");
					while($urunler=al($urunleriniz))
					{
					?>
					
					<tr  align="center">
						<td><?php echo $urunler["adi"];?></td>
						<td><?php echo $urunler["cins"];?></td>
						<td><?php katbul($urunler["kategori"]);?></td>
						<td><?php echo $urunler["fiyat"];?> TL</td>
						<td><!-- beta aşamasında {<a class="duzenle" href="index.php?menu=urunler&urun=duzenle&urunsira=<?php echo $urunler["usira"];?>">Düzenle</a>} - --><a onclick="return confirm('Silinsin mi ?')" href="index.php?menu=urunler&urun=sil&urunsira=<?php echo $urunler["usira"];?>" class="sil">Sil</a></td>
					</tr>
					
					<?php
					}
					?>
					</table>
					<br />
					<br />
		
		
		<?php
	}
	
	
}
else
{
	echo "Geri Dön";
	
}

?>