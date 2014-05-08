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
				url: 'http://rest.dev/app/ajax/get-towns.php?country_id=' + countryId,
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
				url: 'http://rest.dev/app/ajax/get-countries.php',
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
				url: 'http://rest.dev/app/ajax/get-comments.php?place_id=' + townId,
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
				url: 'http://rest.dev/app/ajax/add-comment.php',
				type: 'POST',
				data: data,				
				complete: function (data) {
					window.location.reload();
				}
			});
		}
	};
	App.Comments.init();




});