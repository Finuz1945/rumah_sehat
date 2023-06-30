$(document).ready(function() {
	$('#search').hide();

	$('#keyword').on('keyup',function() {
		$('#table-container').load('../Rumah_sehat/ajax/obat.php?keyword=' + $('#keyword').val());
	});
});