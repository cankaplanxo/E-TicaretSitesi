<?php
if($goster==1)
{
		if($_GET["kategori"]=="duzenle")
		{
			$sira=$_GET["sira"];
		$katbul=al(bul("SELECT * FROM kategoriler WHERE sira='$sira'"));
		?>
							<span class="menuadi">Kategori Düzenle</span>
						<hr>
						<br />
		<form action="" method="post">
			<table align="center">
				<tr>
					<td>Adı:</td>
					<td><input type="text" value="<?php echo $katbul["adi"];?>" name="adi" /></td>
				</tr>
				<tr>
					<td>Açıklama:</td>
					<td><input type="text" value="<?php echo $katbul["aciklama"];?>" name="aciklama" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><button class="kaydet" type="submit">Kaydet</button></td>
				</tr>
			</table>
		</form>		
		<?php 
		if($_POST)
		{
			
		$adi=hs($_POST["adi"]);
		$aciklama=hs($_POST["aciklama"]);
			
						if($adi=="" || $aciklama=="")
			{
				echo '
				<ul class="statu">
				<li class="uyari">Uyari : Lütfen Boş Alan Bırakmayınız....</li>
				</ul>
				';
				
			}else
				{
			
			$gun=bul("UPDATE kategoriler SET
			adi = '$adi',
			aciklama = '$aciklama' WHERE sira= '$sira'");
			
						if($gun)
			{		
					echo '
					<ul class="statu">
					<li class="basarili">Başarılı : Kategori Başarıyla Düzenlenmiştir..</li>
					</ul>
					';
					header("Refresh:2 ; url = yonet.php?yonet=acik&menu=kategoriler");
			}else 
			{
				echo '
				<ul class="statu">
				<li class="hata">Hata : '.mysql_error().'.</li>
				</ul>
				';
				
			}
				}
			
			
		}	
		
		
		?>
		<br />
		<br />
		<br />
		<?php
			
		}elseif($_GET["kategori"]=="sil")
		{
			$sira=$_GET["sira"];
			
			$sil = bul("DELETE FROM kategoriler WHERE sira=$sira");
			if($sil)
			{		
					echo '
					<ul class="statu">
					<li class="basarili">Başarılı : Kategori Başarıyla Silinmiştir..</li>
					</ul>
					';
					header("Refresh:2 ; url = yonet.php?yonet=acik&menu=kategoriler");
			}else 
			{
				echo '
				<ul class="statu">
				<li class="hata">Hata : '.mysql_error().'.</li>
				</ul>
				';
				
			}
		}else{
			?>
					<span class="menuadi">Kategoriler</span>
						<hr>
						<br />
<div style="text-align:center;">
						<table align="center" style="width:100%;">
							<tr>
								<td><b>Adı</b></td>
								<td><b>Açıklama</b></td>
								<td><b>İşlem</b></td>
							</tr>
<?php
	$kategoriler=bul("SELECT * FROM kategoriler");
	
	while($kat=al($kategoriler))
	{
?>
					<form action="yonet.php?yonet=acik&menu=kategoriler&kategori=duzenle&sira=<?php echo $kat["sira"];?>" method="post">
							
							<tr>
								<td><?php echo $kat["adi"];?></td>
								<td><?php echo $kat["aciklama"];?></td>
								<td> <button type="submit" class="duzenle">Düzenle</button> | <a onclick="return confirm('Silmek istediğinizden Emin misiniz?')" href="yonet.php?yonet=acik&menu=kategoriler&kategori=sil&sira=<?php echo $kat["sira"];?>">Sil</a></td>
							</tr>
							
					</form>
							
<?php
	}
?>
						</table>
</div>
						
						
						<br />
						<br />
						<br />
						<br />
						<br />
			
			<?php
		}
	
	
}else
{
	echo "Senin burada ne işin var ?";
	
}

?>