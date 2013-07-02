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
	"aoColumnDefs" : [{"bVisible": false, "aTargets": [ 0 ]}],
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
    		var toggle = (total == that.$('tr.row-selected').length?'remove':'add') + 'Class';
    		$(firstTH).parent()[toggle]('all-selected');
    		that.$('tr')[toggle]('row-selected');
    		var now = that.$('tr.row-selected').length;
    		$($(that).parent().find('.row-fluid .span9')[0]).html(now?'<label><strong>'+now+'</strong> row'+(now>1?'s':'')+' selected.</label>':'');
    	}
		$(firstTH).parent().prepend(th);
		that.$('tr').each(function () {
			var firstTD = this;
	    	var td = document.createElement('td');
	    	td.className = "check-item";
	    	td.innerHTML = '<i></i>';
	    	td.onclick = function () {
	    		$(firstTD).toggleClass('row-selected');
	    		var now = that.$('tr.row-selected').length
	    		$(firstTH).parent()[(total == now?'add':'remove') + 'Class']('all-selected');
	    		$($(that).parent().find('.row-fluid .span9')[0]).html(now?'<label><strong>'+now+'</strong> row'+(now>1?'s':'')+' selected.</label>':'');
	    	}
	    	$(firstTD).prepend(td);
		})
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

var oDataTable = {
    table:null,
    id:null,
    options:null,
    bSelectRows:false,
    bSelectAll:false,
    sortDivHtml:'',
    currentTr:null,
    selectAll: false,
    init:function(id,data){
        if (typeof id == 'undefined') {
            id = 'tList';
        }
        this.id = id;
        if (typeof data != 'undefined') {
            if(typeof data.bSelectRows != 'undefined'){
                this.bSelectRows = data.bSelectRows;
            }
        }else{
            data = {};
        }
        if(typeof data == 'undefined' || typeof data.bFilter == 'undefined'){
            data.bFilter = false;
        }
        if(typeof data == 'undefined' || typeof data.sPaginationType == 'undefined'){
            data.bJQueryUI = true;
            data.sPaginationType = "full_numbers"
        }
        if(typeof data == 'undefined' || typeof data.aoColumnDefs == 'undefined'){
            data.aoColumnDefs = [{"bVisible": false, "aTargets": [ 0 ]}];
        }
        this.options = data;
        return this;
    },
    start:function(){
        var footer = $(".dataTables_wrapper").find(".fg-toolbar");
        $(footer[1]).addClass("tableFooter");
        if(this.bSelectRows) {
            var that = this;           
            var th = $('#'+this.id).find('th');
            setTimeout(function () {
                $(th[1]).off("click");
                $(th[1]).html("").css({backgroundColor: "#dddddd"});
                var item = document.createElement('i');
                item.className = "check-all help";
                $(item).attr({"rel":"tooltip", "data-placement" : "bottom", "data-original-title" : "Seleccionar todas las filas"});
                $(th[1]).append(item).on("click", function () {
                    that.table.$('tr')[!that.selectAll?"addClass":"removeClass"]("row_selected")
                    $(this).children("i")[!that.selectAll?"addClass":"removeClass"]("selected");
                    that.selectAll = !that.selectAll?true:false;
                    $("#mas-acciones").css({display: that.selectAll?"inline-block":"none"}).parent().css({marginLeft: that.selectAll?165+"px":0});
                    that.showNumSelectedRows();
                });       
            }, 500);
            $('#'+this.id+' .rowSelectable').on("click", function() {
                $(this).parent().toggleClass('row_selected');
                var total = that.getNumTotalSelectedRows();
                var now = that.getNumSelectedRows();
                that.table.find('th .check-all')[now == total?"addClass":"removeClass"]("selected");
                that.selectAll = now == total?true:false;
                $("#mas-acciones").css({display: now > 0?"inline-block":"none"}).parent().css({marginLeft: now > 0?165+"px":0});
                that.showNumSelectedRows();
            });
        }
        var lang = {
            "oLanguage": {
                "oPaginate": {
                    "sFirst": yastaMessages.first,
                    "sLast": yastaMessages.last,
                    "sNext": yastaMessages.next,
                    "sPrevious": yastaMessages.previous
                },
                "sInfo": yastaMessages.showing+" _START_ "+yastaMessages.to+" _END_ "+yastaMessages.of+" _TOTAL_ "+yastaMessages.entries,
                "sInfoEmpty": yastaMessages.showing+" 0 "+yastaMessages.to+" 0 "+yastaMessages.of+" 0 "+yastaMessages.entries,
                "sInfoFiltered": "("+yastaMessages.filtered_from+" _MAX_ "+yastaMessages.total_entries+")",
                "sLengthMenu": yastaMessages.show+" _MENU_ "+yastaMessages.entries,
                "sLoadingRecords": yastaMessages.loading,
                "sProcessing": yastaMessages.processing+"...",
                "sSearch": yastaMessages.search+':',
                "sZeroRecords": yastaMessages.zero_records,
                "sEmptyTable": yastaMessages.zero_records
            }
        };
        this.table = $('#'+this.id).dataTable(this.options?$.extend(this.options, lang):lang);
    },
    getNumTotalSelectedRows: function () {
        return this.table.$('td.rowSelectable').length;
    },
    getSelectedRows:function(){
        return this.table.$('tr.row_selected');
    },
    getNumSelectedRows:function(){
        return this.getSelectedRows().length;
    },
    getArrayPks:function(){
        array = new Array();
        rows = this.getSelectedRows();
        that = this;
        rows.each(function(){
            array.push(that.getPk(this));
        });
        return array;
    },
    showNumSelectedRows:function(){
        if(this.bSelectRows){
            div = document.getElementById(this.id+'_length');
            obj = document.getElementById(this.id+'_lbNumSelectedRows');
            text = ' '+(this.getNumSelectedRows()==1?yastaMessages.selected_row:yastaMessages.selected_rows);
            if(!obj){
                if(this.getNumSelectedRows()>0){
                    html = '<label id="'+this.id+'_lbNumSelectedRows" class="alert alert-info"><strong>';
                    html += this.getNumSelectedRows()+'</strong>'+text+'</label>';
                    $(div).append(html);
                }
            }else{
                if(this.getNumSelectedRows()==0){
                    obj.innerHTML = "";
                    $(obj).removeClass('alert alert-info');
                }else{
                    obj.innerHTML = '<strong>'+this.getNumSelectedRows()+'</strong>'+text;
                    $(obj).addClass('alert alert-info');
                }
            }
        }
    },
    getCurrentTr:function(obj){
        tr = null;
        if(jQuery(obj).is('tr')){
            tr = obj;
        }
        if(jQuery(obj).is('td')){
            tr = obj.parentNode;
        }else if(jQuery(obj).is('img') || jQuery(obj).is('a')){
            tr = obj.parentNode.parentNode;
        }
        this.currentTr = tr;
        return tr;
    },
    deleteRow:function(obj){
        this.table.fnDeleteRow(this.currentTr);
    },
    getPk:function(obj){
        var data = this.table.fnGetData(this.getCurrentTr(obj));
        return data[0];
    }
}