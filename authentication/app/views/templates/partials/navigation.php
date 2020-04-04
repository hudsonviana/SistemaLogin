{% if auth %}
    <p>Olá, {{ auth.getFullNameOrUsername() }}!
    <img src="{{ auth.getAvatarUrl({ size: 30 }) }}" alt="Seu avatar"></p>
{% endif %}

<ul>
    <li><a href="{{ urlFor('home') }}">Home</a></li>

    {% if auth %}
        <li><a href="{{ urlFor('user.profile', {username: auth.usuario}) }}">Seu perfil</a></li>
        <li><a href="{{ urlFor('user.all') }}">Todos os usuários</a></li>
        <li><a href="{{ urlFor('password.change') }}">Mudar senha</a></li>
        <li><a href="{{ urlFor('account.profile') }}">Atualizar perfil</a></li>
        {% if auth.isAdmin() %}
            <li><a href="{{ urlFor('admin.example') }}">Admin</a></li>
        {% endif %}
        <li><a href="{{ urlFor('logout') }}">Sair</a></li>
    {% else %}
        <li><a href="{{ urlFor('register') }}">Registrar</a></li>
        <li><a href="{{ urlFor('login') }}">Login</a></li>
    {% endif %}
</ul>