function get_tips_table(ingredient) {
	$.ajax({
		url: site_url+"ingredients/tips_table/"+ingredient,
		context: document.body,
		type: "post",
		beforeSend :function() {
			//loading
		}
	}).done(function(data) {
		$("#by_ingredient_cont").empty();
		$("#by_ingredient_cont").append(data);
	});
}

