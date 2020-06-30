			<?php
			$usira=$_GET["usira"];
			
			$urun=bul("SELECT * FROM urunler WHERE usira='$usira'");
			
			
			$guncelle=bul("UPDATE urunler set uhit=uhit+1 Where usira='$usira'");

			
			if(mysql_affected_rows())
			{
			$urn=al($urun);
			?>
			
			<!-- Products -->
			<div class="products">
				<h3><?php echo $urn["adi"];?></h3>
<p class="info">
<table width="100%" align="center">
<tr>
	<td>
		<a href="<?php echo $urn["resim"];?>"><img src="<?php echo $urn["resim"];?>" style="width:100%; height:350px;" alt="" /></a>
	</td>
</tr>
	<tr>
		<td valign="top"><?php echo $urn["icerik"];?>
		<br />
		Görüntülenme: <?php echo $urn["uhit"];?>
		<br />
		<br />
		<br />
		<p class="urun_sayfa">
		<span class="price"><?php fiyatne($urn["fiyat"])?></span>&nbsp; <br />
		<?php cinsne($urn["cins"],$urn["link"],$urn["usira"])?>  </p>
		</td>
	</tr>
</table>
</p>
			</div>
			<div class="cl">&nbsp;</div>
			<!-- Best-sellers -->
			<hr />
			<!-- End Best-sellers -->
			
			<?php
			}
			else
				
				{
					echo "<h3>404 böyle bir sayfa bulunamadı..</h3>";
					
				}
			?>