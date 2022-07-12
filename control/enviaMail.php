<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include dirname(__DIR__) .'/phpmailer/PHPMailer.php';
include dirname(__DIR__) .'/phpmailer/SMTP.php';
include dirname(__DIR__) .'/phpmailer/Exception.php';

function enviaCorreo($name,$email,$institucion,$telefono,$telefono2,$obra,$comentario,$clienteIsSend){
    include_once "../config/SERVER.php";
    //Create an instance; passing `true` enables exceptions
    $_correo = $clienteIsSend ? $email : EMAIL_DESTINO;
    $_subjet = $clienteIsSend ? 'Tour Latinoamérica 2023 TNT Theatre + Teatro Espressivo, contacto web' : 'CONTACTO DESDE SITIO WEB ';
    // SEND MAIL by PHP MAILER
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP(); // Use SMTP protocol
    $mail->Host = HOST; // Specify  SMTP server
    $mail->SMTPAuth = true; // Auth. SMTP
    $mail->Username = USERNAME_MAIL; // Mail who send by PHPMailer
    $mail->Password = PW_MAIL; // your pass mail box
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = PORT_MAIL; // port of your out server
    $mail->setFrom(USERNAME_MAIL,FROM_NAME); // Mail to send at

    $mail->addAddress($_correo);
    //$mail->addAddress($_correo); // Add sender
    if(! $clienteIsSend){
        $mail->addAddress(EMAIL_ADICIONAL);
    }

    $mail->isHTML(true); // use HTML message
    $mail->Subject = $_subjet;
    $mail->Body = $clienteIsSend ? getBody_user($name) : getBody_empresa($name,$email,$institucion,$telefono,$telefono2,$obra,$comentario);

    // SEND
    if( !$mail->send() ){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
    else{
        // return true if message is send
        return true;
    }

}

function getBody_empresa($name,$email,$institucion,$telefono,$telefono2,$obra,$comentario){
    return '
      <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">
    Tour Latinoamérica 2023 TNT Theatre + Teatro Espressivo
    </span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
          <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                            Datos del contacto: '.$name. '
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                            Correo: '.$name. ' <br>
                            Institución: '.$institucion. ' <br>
                            Telefono 1: '.$telefono. ' <br>
                            Telefono 2: '.$telefono2. ' <br>
                            Obra: '.$obra. ' <br>
                            Comentario: '.$comentario. ' <br>
                        </p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #10224f;" valign="top" align="center" bgcolor="#3498db"> 
                                      <a href="mailto:'.$email.'" target="_blank" style="border: solid 1px #10224f; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #10224f; border-color: #10224f; color: #ffffff;">
                                        Contactar
                                      </a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">
                    Teatro Espressivo y TNT Britain Theatre colaboran acercando dos emblemáticas obras de teatro a los centros educativos en su Tour 2023 por algunos pasíses de Latinoamérica.
                    </span>
                    <br><a href="mailto:theatrelatinamerica@gmail.com" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">info@espressivo.cr</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
                    <a href="#" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">TNT Theatre y Teatro Espressivo | Derechos Reservados</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
                    Powered by <a href="https://reckreastudios.com/" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">ReCkreaStudios & Limonne</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
      </tr>
    </table>
  </body>
    ';
}

function getBody_user($nombre){
    return '
      <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">
    Tour Latinoamérica 2023 TNT Theatre + Teatro Espressivo
    </span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
          <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                            Hola '.$nombre. '
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                            Gracias por comunicarse con nosotros. Pronto alguno de nuestros colaboradores le contactará.
                        </p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;" valign="top">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #10224f;" valign="top" align="center" bgcolor="#3498db"> 
                                      <a href="https://api.whatsapp.com/send?phone=50663609158" target="_blank" style="border: solid 1px #10224f; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #10224f; border-color: #10224f; color: #ffffff;">
                                        Contáctenos
                                      </a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                            También puede contactarnos directamente en nuestros canales adicionales..
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                            T. (+506) 6360 9158 <br>
                            T. (+506) 2267 1818
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">
                    Teatro Espressivo y TNT Britain Theatre colaboran acercando dos emblemáticas obras de teatro a los centros educativos en su Tour 2023 por algunos pasíses de Latinoamérica.
                    </span>
                    <br>Este es un correo automático, si desea contacto directo, comunicarse a<a href="mailto:theatrelatinamerica@gmail.com" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;"> info@espressivo.cr</a>.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;" valign="top" align="center">
                    <a href="#" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">TNT Theatre y Teatro Espressivo | Derechos Reservados</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
      </tr>
    </table>
  </body>
    ';
}