			<?php
			$link=$_GET["link"];
			
			$sayfa=bul("SELECT * FROM sayfalar WHERE sayfa_link='$link'");
			
			if(mysql_affected_rows())
			{
			$sf=al($sayfa);
			?>
			
			<!-- Products -->
			<div class="products">
				<h3><?php echo $sf["adi"];?></h3>
<p>
<?php echo $sf["icerik"];?>
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