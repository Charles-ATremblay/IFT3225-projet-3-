$('.myButton').click(function() {

 $.ajax({
  type: "POST",
  url: "phpFileWithFunction.php"
}).done(function( resp ) {
  alert( "Hello! " + resp );
});    

});

