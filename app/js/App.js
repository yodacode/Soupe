$(function () {

	var App = {};
	var Config = {};

	Config.host = 'http://rest.dev';
	Config.requestApi = Config.host + '/app/ajax';


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
			this.UI.selectAddPlace = $('#selectAddPlace');

			this.getCountries(function (xml) {
				that.createSelect(xml.find('item'), that.UI.selectCountries);
			});

			this.getTowns('', function (xml) {
				that.createSelect(xml.find('item'), that.UI.selectAddPlace);
			});
		},
		bind: function () {
			var that = this;

			this.UI.selectCountries.on('change', function () {
				that.getTowns($(this).val(), function (xml) {
					that.createSelect(xml.find('item'), that.UI.selectTwons);
				});
			})
		},
		createSelect: function (items, select) {

			select.empty();
			$('<option>').appendTo(select);
			items.each(function () {
				var option = $('<option>')
					.attr({value: $(this).find('id').text()})
					.text($(this).find('name').text())
					.appendTo(select);
			});
		},
		getTowns: function (countryId, callback) {
			$.ajax({
				url: Config.requestApi + '/get-towns.php?country_id=' + countryId,
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
				url: Config.requestApi + '/get-countries.php',
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

	App.Comments = {
		init: function () {

			this.status = {};
			this.UI = {};

			this.UI.container = $('#comments-container');
			this.UI.addCommentForm  = $('#add-comment');
			this.UI.btnAddComment  = $('.btn-add-comment');
			this.UI.thumb = this.UI.container.find('.item.comment');
			this.status.currentPlaceId = $('#page').attr('data-place-id');

			this.build();
			this.bind();
		},
		build: function () {
			var that = this;
			this.getComments(that.status.currentPlaceId, function (xml) {
				that.createThumb(xml.find('item'));
				if (App.Counter) {
					App.Counter.init();
					if (App.Counter.countComments() == 0) {
						that.UI.container.append('<h3>Pas d\'avis sur cette place...</h3>');
					}
				}
			});
		},
		bind: function () {
			var that = this;
			this.UI.thumb.hide();
			this.UI.btnAddComment.on('click', function () {
				var data = {
					author: 	$('#author').val(),
					content: 	$('#content').val(),
					rate: 		parseInt($('#rate').val()),
					place_id: 	parseInt($('#place_id').val()),
				};
				that.addComment(data);
			});
		},
		createThumb: function (items) {
			var that = this;

			if (items.length > 0) {
				items.each(function () {
					var thumb = that.UI.thumb.clone();
					thumb.show();
					thumb.find('.author').text($(this).find('author').text());
					thumb.find('.content').text($(this).find('content').text());
					thumb.find('.rate').text($(this).find('rate').text());
					that.UI.container.append(thumb);
				});
			}

		},
		getComments: function (townId, callback) {

			$.ajax({
				url: Config.requestApi + '/get-comments.php?place_id=' + townId,
				type: 'GET',
				dataType: "xml",
				complete: function (data) {
					var xml = $(data.responseXML);
					callback(xml);
				}
			});
		},
		addComment: function (data) {

			$.ajax({
				url: Config.requestApi + '/add-comment.php',
				type: 'POST',
				data: data,
				complete: function (data) {
					window.location.reload();
				}
			});
		}
	};
	App.Comments.init();

	App.Maps = {
		init: function () {
			this.container = $("#map-canvas");
			var lat = this.container.attr('data-lat'),
				lng = this.container.attr('data-lng');

			this.build(lat, lng);
		},
		build: function (lat, lng) {
			var latlng, map, mapOptions, marker;

			latlng = new google.maps.LatLng(lat, lng);

			mapOptions = {
			  zoom: 13,
			  center: latlng
			};

			map = new google.maps.Map(this.container.get(0), mapOptions);

			marker = new google.maps.Marker({
			    position: latlng,
			    map: map,
			    title: 'Place'
			});
		}

	};
	App.Maps.init();

	App.Counter = {
		init: function () {
			this.UI = {};
			this.UI.counterComments = $('.counter-comments');
			this.UI.counterRate = $('.counter-rate');

			this.build();
		},
		build: function () {
			this.UI.counterComments.text(this.countComments() + ' avis');
			this.UI.counterRate.text(this.countRate() + ' /10');
		},
		countComments: function () {
			return $('.item.comment').length - 1;
		},
		countRate: function () {
			var rate = 0,
				ratesContainer = $('.item.comment .rate'),
				size = ratesContainer.length - 1,
				result;

			ratesContainer.each(function () {
				rate += parseInt($(this).text());
			});

			result = rate / size;

			return isNaN(result) ? 0 : result;
		}
	};





});