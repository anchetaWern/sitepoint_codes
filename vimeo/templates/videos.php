<form>
	<input type="text" name="query" value="{{ query }}">
	<button type="submit">Search</button>
</form>

<h1>Search Results</h1>
<div>
{% if results %}
<ul>	
{% for row in results.data %}
	<li>
		<img src="{{ row.pictures.sizes[0]['link'] }}" alt="{{ row.name }}">
		<div>
			<a href="{{ row.link }}">{{ row.name }}</a>
		</div>
		<div>
			by: <a href="{{ row.user.link }}">{{ row.user.name }}</a>
		</div>
		<p>
			{{ row.description }}
		</p>
		<div>
			<button class="like" data-uri="{{ row.uri }}">like</button>
			<button class="watch-later" data-uri="{{ row.uri }}">watch later</button>
		</div>
	</li>
{% endfor %}
</ul>
{% else %}
	No search results.
{% endif %}	
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="assets/js/videos.js"></script>