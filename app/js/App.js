$(function () {
	console.log('It works');
	$.ajax({
		url: 'http://rest.dev/curl/places.php',
		type: 'GET',
		dataType: "xml",
		complete: function (xml) {
			
			
			$(xml.responseXML).find('item').each(function(){
				
			});
			
			// var xml = $.parseXML(data.responseXML),
			//   $xml = $( xml );

			// // $test = $xml.find('test');  
			// console.log($xml.find('item'));

			// $xml.find('item').each(function () {
			// 	console.log($(this));
			// });
  
		}
	});
});