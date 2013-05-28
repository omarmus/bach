$(document).ready(function() {
    $("#slide-toggle-bar").on("click", function () {
    	var header = $("#header"), 
    		show = header.css("marginTop") == "0px",
    		layer1 = show ? $("#nav-left") : header,
    		layer2 = show ? header : $("#nav-left"),
    		body = $("body");
    	layer1.animate(show ? {marginRight: "-100px"} : {marginTop: 0}, function () {
			layer2.animate(show ? {marginTop: "-50"} : {marginRight: 0});
    		$("#slide-toggle-bar strong").animate({opacity: show ? 1 : 0});
    		body.animate(show ? {paddingTop: "20px"} : {paddingRight: "100px"});
    	});
    	body.animate(show ? {paddingRight: 0} : {paddingTop: "70px"});
    })
});