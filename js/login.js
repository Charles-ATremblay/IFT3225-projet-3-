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
                console.log(data);
            }

        });

    });
});
