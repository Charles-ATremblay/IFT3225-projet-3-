$(document).ready(function () {
    $('#submit').click(function () {
        var username = $("#username").val();
        var password = $("#password").val();

        // if (username == "" || password == "") {
        //     alert("Please enter something.");
        // }

        $.ajax({
            type: 'POST',
            url: 'login.php',
            cache: false,
            data: {
                "username": username,
                "password": password
            },
            success: function (data) {
                alert(data["message"]);
            },
            error: function(xhr, status, error) {
                alert("Error");
                console.error(xhr);
            }
        });
    });
});
