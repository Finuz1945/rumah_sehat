$(document).ready(function() {
	$('#search').hide();

	$('#keyword').on('keyup',function() {
		$('#table-container').load('../Rumah_sehat/ajax/rs.php?keyword=' + $('#keyword').val());
	});
});