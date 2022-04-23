$(document).ready(function () {
    $("#submitDelete").click(function () {
        var no_permis = $("#permis").val();

        if (no_permis == "") {
            alert("Please enter the permit number from the entry you want to delete.");
        }

        $.ajax({
            type: 'POST',
            url: 'delete.php',
            cache: false,
            data: {
                "permis": no_permis
            },
            success: function (dataDelete) {
                alert(dataDelete["message"]);
                $("#permis").val('');
            },
            error: function(xhr, status, error) {
                alert("Error");
                console.error(xhr);
            }
        });
    });
});