{% extends 'templates/default.php' %}

{% block title %}Todos os usuários{% endblock %}

{% block content %}
    <h2>Usuários ativos</h2>

    {% if users is empty %}
        <p>Nenhum usuário registrado</p>
    {% else %}
        {% for user in users %}
            <div class="user">
                <a href="{{ urlFor('user.profile', {username: user.usuario}) }}">{{ user.usuario }}</a>
                {% if user.getFullName() %}
                    ({{ user.getFullName() }})
                {% endif %}
                {% if user.isAdmin() %}
                    (Admin)
                {% endif %}
            </div>
        {% endfor %}
    {% endif %}

{% endblock %}