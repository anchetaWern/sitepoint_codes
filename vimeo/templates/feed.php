<h1>User Feed</h1>
{% for feed in data %}
	<li>
		<img src="{{ feed.clip.pictures.sizes[0]['link'] }}" alt="{{ feed.clip.name }}">
		<div>
			<a href="{{ feed.clip.link }}">{{ feed.clip.name }}</a>
		</div>
		<p>
			{{ feed.clip.description }}
		</p>
		<div>
			{% for tag in feed.clip.tags %}
			<span>{{ tag.name }}</span>
			{% endfor %}
		</div>
	</li>
{% endfor %}