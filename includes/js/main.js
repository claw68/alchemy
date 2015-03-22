var mode = 0; //primary

function calc_mode() {
	var modes = ["primary", "secondary", "tertiary"];
	return modes[mode];
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
});