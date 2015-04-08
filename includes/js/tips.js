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

$(function(){
	$("#select_ingredient_tips").find('tr').each(function() {
		$(this).click(function(){
			var ingredient = $(this).find('input').val();
			get_tips_table(ingredient);
		});
	});
});
