$(document).ready(function() {
	$('#search').hide();

	$('#keyword').on('keyup',function() {
		$('#table-container').load('../rumah_sehat/ajax/lab.php?keyword=' + $('#keyword').val());
	});
});