$(function () {
	
	var App = {};

	App.Seach = {
		init: function () {
			this.build();
		},
		build: function () {

			this.getTowns(function (data) {
				console.log(data);
			})


		},
		getTowns: function (callback) {
			$.ajax({
				url: 'http://rest.dev/app/get-towns.php',
				type: 'GET',
				dataType: "xml",
				complete: function (data) {
				  	var xml = $(data.responseXML);

					xml.find('item').each(function () {
						var option = $('<option>')
							.attr({value: $(this).find('id').text()})
							.text($(this).find('name').text())
							.appendTo($('#countriesSelect'));
					});						

				}
			});
		},
		getCountries: function (callback) {

		}
	};
	App.Seach.init();



});