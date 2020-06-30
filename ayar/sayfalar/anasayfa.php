			<!-- Products -->
			<div class="products">
				<h3>Tüm Ürünler</h3>
				<ul>
				<?php
if($_GET["kat"])
{
		$urunler=bul("Select * from urunler WHERE kategori=".$_GET["kat"]);
}else
{
	$urunler=bul("Select * from urunler");
}
$varmi=0;
while ($urun=al($urunler))
{

?>
					<li>
						<div class="product">
							<p class="info">
								<span class="holder">
									<img src="<?php echo $urun["resim"];?>" alt="" />
									<span class="book-name"><a href="index.php?tur=urun&usira=<?php echo $urun["usira"];?>"><?php echo $urun["adi"];?></a></span>
									<span class="author">Kategori :  <span onclick="window.open('index.php?kat=<?php echo $urun["kategori"];?>','_top')" style="cursor:pointer;"><?php katbul($urun["kategori"])?></span></span>
									<span class="description"><?php echo kisalt($urun["icerik"]);?></span>
								</span>
							</p>
							<p class="buy-btn" style="text-align:center;"><?php cinsne($urun["cins"],$urun["link"],$urun["usira"])?> &nbsp;</p>
							<?php
							if($urun["cins"] != "site")
							{
								?>
								<p class="buy-btn" style="bottom:-20px;">
								<span class="price"><?php fiyatne($urun["fiyat"])?></span>
								</p>
								<?php
							}
							?>
						</div>
					</li>
					
	<?php
$varmi++;
}
if($varmi==0)
{
	echo "Bu Kategoride Şuanda Hiç Ürün Bulunmuyor...";
	
}
?>
	
				</ul>
			<!-- End Products -->
			</div>
			<div class="cl">&nbsp;</div>
			<!-- Best-sellers -->
			<hr />
			<!-- End Best-sellers -->