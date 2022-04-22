$(document).ready(function() {
    $('#submit').click(function() {
        
        alert('There was some error performing the AJAX call!');
        
        $.ajax({
            type: "POST",
            url: 'login.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'table.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
    
       });
     });
});
