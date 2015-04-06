function get_tertiary_table(row, primary, secondary) {
	$.ajax({
		url: "tertiary/"+primary+"/"+secondary,
		context: document.body,
		type: "post",
		beforeSend :function() {
			//loading
		}
	}).done(function(data) {
		$(row).append(data);
	});
}

function toggle_table(row, primary, secondary) {
	var table = $(row).find('table');
	var table_exist = table.length > 0;
	
	if(table_exist) {
		table.remove();
	} else {
		get_tertiary_table(row, primary, secondary);
	}
}
