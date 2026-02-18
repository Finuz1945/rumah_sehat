$(document).ready(function () {
  let typingTimer;
  const doneTypingInterval = 300;

  // Prevent form submission
  $("form.search").on("submit", function (e) {
    e.preventDefault();
  });

  $("#keyword").on("keyup", function () {
    clearTimeout(typingTimer);
    const keyword = $(this).val();

    typingTimer = setTimeout(function () {
      $.ajax({
        url: "./ajax/dokter.php",
        method: "GET",
        data: { keyword: keyword },
        success: function (data) {
          $("#table-container").html(data);
        },
      });
    }, doneTypingInterval);
  });
});
