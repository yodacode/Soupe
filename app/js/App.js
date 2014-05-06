$(function () {

	var App = {};

	App.Seach = {
		init: function () {
			this.UI = {};
			this.build();
			this.bind();
		},
		build: function () {
			var that = this;
			this.UI.selectTwons = $('#townsSelect');
			this.UI.selectCountries = $('#countriesSelect');			

			this.getCountries(function (xml) {

				var option = $('<option>').appendTo(that.UI.selectCountries);
				xml.find('item').each(function () {
					var option = $('<option>')
						.attr({value: $(this).find('id').text()})
						.text($(this).find('name').text())
						.appendTo(that.UI.selectCountries);
				});
			});
		},
		bind: function () {
			var that = this;

			this.UI.selectCountries.on('change', function () {	

				that.getTowns($(this).val(), function (xml) {				
					that.UI.selectTwons.empty();
					var option = $('<option>').appendTo(that.UI.selectTwons);
					xml.find('item').each(function () {
						var option = $('<option>')
							.attr({value: $(this).find('id').text()})
							.text($(this).find('name').text())
							.appendTo(that.UI.selectTwons);
					});
				});
			})
		},		
		getTowns: function (countryId, callback) {
			$.ajax({
				url: 'http://rest.dev/app/get-towns.php?country_id=' + countryId,
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