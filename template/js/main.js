$(document).ready(function() {
    $("#slide-toggle-bar").on("click", function () {
    	var nav = $("#main-nav");
    	nav.animate({marginTop: nav.css("marginTop") == "0px"?"-50px":0}, function () {
    		$("#slide-toggle-bar strong").animate({opacity: nav.css("marginTop") == "0px"?0:1}, 100);
    	});
    	$("body").animate({paddingTop: nav.css("marginTop") == "0px"?"10px":"60px"});
    })
});