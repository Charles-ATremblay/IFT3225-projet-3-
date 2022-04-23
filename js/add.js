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

        if (name == "" || adress == "" || ville == "" || cp == "" || permis == "" || courriel == ""|| longitude == ""||latitude == "") {
            alert("Please fill out all the form.");
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
                alert(data["message"]);
              $('#nom, #adress, #ville, #cp, #permis, #courriel, #longitude, #latitude').val('');
            },
            error: function(xhr, status, error) {
                alert("Error");
                console.error(xhr);
            }
        });
    })
});
