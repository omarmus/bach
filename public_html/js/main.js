$(document).ready(function() {
	if ($("body").width() > 979) {
		showNavs();
	}
	$('.data-table').dataTable();
	
    $("#slide-toggle-bar").on("click", showNavs)
});

$.extend( true, $.fn.dataTable.defaults, {
	"sDom": "<'row-fluid'<'span9'><'span3'l>r>t<'row-fluid'<'span4'i><'span8'p>>",
	"bFilter": false,
	"sPaginationType": "full_numbers",
	"oLanguage": {
        "sLengthMenu": "Rows _MENU_",
        "sZeroRecords": "Nothing found - sorry",
        "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
        "sInfoEmpty": "Showing 0 to 0 of 0 records",
        "oPaginate": {
	        "sNext": "&raquo;",
	        "sPrevious": "&laquo;"
	    }
    }
} );

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

