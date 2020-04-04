<!DOCTYPE html>
<html lang="pt-BR" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conproc</title>

<style>img {
max-width: 100%;
}
body {
-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%;
}
@media only screen and (max-width: 600px) {
  a[class="btn"] {
    display: block !important; margin-bottom: 10px !important; background-image: none !important; margin-right: 0 !important;
  }
  div[class="column"] {
    width: auto !important; float: none !important;
  }
  table.social div[class="column"] {
    width: auto !important;
  }
}
</style>
</head>

<body bgcolor="#FFFFFF" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 15px 0 0 0; padding: 0;'>

    <!-- HEADER -->
    <table class="head-wrap" bgcolor="#405e91" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; width: 100%; max-width: 600px !important; margin: 0 auto; padding: 0;'>
        <tr style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
            <td style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'></td>
            <td class="header container" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;'>
                    
                    <div class="content" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; max-width: 600px; display: block; margin: 0 auto; padding: 15px;'>
                    <table bgcolor="#405e91" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; width: 100%; margin: 0; padding: 0;'>
                        <tr style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
                            <!--<td style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
                            
                            <img src="cid:conproc_logo" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; max-width: 100%; margin: 0; padding: 0;'>
                            
                            </td>-->
                            <td align="center" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'><h6 class="collapse" style='font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; color: #fff; font-weight: 900; font-size: 16px; text-transform: uppercase; margin: 0; padding: 0;'>CONPROC</h6></td>
                        </tr>
                    </table>
                    </div>
                    
            </td>
            <td style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'></td>
        </tr>
    </table>
<!-- /HEADER -->
    
    
    <!-- BODY -->
    <table class="body-wrap" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; width: 100%; margin: 0 auto; padding: 0; max-width: 600px !important; border: 1px solid #e6e6e6;'>
        <tr style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
            <td style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'></td>
            <td class="container" bgcolor="#FFFFFF" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;'>
    
                <div class="content" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; max-width: 600px; display: block; margin: 0 auto; padding: 15px;'>
                <table style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; width: 100%; margin: 0; padding: 0;'>
                    <tr style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
                        <td style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
                            {% if auth %}
                                <h4 style='font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; color: #000; font-weight: 700; font-size: 15px; margin: 0 0 15px; padding: 0;'>Olá, {{ auth.getFullNameOrUserName() }}</h4>
                            {% else %}
                                <h4 style='font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; color: #000; font-weight: 700; font-size: 15px; margin: 0 0 15px; padding: 0;'>Olá,</h4>
                            {% endif %}
                            
                            {% block content %}{% endblock %}

                            <p style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;'>Obrigado,</p>
                            
                            <p style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;'><i><strong>Equipe da Coord. de Instrução e Julgamento - CIJ.</strong></i></p>

                        </td>
                    </tr>
                </table>
                </div>
<!-- /content -->
                                        
            </td>
            <td style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'></td>
        </tr>
    </table>
<!-- /BODY -->
    
    <!-- FOOTER -->
    <table class="footer-wrap" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; width: 100%; clear: both !important; margin: 0; padding: 0;'>
        <tr style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
            <td style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'></td>
            <td class="container" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;'>
                
                    <!-- content -->
                    <div class="content" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; max-width: 600px; display: block; margin: 0 auto; padding: 15px;'>
                    <table style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; width: 100%; margin: 0; padding: 0;'>
                    <tr style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
                        <td align="center" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'>
                            <p style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0; color: #2BA6CB;'>
                                <a href="https://www.tinus.com.br/csp/PARNAMIRIM/portal/index.csp?656ANjD3104RcEWq40607hhaq4345LR=ZrNJ99KhU975Usp13457mmTgT255Pwhmt4713x6616658CWny586" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color: #2BA6CB; margin: 0; padding: 0; text-decoration:none;'>SEMUT</a> |
                                <a href="https://parnamirim.rn.gov.br/" style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color: #2BA6CB; margin: 0; padding: 0; text-decoration:none;'>Parnamirim</a>
                            </p>
                        </td>
                    </tr>
                </table>
                    </div>
<!-- /content -->
                    
            </td>
            <td style='font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; margin: 0; padding: 0;'></td>
        </tr>
    </table>
<!-- /FOOTER -->
    
    </body>
</html>
