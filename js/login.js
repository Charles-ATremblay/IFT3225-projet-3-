$(document).ready(function () {
    $('#submit').click(function () {
        var username = $("#username").val();
        var password = $("#password").val();

        // alert('There was some error performing the AJAX call!');

        if (username == "" || password == "") {
            alert("Please enter something.");
        }

        $.ajax({
            type: 'POST',
            url: 'login.php',
            cache: false,
            data: {
                "username": username,
                "password": password
            },
            success: function (data) {
                alert("You are logged in as " +username);
            },
            error: function(xhr, status, error) {
                alert("You cant login");
                console.error(xhr);
            }
        });
    });
});
