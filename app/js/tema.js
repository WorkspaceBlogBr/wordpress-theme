$(function(){

	$("ul.tab li a").bind("click", function(){
		var hash = $(this).attr("href").replace("#",".");
		var actual = $(hash);
		
		if(actual.hasClass("active")){
			return;
		}
			
		$(this).parents("ul").find("li.active").removeClass("active");
		
		$(this).parents("section").find("div.tab.active").fadeOut("fast", function(){
			$(this).removeClass("active");
			$(hash).fadeIn("normal", function(){
				$(this).addClass("active");
			});
		});
		
		$(this).parents("li").addClass("active");
		
		
	})

});