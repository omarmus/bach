var oTable;

$(document).ready(function() {
	if ($("body").width() > 979) {
		showNavs();
	}

	oTable = $('#main-table').dataTable();
	
    $("#slide-toggle-bar").on("click", showNavs)
});

$.extend( true, $.fn.dataTable.defaults, {
	"sDom": "<'row-fluid'<'span9'><'span3'l>r>t<'row-fluid'<'span4'i><'span8'p>>",
	"bFilter": false,
	"sPaginationType": "full_numbers",
	"aoColumnDefs" : [
		{"bVisible": false, "aTargets": [ 0 ]}, 
		{"bSortable": false, "aTargets": [ 1 ] }
	],
	// "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	"oLanguage": {
        "sLengthMenu": "Rows _MENU_",
        "sZeroRecords": "Nothing found - sorry",
        "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
        "sInfoEmpty": "Showing 0 to 0 of 0 records",
        "oPaginate": {
	        "sNext": "&raquo;",
	        "sPrevious": "&laquo;"
	    }
    },
    "fnInitComplete" : function() {
    	var that = this,
			firstTH = $(that).find('th')[0],
			total = that.$('tr').length,
			th = document.createElement('th');
    	th.innerHTML = "<i></i>";
    	th.className = "check-all";
    	th.onclick = function () {
    		var toggle = (total == that.$('tr.info').length?'remove':'add') + 'Class';
    		$(firstTH).parent()[toggle]('all-selected');
    		that.$('tr')[toggle]('info');
    		var now = that.$('tr.info').length;
    		$($(that).parent().find('.row-fluid .span9')[0]).html(now?'<label><strong>'+now+'</strong> row'+(now>1?'s':'')+' selected.</label>':'');
    	}
		$(firstTH).parent().prepend(th);
		that.$('tr').each(function () {
			var firstTD = this;
	    	var td = document.createElement('td');
	    	td.className = "check-item";
	    	td.innerHTML = '<i></i>';
	    	td.onclick = function () {
	    		$(firstTD).toggleClass('info');
	    		var now = that.$('tr.info').length
	    		$(firstTH).parent()[(total == now?'add':'remove') + 'Class']('all-selected');
	    		$($(that).parent().find('.row-fluid .span9')[0]).html(now?'<label><strong>'+now+'</strong> row'+(now>1?'s':'')+' selected.</label>':'');
	    	}
	    	$(firstTD).prepend(td);
		})
    }
} );

function showModal (url) {
	$('#main-modal').load(url, function () {
		$(this).modal();
	})
}

function validate (form, url) {
	$.post(url, $(form).serialize(), function (response) {
		$('#main-modal').html(response);
	});
	return false;
}

function edit (url, e) {
	e.preventDefault();
	$('#main-modal').load(url, function () {
		$(this).modal();
	})
}

function deleteSelected (oTable, url) {
	deleteRows(oTable);
	var pks = getPks(oTable);
	if (pks.length) {
		$.post(url, {pks: pks}, function (response) {
			deleteRows(oTable);
			alert('Delete!');
		});
	}
}

function deleteRows(oTable){
	var anSelected = oTable.$('tr.info');
	if (anSelected.length) {
		anSelected.each(function (index) {
			deleteRow(oTable, this);
		})
	}
}

function deleteRow (oTable, td) {
	oTable.fnDeleteRow( td )
}

function getPks(oTable) {
	var pks = [];
	oTable.$('tr.info').each(function () {
		pks.push(oTable.fnGetData(this)[0]);
	});
	return pks;
}

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

