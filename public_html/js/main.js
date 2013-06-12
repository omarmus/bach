$(document).ready(function() {
	showNavs();
    $("#slide-toggle-bar").on("click", showNavs)
});

var showNavs = function() {
	var header = $("#header"), 
		show = header.css("marginTop") == "0px",
		layer1 = show ? $("#nav-left") : header,
		layer2 = show ? header : $("#nav-left"),
		container = $("#container-main");
	layer1.animate(show ? {marginRight: "-79px"} : {marginTop: 0}, function () {
		layer2.animate(show ? {marginTop: "-50px"} : {marginRight: 0});
		$("#slide-toggle-bar strong").animate({opacity: show ? 1 : 0});
		container.animate(show ? {paddingTop: "20px"} : {paddingRight: "80px"});
	});
	container.animate(show ? {paddingRight: 0} : {paddingTop: "70px"});
}