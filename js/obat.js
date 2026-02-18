$(document).ready(function () {
  $("#search").hide();
  $("#keyword").on("keyup", function () {
    $("#display-container").load("./ajax/display-obat.php?keyword=" + $("#keyword").val());
  });
});
