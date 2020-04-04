{% extends 'templates/default.php' %}

{% block title %}Mudar senha{% endblock %}

{% block content %}
    
<form action="{{ urlFor('password.change.post') }}" method="post" autocomplete="off">
    <div>
        <label for="senha_atual">Senha atual</label>
        <input type="password" name="senha_atual" id="senha_atual">
        {% if errors.get('senha_atual') %}{{ errors.first('senha_atual') }}{% endif %}
    </div>

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