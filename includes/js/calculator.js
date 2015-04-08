var mode = 0; //primary
var primary = 0, secondary = 0, tertiary = 0;

function eval_value(ing) {
	if(ing != 0 && ing*1 == ing ) {
		return ing;
	} else {
		return false;
	}
}

function preload(image) {
	$('<img/>')[0].src = image;
}

var loading_img = site_url + "/includes/images/loading.gif";
preload(loading_img);

function loading(target) {
	var header = $(target).find('tr:eq(0)');
	var col_count = header.find('th').length;
	$(target).empty();
	$(target).append(header);
	$(target).append("<tr><td colspan='"+col_count+"' style='text-align:center;'><img src='"+loading_img+"' /></td><tr/>");
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

function row_click_handler(el, async) {
	async = typeof async !== 'undefined' ? async : true;
	update_vars($(el).find('input').val());
	update_selected($(el).find('td:eq(0)').text());
	if(mode < 2)
		mode++;
	send_data(async);
}

function fill_ingredients_table(data) {
	var table = $("#calc_ingredients");
	var header_string = "<thead><tr><th>Ingredient</th>";
	
	if(data[0].price)
		header_string += "<th>Price</th>";
	
	if(data[0].max)
		header_string += "<th>Max</th>";
	
	header_string += "</tr></thead><tbody></tbody>";
	var total = 0;
	table.empty();
	table.append(header_string);
	if(data.length > 0) {
		for(var i = 0; i < data.length; i++) {
			var row_string = "<tr><td><input type='hidden' class='id' value='"+data[i].id+"' />"+data[i].name+"</td>";
			
			if(data[i].price)
				row_string += "<td>"+data[i].price+"</td>";
			
			if(data[i].max)
				row_string += "<td>"+data[i].max+"</td>";
			
			row_string += "</tr>";
			
			var row = $(row_string);
			
			total += data[i].price * 1;
			row.click(function(){
				row_click_handler(this);
			});
			table.find('tbody').append(row);
		}
		table.tablesorter();
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
		var total_row = "<tr><td>Total</td><td><strong>"+total+"</strong></td></tr>";
		table.append(total_row);
	}
}

function send_data(async) {
	async = typeof async !== 'undefined' ? async : true;
	$.ajax({
		url: site_url+"ingredients/calculate/"+primary+"/"+secondary+"/"+tertiary,
		context: document.body,
		dataType: "json",
		async: async,
		type: "post",
		beforeSend :function() {
			loading("#calc_ingredients");
			loading("#calc_result");
		}
	}).done(function(data) {
		fill_ingredients_table(data.ingredients);
		fill_result_table(data.result);
	});
}

$(function(){
	$("#calc_ingredients tbody").find('tr').each(function(){
		$(this).click(function(){
			row_click_handler(this);
		});
	});
	
	$("#primary").click(function(){
		mode = 0;
		update_vars(0);
		update_selected("--");
		send_data();
	});
	
	$("#secondary").click(function(){
		if(mode > 1)
			mode = 1;
		update_vars(0);
		update_selected("--");
		send_data();
	});
	
	$("#tertiary").click(function(){
		update_vars(0);
		update_selected("--");
		send_data();
	});
});