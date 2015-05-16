function send(){
	var text = $("#query").val();

	$.post(
		'http://localhost/tester/api-ai/exchange-rate.php',
		{
			'query': text
		},
		function(response){
			responsiveVoice.speak(response);
			$('#response').text(response);
		}
	);
}