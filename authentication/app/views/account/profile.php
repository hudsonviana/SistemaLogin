{% extends 'templates/default.php' %}

{% block title %}Atualizar perfil{% endblock %}

{% block content %}
    
    <form action="{{ urlFor('account.profile.post') }}" method="post" autocomplete="off">

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ request.post('email') ? request.post('email') : auth.email }}">
            {% if errors.get('email') %}{{ errors.first('email') }}{% endif %}
        </div>

        <div>
            <label for="primeiro_nome">Primeiro nome</label>
            <input type="text" name="primeiro_nome" id="primeiro_nome" value="{{ request.post('primeiro_nome') ? request.post('primeiro_nome') : auth.primeiro_nome }}">
            {% if errors.get('primeiro_nome') %}{{ errors.first('primeiro_nome') }}{% endif %}
        </div>

        <div>
            <label for="ultimo_nome">Último nome</label>
            <input type="text" name="ultimo_nome" id="ultimo_nome" value="{{ request.post('ultimo_nome') ? request.post('ultimo_nome') : auth.ultimo_nome }}">
            {% if errors.get('ultimo_nome') %}{{ errors.first('ultimo_nome') }}{% endif %}
        </div>

        <div>
            <input type="submit" value="Atualizar">
        </div>
        <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
    </form>
{% endblock %}