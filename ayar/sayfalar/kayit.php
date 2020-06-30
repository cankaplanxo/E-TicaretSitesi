			<?php
			
			if(@$_SESSION["giris"]<>"tamam")
			{
				
				
				if($_GET["kayit"]=="ol")
				{
					$kadi=$_POST["kadi"];
					$ksifre=md5($_POST["ksifre"]);
					$kmail=$_POST["kmail"];
					$ktel=$_POST["ktel"];
					
					if(!$kadi || !$ksifre || !$kmail)
					{
						?>
						<script type="text/javascript">
						alert("Lütfen Zorunlu Alanların Hepsini Doldurunuz...");
						</script>
						<?php
					}else
					{
						
						$kayitet=bul("INSERT INTO uyeler SET kadi = '$kadi',  ksifre = '$ksifre' , kmail = '$kmail', ktel = '$ktel' , krutbe='uye'");
						
						if($kayitet)
						{
							?>
							<script type="text/javascript">
							alert("Başarıyla Kayıt Oldunuz.. \n Lütfen Giriş Yapınız... \n  Ana Sayfaya Yönlendiriliyorusunuz...");
							window.open("index.php","_top");
							</script>
							<?php
						}
					}
					
					
				}
			

			
			
			
			
			?>
			
			
			<h2 style="color:black; font-weight:100; font-size:30px;">Sitemize Kayıt Oluyorsunuz...</h2>
			<style type="text/css">
			#kayit
			{
				margin-top:20px;
				margin-left:150px;
				
			}
			#kayit input
			{
				padding:5px;
				font-family:Vernada;
				font-size:13px;
				border:2px double #eee;
				
			}
			</style>
				<form action="index.php?tur=kayit&kayit=ol" method="post">
					<table id="kayit" align="center">
						<tr>
							<td>Kullanıcı Adı:</td>
							<td><input type="text" name="kadi" /><span style="color:red;">*</span></td>
						</tr>
						<tr>
							<td>Şifre:</td>
							<td><input type="password" name="ksifre" /><span style="color:red;">*</span></td>
						</tr>
						<tr>
							<td>E-Posta:</td>
							<td><input type="email" name="kmail" /><span style="color:red;">*</span></td>
						</tr>
						<tr>
							<td>Telefon No:</td>
							<td><input type="number" name="ktel" /></td>
						</tr>
						<tr>
							<td></td>
							<td align="right"><input type="submit" value="Kayıt OL" /></td>
						</tr>
						<tr>
							<td><span style="color:red;">*</span> olan alanların doldurulması zorunludur...</td>
							<td></td>
						</tr>
					</table>
				</form>
			<?php
			}
			else
				
				{
					echo "<h3>Zaten Sitenize Kayıtlı ve Giriş Yapmış Görünüyorsunuz...</h3>";
					
				}
			?>