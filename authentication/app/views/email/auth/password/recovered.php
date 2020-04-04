{% extends 'email/templates/default.php' %}
{% block content %}
<!--<p class="lead" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 17px; line-height: 1.6; margin: 0 0 10px; padding: 0;'>Você solicitou a recuperação de senha.</p>-->

<p style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;'>Não consegue lembrar sua senha? Não tem problema, acontece com todos nós.</p>
<!-- Callout Panel -->
<div align="center">
    <p class="callout" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; background-color: #ECF8FF; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 15px; padding: 15px;'>
        Para criar uma nova senha, clique no link abaixo:
        <br><br>
        
        <a href="{{ baseUrl }}{{ urlFor('password.reset') }}?email={{ user.email }}&identifier={{ identifier|url_encode }}" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color: #FFFFFF; font-weight: bold; font-size: 13px; margin: 0; padding: 7px 15px; background-color: #405e91; text-decoration:none; border-radius: 3px;'>RECUPERAR SENHA</a>
    
        <br><br>
        <span style='font-size: 11px;'>Se tiver problemas, copie e cole o link abaixo em outra janela do seu navegador:</span> 
        <br>
        <a href="{{ baseUrl }}{{ urlFor('password.reset') }}?email={{ user.email }}&identifier={{ identifier|url_encode }}"style='font-size: 11px; text-decoration:none; line-height: 1.0;'>
        {{ baseUrl }}{{ urlFor('password.reset') }}?email={{ user.email }}&identifier={{ identifier|url_encode }}</a>
    </p>
</div>
<!-- /Callout Panel -->

{% endblock %}