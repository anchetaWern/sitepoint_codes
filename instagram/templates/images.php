{% for row in results.data %}
	<img src="{{ row.images.low_resolution.url }}">	
{% endfor %}