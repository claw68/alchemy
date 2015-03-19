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
});