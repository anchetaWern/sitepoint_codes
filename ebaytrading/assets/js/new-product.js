(function(){
	var categories_template = Handlebars.compile($("#categories-template").html());

	$('#title').blur(function(){
		var title = $(this).val();
		$.post(
			'/tester/ebay_trading_api/categories', 
			{
				'title' : title
			},
			function(response){
				var categories = JSON.parse(response);
				var html = categories_template({'categories' : categories});
				
				$('#categories-container').html(html);
			}
		);
	});
})();