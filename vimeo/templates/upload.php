{% if flash.errors %}
<div>
	error uploading file: {{ flash.errors[0] }}
</div>
{% endif %}
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="video" value=""/>
    <button type="submit">upload</button>
</form>