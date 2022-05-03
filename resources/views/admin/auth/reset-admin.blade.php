<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0145)https://trello-attachments.s3.amazonaws.com/5c17d63c8fcb257e566922eb/5c7809903008eb245b850d7e/b7dc58ce35c21a5560a3f411040e6efd/email_contato.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Recuperar senha</title>
</head>

<body class="vsc-initialized">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td bgcolor="#EEEEEE"><table width="100%" border="0" cellspacing="15" cellpadding="15">
        <tbody><tr>
          <td bgcolor="#FFFFFF"><p><font face="Arial, Helvetica, sans-serif" size="2" color="#000000">
            Olá, {{ $dados['name']  }},
            <br><br>
            Você solicitou um link de recuperação de senha para sua conta na 1 Job. Clique no link abaixo para definir uma nova senha. <br>
             <a href="{{ $dados['link'] }}" class="btn-primary">Recuperar senha</a>
            <br><br>
            Se você não solicitou a recuperação de senha, por favor ignore esse email.

            <br>
            <br>
            Obrigado,<br>
            1 Job.

          </td>
        </tr>
      </tbody></table></td>
  </tr>
</tbody></table>


</body></html>
