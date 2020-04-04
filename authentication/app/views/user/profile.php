{% extends 'templates/default.php' %}

{% block title %}{{ user.getFullNameOrUsername() }}{% endblock %}

{% block content %}
    <h2>{{ user.usuario }}</h2>
    <img src="{{ user.getAvatarUrl({size: 30}) }}" alt="Foto de perfil para {{ user.getFullNameOrUsername() }}">
    <dl>
        {% if user.getFullName() %}
            <dt>Nome Completo</dt>
            <dd>{{ user.getFullName() }}</dd>
        {% endif %}
        <dt>Email</dt>
        <dd>{{ user.email }}</dd>
    </dl>
{% endblock %}