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
