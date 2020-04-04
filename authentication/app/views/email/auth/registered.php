{% extends 'email/templates/default.php' %}
{% block content %}
<p class="lead" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 17px; line-height: 1.6; margin: 0 0 10px; padding: 0;'>Você está quase lá!</p>
<p style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;'>Seu cadastro no <strong style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>Conproc - Sistema de Controle de Processos</strong> foi criado. Nós apenas precisamos verificar seu endereço de email para completar seu registro.</p>
<!-- Callout Panel -->
<p class="callout" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; background-color: #ECF8FF; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 15px; padding: 15px;'>
    Para finalizar seu cadastro, <a href="{{ baseUrl }}{{ urlFor('activate') }}?email={{ user.email }}&identifier={{ identifier|url_encode }}" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color: #2BA6CB; font-weight: bold; margin: 0; padding: 0;'>Clique aqui »</a><br style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'><br style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
    Ou cole este link no seu navegador. <br>
    {{ baseUrl }}{{ urlFor('activate') }}?email={{ user.email }}&identifier={{ identifier|url_encode }}
</p>
<!-- /Callout Panel -->

{% endblock %}