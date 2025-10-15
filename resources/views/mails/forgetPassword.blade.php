<!DOCTYPE html>
<html>

<body
    style="background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">

    <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
        <table style="width: 100%;">
            <tr>
                <td style="background-color: #fff;">
                    <img alt="" src="https://idc.codeall.app/public/frontend/assets/images/resources/logo.png"
                        style="width: 70px; padding: 20px">
                </td>
                <td style="padding-left: 50px; text-align: right; padding-right: 20px;">
                    <a href="{{ route('frontend.home') }}"
                        style="color: #000000; text-decoration: underline; font-size: 14px; letter-spacing: 1px;">
                        Ir para o Site
                    </a>
                </td>
            </tr>
        </table>
        <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
            <h1 style="margin-top: 0px;">
                Olá, você solicitou para recuperar a senha
            </h1>
            Você pode redefinir a senha no link abaixo:
            <a href="{{ route('backend.login.forgot.password.get', $token) }}">Redefinir senha</a>

        </div>
        <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
                <div style="color: #A5A5A5; font-size: 10px;">
                    Powered by CodeAll
                    {{ \Carbon\Carbon::now()->format('d/m/Y \a\s H:i') }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
