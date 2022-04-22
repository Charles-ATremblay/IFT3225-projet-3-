// $('.myButton').click(function() {

//   $.ajax({
//       type: "POST",
//       url: "phpFileWithFunction.php"
//   }).done(function(resp) {
//       alert("Hello! " + resp);
//   });

// });
$("svg").empty();
$(document).ready(function() {

    $("#submit").click(function() {
        var name = $("#nom").val();
        var adress = $("#adress").val();
        var ville = $("#ville").val();
        var cp = $("#cp").val();
        var permis = $("#permis").val();
        var courriel = $("#courriel").val();
        var longitude = $("#longitude").val();
        var latitude = $("#latitude").val();

        // NOT SECURE TO FIX IF TIME ALLOWS IT
        if (name == "" || adress == "" || ville == "" || cp == "" || permis == "" || courriel == "") {
            alert("SVP remplir tous les champs requis.");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "add.php",
            data: {
                "nom": name,
                "adresse": adress,
                "ville": ville,
                "code_postal": cp,
                "permis": permis,
                "courriel": courriel,
                "longitude": longitude,
                "latitude": latitude
            },
            cache: false,
            success: function(data) {
              console.log(data);
              //alert(data);

            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    })
});