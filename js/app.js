$(document).ready(function(){

	var app = $.sammy("#app", function () {
		this.get("#/add", function (context) {
			var str = location.href.toLowerCase();
			context.app.swap("");
			context.render("templates/add.template", {}).appendTo(context.$element());
		});

		this.get("#/delete", function (context) {
			var str = location.href.toLowerCase();
			context.app.swap("");
			context.render("templates/delete.template", {}).appendTo(context.$element());
		});

		this.get("#/doc", function (context) {
			var str = location.href.toLowerCase();
			context.app.swap("");
			context.render("templates/doc.template", {}).appendTo(context.$element());
		});

		this.get("#/login", function (context) {
			var str = location.href.toLowerCase();
			context.app.swap("");
			context.render("templates/login.template", {}).appendTo(context.$element());
		});

		this.get("#/plot", function (context) {
			var str = location.href.toLowerCase();
			context.app.swap("");
			context.render("templates/plot.template", {}).appendTo(context.$element());
		});

		this.get("#/table", function (context) {
			var str = location.href.toLowerCase();
			context.app.swap("");
			context.render("templates/table.template", {}).appendTo(context.$element());
		});


	});

	app.run("#/table");
	

})
