<?php
function bul($b)
{
	return mysql_query($b);
}

function al($a)
{
		return mysql_fetch_array($a);
}


function fiyatne($d)
{
		if($d==0)
		{
			echo "0 TL";
		}else
		{
			echo $d." TL";
		}
}

function ss($s)
{
  return htmlentities($s);
}

function hs($hs)
{
		return htmlentities($hs);
	
}

function katbul($sira)
{
		$katbul=al(bul("Select * from kategoriler WHERE sira=$sira"));
		echo $katbul["adi"];
}

function cinsne($c,$li,$us)
{	
	if($c=="site")
	{
			echo "<a href=".$li.">Siteye Git</a>";
	}elseif($c=="urun")
	{
			echo "<a href='javascript:;' onclick='$.has.sepetekle($us)'>Sepete Ekle</a>";
	}
}

function ayar($ayar)
{
	$site=al(bul("SELECT * FROM site"));
	
	return $site[$ayar];
	
}

function sef_link($baslik){
	$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
	$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
	$perma = strtolower(str_replace($bul, $yap, $baslik));
	$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
	$perma = trim(preg_replace('/\s+/',' ', $perma));
	$perma = str_replace(' ', '-', $perma);
	return $perma;
}

function kisalt($deger,$uzunluk = 50)
{
	if(strlen($deger) > $uzunluk)
	{
			return mb_substr($deger,0,$uzunluk,"UTF-8")."...";
	}
	
	return $deger;
	
}

?>