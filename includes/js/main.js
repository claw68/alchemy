var mode = 0; //primary
var primary = 0, secondary = 0, tertiary = 0;

function mode_text() {
	var modes = ["primary", "secondary", "tertiary"];
	return modes[mode];
}

function update_vars(value) {
	if(mode == 0) {
		primary = value;
		secondary = 0;
		tertiary = 0;
	} else if(mode == 1) {
		secondary = value;
		tertiary = 0;
	} else {
		tertiary = value;
	}
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
			update_vars($(this).find('input').val());
			$('#'+mode_text()).html($(this).text());
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
