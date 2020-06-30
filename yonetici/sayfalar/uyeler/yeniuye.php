<?php
if($goster==1)
{
	?>
	<span class="menuadi">Kategori Düzenle</span>
						<hr>
						<br />
				<form action="" method="post">
			<table align="center">
				<tr>
					<td>Adı:</td>
					<td><input type="text" value="" name="kadi" /></td>
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
					<td><input type="text" value="" name="kmail" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Telefon:</td>
					<td><input type="text" value="" name="ktel" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Rütbe:</td>
					<td><select name="krutbe" id="">
					<option value="yonetici" >Yönetici</option>
					<option value="yardimci">Yardımcı</option>
					<option value="uye">Üye</option>
					</select></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><button class="yeni" type="submit">Yeni Üye Ekle</button></td>
				</tr>
			</table>
		</form>
		<br />
		<br />
		<br />
	<?php
	
	if($_POST)
	{
		$kadi=hs($_POST["kadi"]);
		$ksifre=md5(hs($_POST["ksifre"]));
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
							$ekle=bul("INSERT INTO uyeler SET
			kadi = '$kadi',
			ksifre = '$ksifre',
			kmail = '$kmail' ,
			ktel = '$ktel',
			krutbe = '$krutbe'");
		if($ekle)
			{		
					echo '
					<ul class="statu">
					<li class="basarili">Başarılı : Üye Başarıyla Eklenmiştir..</li>
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
}else
{
	echo "Senin burada ne işin var ?";
	
}
?>