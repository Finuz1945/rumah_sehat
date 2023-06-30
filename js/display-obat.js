$(document).ready(function() {
	$('#search').hide();

	$('#keyword').on('keyup',function() {
		$('.display-container').load('../rumah_sehat/ajax/display-obat.php?keyword=' + $('#keyword').val());
	});
});