{% extends 'templates/default.php' %}

{% block title %}Login{% endblock %}

{% block content %}
    
    <form action="{{ urlFor('login.post') }}" method="post" autocomplete="off">
        <div>
            <label for="identificador">Usuário/Email</label>
            <input type="text" name="identificador" id="identificador">
            {% if errors.get('identificador') %} {{ errors.first('identificador') }} {% endif %}
        </div>

        <div>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
            {% if errors.get('senha') %} {{ errors.first('senha') }} {% endif %}
        </div>

        <div>
            <input type="checkbox" name="lembrar" id="lembrar">
            <label for="lembrar">Lembrar de mim</label>
        </div>

        <div>
            <input type="submit" value="Entrar">
        </div>
        <a href="{{ urlFor('password.recover') }}">Esqueci minha senha</a>
        <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
    </form>
    
{% endblock %}