var mode = 0; //primary

function calc_mode() {
	var modes = ["primary", "secondary", "tertiary"];
	return modes[mode];
}

function send_data() {
	$.ajax({
		url: "calculate/"+primary+"/"+secondary+"/"+tertiary,
		context: document.body,
		type: "post",
		beforeSend :function() {
			//loading
		}
	}).done(function(data) {
		
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
			$('#'+calc_mode()).html($(this).text());
			send_data();
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
