$(function() {
	$('.druckzeichen').click(function() {
		var container = $(this).attr('rel');
		$('#' + container).printArea();
		return false;
	});
}); 