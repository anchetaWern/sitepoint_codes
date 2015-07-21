{% if url %}
<a href="{{ url }}">login to vimeo</a>
{% else %}
<h1>Hello {{ user.name }}!</h1>
<h2>websites</h2>
<ul>
{% for website in user.websites %}
	<li>
		<a href="{{ website.link }}">{{ website.name }}</a>
	</li>
{% endfor %}
</ul>
{% endif %}