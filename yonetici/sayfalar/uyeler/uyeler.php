<?php
if($goster==1)
{
		if($_GET["uye"]=="duzenle")
		{
			$sira=$_GET["sira"];
		$katbul=al(bul("SELECT * FROM uyeler WHERE ksira='$sira'"));
		?>
							<span class="menuadi">Üye Düzenle</span>
						<hr>
						<br />
		<form action="" method="post">
			<table align="center">
				<tr>
					<td>Adı:</td>
					<td><input type="text" value="<?php echo $katbul["kadi"];?>" name="kadi" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Şifre:</td>
					<td><input type="password" value="" name="ksifre" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>E-Posta:</td>
					<td><input type="text" value="<?php echo $katbul["kmail"];?>" name="kmail" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Telefon:</td>
					<td><input type="text" value="<?php echo $katbul["ktel"];?>" name="ktel" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Rütbe:</td>
					<td><select name="krutbe" id="">
					<option value="yonetici" <?php echo $katbul["krutbe"]=="yonetici" ? 'selected' : null ;?>>Yönetici</option>
					<option value="yardimci"<?php echo $katbul["krutbe"]=="yardimci" ? 'selected' : null ;?>>Yardımcı</option>
					<option value="uye"<?php echo $katbul["krutbe"]=="uye" ? 'selected' : null ;?>>Üye</option>
					</select></td>
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
			
		$kadi=hs($_POST["kadi"]);
		$ksifre=hs($_POST["ksifre"]);
		if($ksifre=="")
		{
				$sifrebul=al(bul("Select * from uyeler where ksira = '$sira'"));
				
				$ksifre=$sifrebul["ksifre"];
			
		}else
		{
			$ksifre=md5($ksifre);
			
		}
		$kmail=hs($_POST["kmail"]);
		$ktel=hs($_POST["ktel"]);
		$krutbe=hs($_POST["krutbe"]);
		
			
						if($kadi=="" || $kmail=="")
			{
				echo '
				<ul class="statu">
				<li class="uyari">Uyari : Lütfen Boş Alan Bırakmayınız....</li>
				</ul>
				';
				
			}else
				{
			
			$gun=bul("UPDATE uyeler SET
			kadi = '$kadi',
			ksifre = '$ksifre',
			kmail = '$kmail' ,
			ktel = '$ktel',
			krutbe = '$krutbe' WHERE ksira= '$sira'");
			
						if($gun)
			{		
					echo '
					<ul class="statu">
					<li class="basarili">Başarılı : Üye Başarıyla Düzenlenmiştir..</li>
					</ul>
					';
					header("Refresh:2 ; url = yonet.php?yonet=acik&menu=uyeler");
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
			
		}elseif($_GET["uye"]=="sil")
		{
			$sira=$_GET["sira"];
			
			$sil = bul("DELETE FROM uyeler WHERE ksira=$sira");
			if($sil)
			{		
					echo '
					<ul class="statu">
					<li class="basarili">Başarılı : Üye Başarıyla Silinmiştir..</li>
					</ul>
					';
					header("Refresh:2 ; url = yonet.php?yonet=acik&menu=uyeler");
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
					<span class="menuadi">Tüm Üyeler</span>
						<hr>
						<br />
<div style="text-align:center;">
						<table align="center" style="width:100%;">
							<tr>
								<td><b>Adı</b></td>
								<td><b>Rütbe</b></td>
								<td><b>Sepet'te Şuanda</b></td>
								<td><b>İşlem</b></td>
							</tr>
<?php
	$kategoriler=bul("SELECT * FROM uyeler");
	
	while($kat=al($kategoriler))
	{
		$kauyeno=$kat["ksira"];
		$sepettopbul=al(bul("SELECT count(ksira) as ToplamUrun,Sum(top_fiyat) as TopFiyat FROM sepet WHERE ksira='$kauyeno' GROUP BY ksira"));
?>
					<form action="yonet.php?yonet=acik&menu=uyeler&uye=duzenle&sira=<?php echo $kat["ksira"];?>" method="post">
							
							<tr>
								<td><?php echo $kat["kadi"];?></td>
								<td><?php echo $kat["krutbe"];?></td>
								<td><?php echo $sepettopbul["ToplamUrun"];?> Ürün , <?php echo $sepettopbul["TopFiyat"];?> TL</td>
								<td> <button type="submit" class="duzenle">Düzenle</button> | <a onclick="return confirm('Silmek istediğinizden Emin misiniz?')" href="yonet.php?yonet=acik&menu=uyeler&uye=sil&sira=<?php echo $kat["ksira"];?>">Sil</a></td>
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