{% extends 'templates/default.php' %}

{% block title %}Registrar{% endblock %}

{% block content %}
    
    <form action="{{ urlFor('register.post') }}" method="post" autocomplete="off">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email"{% if request.post('email') %} value="{{ request.post('email') }}"{% endif %}>
            {% if errors.get('email') %} {{ errors.first('email') }} {% endif %}
        </div>

        <div>
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" id="usuario"{% if request.post('usuario') %} value="{{ request.post('usuario') }}"{% endif %}>
            {% if errors.get('usuario') %} {{ errors.first('usuario') }} {% endif %}
        </div>

        <div>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
            {% if errors.get('senha') %} {{ errors.first('senha') }} {% endif %}
        </div>

        <div>
            <label for="confirmar_senha">Confirmar Senha</label>
            <input type="password" name="confirmar_senha" id="confirmar_senha">
            {% if errors.get('confirmar_senha') %} {{ errors.first('confirmar_senha') }} {% endif %}
        </div>

        <div>
            <input type="submit" value="Registrar">
        </div>

        <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
    </form>

{% endblock %}