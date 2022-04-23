$(document).ready(function () {
    $("#submit").click(function () {
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
            success: function (data) {
                alert("The brewery was deleted from the database");
                $("#permis").val('');
            },
            error: function(xhr, status, error) {
                alert("This brewery does not exist in the database.");
                console.error(xhr);
            }
        });
    });
});