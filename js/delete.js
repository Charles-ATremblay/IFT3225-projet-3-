$(document).ready(function() {

  $("#submit").click(function() {
      var no_permis = $("#permis").val();
      //alert(no_permis)

      if (no_permis == "") {
          alert("Please enter the permit number from the entry you want to delete.");
          return false;
      }

      $.ajax({
          type: 'POST',
          url: 'delete.php',
          cache: false,
          data: {
              "permis": no_permis
          },
          success: function(data) {
              console.log(data);
              alert("data was deleted");
          }
      });
  });
});