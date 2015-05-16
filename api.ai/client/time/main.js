function send(){
	var text = $("#query").val();

	$.post(
		'http://localhost/tester/api-ai/time.php',
		{
			'query': text
		},
		function(response){
			responsiveVoice.speak(response);
			$('#response').text(response);
		}
	);
}