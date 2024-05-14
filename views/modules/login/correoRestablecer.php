<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>GitHub - Código de inicio de sesión</title>
</head>
<body>
  <table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse !important;">
    <tr>
      <td align="center" valign="top" style="border: 0 !important; padding: 0 !important;">
        <div style="border: 0 !important; font-family: sans-serif !important; font-size: 14px !important; color: #000000 !important; line-height: 20px !important; padding: 20px !important;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse !important;">
            <tr>
              <td align="center" valign="top" style="border: 0 !important; padding: 0 !important;">
                <h1 style="margin: 0 !important; font-size: 24px !important; font-weight: bold !important; color: #000000 !important; line-height: 24px !important;">GitHub</h1>
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td align="center" valign="top" style="border: 0 !important; padding: 0 !important;">
        <div style="border: 0 !important; font-family: sans-serif !important; font-size: 14px !important; color: #000000 !important; line-height: 20px !important; padding: 20px !important;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse !important;">
            <tr>
              <td align="left" valign="top" style="border: 0 !important; padding: 0 !important;">
                <p style="margin: 0 !important; font-size: 16px !important; line-height: 24px !important;">¡Bienvenido a GitHub, {{ nombre_usuario }}!</p>
              </td>
            </tr>
            <tr>
              <td align="left" valign="top" style="border: 0 !important; padding: 0 !important;">
                <p style="margin: 0 !important; font-size: 14px !important; line-height: 20px !important;">Te hemos enviado un código de inicio de sesión por correo electrónico. Para completar tu registro, introduce el código a continuación:</p>
              </td>
            </tr>
            <tr>
              <td align="left" valign="top" style="border: 0 !important; padding: 0 !important;">
                <p style="margin: 0 !important; font-size: 16px !important; line-height: 24px !important; color: #007bff !important;"><b>Código: {{ codigo_verificacion }}</b></p>
              </td>
            </tr>
            <tr>
              <td align="left" valign="top" style="border: 0 !important; padding: 0 !important;">
                <p style="margin: 0 !important; font-size: 14px !important; line-height: 20px !important;">¿No puedes introducir el código? Abre el siguiente enlace:</p>
              </td>
            </tr>
            <tr>
              <td align="left" valign="top" style="border: 0 !important; padding: 0 !important;">
                <a href="{{ enlace_confirmacion }}" style="margin: 0 !important; font-size: 14px !important; color: #007bff !important; line-height: 20px !important;">{{ enlace_confirmacion }}</a>
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    </table>
</body>
</html>
