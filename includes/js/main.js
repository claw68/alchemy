var mode = 0; //primary
var primary = 0, secondary = 0, tertiary = 0;

function mode_text() {
	var modes = ["primary", "secondary", "tertiary"];
	return modes[mode];
}

function update_selected(name) {
	if(mode == 0) {
		$("#primary").text(name);
		$("#secondary").text("--");
		$("#tertiary").text("--");
	} else if(mode == 1) {
		$("#secondary").text(name);
		$("#tertiary").text("--");
	} else {
		$("#tertiary").text(name);
	}
}

function update_vars(id) {
	if(mode == 0) {
		primary = id;
		secondary = 0;
		tertiary = 0;
	} else if(mode == 1) {
		secondary = id;
		tertiary = 0;
	} else {
		tertiary = id;
	}
}

function row_click_handler(el) {
	update_vars($(el).find('input').val());
	update_selected($(el).text());
	if(mode < 2)
		mode++;
	send_data();
}

function fill_ingredients_table(data) {
	var table = $("#calc_ingredients");
	var header = table.find("tr:eq(0)");
	var total = 0;
	table.empty();
	table.append(header);
	if(data.length > 0) {
		for(var i = 0; i < data.length; i++) {
			var row = $("<tr><td><input type='hidden' class='id' value='"+data[i].id+"' />"+data[i].name+"</td></tr>");
			total += data[i].price * 1;
			row.click(function(){
				row_click_handler(this);
			});
			table.append(row);
		}
	} else {
		var empty = "<tr><td>--</td></tr>";
		table.append(empty);
	}
}

function fill_result_table(data) {
	var table = $("#calc_result");
	var header = table.find("tr:eq(0)");
	var total = 0;
	table.empty();
	table.append(header);
	if(data.length > 0) {
		for(var i = 0; i < data.length; i++) {
			var row = "<tr><td>"+data[i].name+"</td><td>"+data[i].price+"</td></tr>";
			total += data[i].price * 1;
			table.append(row);
		}
	} else {
		var empty = "<tr><td>--</td><td>--</td></tr>";
		table.append(empty);
	}
	
	if(data.length > 1) {
		var total_row = "<tr><td>Total</td><td>"+total+"</td></tr>";
		table.append(total_row);
	}
}

function send_data() {
	$.ajax({
		url: "calculate/"+primary+"/"+secondary+"/"+tertiary,
		context: document.body,
		dataType: "json",
		type: "post",
		beforeSend :function() {
			//loading
		}
	}).done(function(data) {
		fill_ingredients_table(data.ingredients);
		fill_result_table(data.result);
	});
}

$(function() {
	$(".add").button();
	$(".edit").button();
	$(".delete").button().click(function() {
		var res = confirm("Are you sure you want to delete this item?");
		if (res)
			window.location.href=$(this).attr('href');
		else
			return false;
	});
	$(".view").button();
	$(".submit").button();
	
	$("#ingredients_table table").tablesorter();
	$("#effects_table table").tablesorter();
	
	$("#calc_ingredients tbody").find('tr').each(function(){
		$(this).click(function(){
			row_click_handler(this);
		});
	});
	
	$("#primary").click(function(){
		$(this).text('--');
		mode = 0;
	});
	
	$("#secondary").click(function(){
		$(this).text('--');
		mode = 1;
	});
	
	$("#tertiary").click(function(){
		$(this).text('--');
		mode = 2;
	});
});
