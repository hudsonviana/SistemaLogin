{% extends 'templates/default.php' %}

{% block title %}Recuperar senha{% endblock %}

{% block content %}

<p>Insira seu email para solicitar a recuperação de senha</p>

<form action="{{ urlFor('password.recover.post') }}" method="post" autocomplete="off">
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"{% if request.post('email') %} value="{{ request.post('email') }}"{% endif %}>
        {% if errors.get('email') %}{{ errors.first('email') }}{% endif %}
    </div>
    <div>
        <input type="submit" value="Enviar">
    </div>
    <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
</form>
{% endblock %}