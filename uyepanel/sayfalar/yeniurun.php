<?php 
if($goster==1)
{
	?>
<style type="text/css">
#klink
{
	display:none;
	
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
			<span class="menuadi">Yeni Ürün Ekle</span>
						<hr>
						<br />
						
						<form action="index.php?menu=yeniurun&yeni=ekle" method="post">
						<table align="center">
							<tr>
								<td>Ürün Adı</td>
								<td><input type="text" name="adi" /></td>
							</tr>
							<tr>
								<td>Ürün İçerik</td>
								<td><textarea name="icerik" id="icerik" cols="30" rows="10"></textarea></td>
							</tr>
							<tr>
								<td>Fiyat</td>
								<td><input type="number" name="fiyat" /></td>
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
									<option value="<?php echo $ka["sira"];?>"><?php echo $ka["adi"];?></option>
										<?php
	}
	?>
								</select>
								</td>
							</tr>
							<tr>
								<td>Resim</td>
								<td>
								<input type="url" name="resim" placeholder="Lütfen Bir Resim Adresi Giriniz..." />
								</td>
							</tr>
							<tr>
								<td>Cins</td>
								<td>
								<select name="cins" id="">
									<option value="site">Site</option>
									<option value="urun" selected>Ürün</option>
								</select>
								</td>
							</tr>
							<tr id="klink">
								<td>Link</td>
								<td><input type="url" name="link" /></td>
							</tr>
							<tr>
								<td></td>
								<td align="right"><button class="kaydet">Ürün Ekle</button></td>
							</tr>
						</table>
						</form>
						<br />
						<br />
						<br />
						<br />
						
						
						<?php
						
						if(@$_GET["yeni"]=="ekle")
						{
							$adi=$_POST["adi"];
							$icerik=$_POST["icerik"];
							$kategori=$_POST["kategori"];
							$link=$_POST["link"];
							$cins=$_POST["cins"];
							$fiyat=$_POST["fiyat"];
							$resim=$_POST["resim"];
							$ksira=$_SESSION["ksira"];
							
							$uekle=bul("INSERT INTO urunler SET
							adi = '$adi',
							icerik = '$icerik',
							kategori = '$kategori',
							link = '$link',
							cins = '$cins',
							fiyat = '$fiyat',
							resim = '$resim',
							ksira = '$ksira',
							uhit = 0 ");
							
								if($uekle)
			{		
					echo '
					<ul class="statu">
					<li class="basarili">Başarılı : Ürün Başarıyla Eklenmiştir.....</li>
					</ul>
					';
					header("Refresh:2 ; url = index.php?menu=urunler");
			}else 
			{
				echo '
				<ul class="statu">
				<li class="hata">Hata : '.mysql_error().'.</li>
				</ul>
				';
				
			}
							
							
							
						}
						
						?>
						
	<?php
	
}

?>