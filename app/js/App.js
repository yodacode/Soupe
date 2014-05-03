$(function () {

	var App = {};

	App.Seach = {
		init: function () {
			this.build();
		},
		build: function () {

			this.getTowns(function (xml) {				
				xml.find('item').each(function () {
					var option = $('<option>')
						.attr({value: $(this).find('id').text()})
						.text($(this).find('name').text())
						.appendTo($('#townsSelect'));
				});
			});

			this.getCountries(function (xml) {				
				xml.find('item').each(function () {
					var option = $('<option>')
						.attr({value: $(this).find('id').text()})
						.text($(this).find('name').text())
						.appendTo($('#countriesSelect'));
				});
			});

		},
		getTowns: function (callback) {
			$.ajax({
				url: 'http://rest.dev/app/get-towns.php',
				type: 'GET',
				dataType: "xml",
				complete: function (data) {				
					var xml = $(data.responseXML);
					callback(xml);
				}
			});
		},
		getCountries: function (callback) {
			$.ajax({
				url: 'http://rest.dev/app/get-countries.php',
				type: 'GET',
				dataType: "xml",
				complete: function (data) {				
					var xml = $(data.responseXML);
					callback(xml);
				}
			});
		}
	};
	App.Seach.init();



});