$(function(){
		
	$(window).scroll(function(){
	
	var kay = $(window).scrollTop();
	var altkay = $(document).height();
	var altkay2 = $(window).height() + $(window).scrollTop(); 
	
	if(kay>0)
	{
		$("#ustmenu").addClass("sabitle");
		$(".menu").addClass("menusabitle");

		
	}else
	{	
		$("#ustmenu").removeClass("sabitle");
		$(".menu").removeClass("menusabitle");
	}
	
	if((altkay - altkay2)/altkay === 0)
	{
		$(".altmenu").addClass("altta");
		
	}else
	{
		$(".altmenu").removeClass("altta");
		
	}
	
	});

	$(".aragari").click(function(){
	var yazi = $(".aragari").text();
		
	if (yazi == "Aramayı Aç")
	{
		$("#arama").css("display","block");
		$(".aragari").text("Aramayı Kapat");
	}else{
		
		$("#arama").css("display","none");
		$(".aragari").text("Aramayı Aç");
	}
		
	});

	$.has = {
		
		sepetekle : function($us){
			var $deger = "urunsira="+$us;
			$.ajax({
				type : "post",
				data : $deger,
				url : "sepet.php?urun=ekle",
				success : function(cevap){
					
					alert(cevap);
				}
				
				
			});
			
		},
		
		
	};
	
	
	
	
	
});

function sepetac()
{
		$(".sepetbu").show(1000);
}
function sepetkapa()
{
		$(".sepetbu").hide(500);
}
