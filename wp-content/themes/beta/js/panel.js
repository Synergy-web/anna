// DEMO - SETTINGS //





$(window).load(function(){
	$(".trigger").click(function(){
		$(".contactpanel").toggle("fast");
		$(this).toggleClass("active");
		return false;
	});
});