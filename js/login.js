$(document).ready(function () {
    $('#submitLogin').click(function () {
        var username = $("#username").val();
        var password = $("#password").val();

        if (username == "" || password == "") {
            alert("Please enter something.");
            return false;
        }

        $.ajax({
            type: 'POST',
            url: 'login.php',
            cache: false,
            data: {
                "username": username,
                "password": password
            },
            success: function (dataLogin) {
                alert(dataLogin["message"]);
            },
            error: function(xhr, status, error) {
                alert("Error");
                console.error(xhr);
            }
        });
    });
});
