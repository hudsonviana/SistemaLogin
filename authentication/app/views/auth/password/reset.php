{% extends 'templates/default.php' %}

{% block title %}Redefinir senha{% endblock %}

{% block content %}
    <form action="{{ urlFor('password.reset.post') }}?email={{ email }}&identifier={{ identifier|url_encode }}" method="post" autocomplete="off">
        <div>
            <label for="senha">Nova senha</label>
            <input type="password" name="senha" id="senha">
            {% if errors.get('senha') %}{{ errors.first('senha') }}{% endif %}
        </div>

        <div>
            <label for="confirmar_senha">Confirmar nova senha</label>
            <input type="password" name="confirmar_senha" id="confirmar_senha">
            {% if errors.get('confirmar_senha') %}{{ errors.first('confirmar_senha') }}{% endif %}
        </div>
        
        <div>
            <input type="submit" value="Mudar senha">
        </div>

        <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">

    </form>
{% endblock %}