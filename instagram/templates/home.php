{% if login_url %}
<a href="{{ login_url }}">login with instagram</a>
{% else %}
	<div>
		<img src="{{ data.user.profile_picture }}" alt="{{ data.user.username }}">
	</div>
	<ul>
		<li>username: {{ data.user.username }}</li>
		<li>bio: {{ data.user.bio }}</li>
		<li>website: {{ data.user.website }}</li>
		<li>id: {{ data.user.id }}</li>
		<li>access token: {{ data.access_token }}</li>
	</ul>
{% endif %}