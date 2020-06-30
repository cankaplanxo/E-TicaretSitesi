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
					<td><input type="text" value="" name="adi" /></td>
				</tr>
				<tr>
					<td>Açıklama:</td>
					<td><input type="text" value="" name="aciklama" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><button class="yeni" type="submit">Yeni Ekle</button></td>
				</tr>
			</table>
		</form>	
		<br />
		<br />
		<br />
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
							$ekle=bul("INSERT INTO kategoriler SET
		adi  = '$adi' ,
		aciklama = '$aciklama'");
		if($ekle)
			{		
					echo '
					<ul class="statu">
					<li class="basarili">Başarılı : Kategori Başarıyla Eklenmiştir..</li>
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
}else
{
	echo "Senin burada ne işin var ?";
	
}
?>