$(document).ready(function() {
	console.log($("body").width())
	if ($("body").width() > 979) {
		showNavs();
	}
	
    $("#slide-toggle-bar").on("click", showNavs)
});

var showNavs = function() {
	var header = $("#header"), 
		show = header.css("marginTop") == "0px",
		layer1 = show ? $("#nav-left") : header,
		layer2 = show ? header : $("#nav-left"),
		container = $("#container-main");
	layer1.animate(show ? {marginRight: -79} : {marginTop: 0}, function () {
		layer2.animate(show ? {marginTop: -53} : {marginRight: 0});
		$("#slide-toggle-bar strong").animate({opacity: show ? 1 : 0});
		container.animate(show ? {paddingTop: 3} : {paddingRight: 60});
	});
	container.animate(show ? {paddingRight: 0} : {paddingTop: 53}).toggleClass("nav-hidden");
}

