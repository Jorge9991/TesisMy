<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function parciegocorreo($datos) {

    foreach ($datos as $idjurado) {
        $dao = new daoCorreo();
        $funcioncorreo = $dao->correojurado($idjurado);
        $correo = $funcioncorreo[0]['correo'];
        //nombre
        $nombre = $funcioncorreo[0]['nombres'];

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'kri3ger.drachen@gmail.com';                     // SMTP username
            $mail->Password = 'lyujeqmktexcbubo';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            //Recipients
            $mail->setFrom('kri3ger.drachen@gmail.com', 'Gestor'); //aqui va el correo de la empresa
            $mail->addAddress($correo, 'Pares ciego');     // aqui va el de cliente
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Pares ciego';
            $message = "<html><body>";

            $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";

            $message .= "<tr><td>";

            $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";

            $message .= "<thead>
  <tr height='80'>
  <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Asignación para revisión de tesis!</th>
  </tr>
             </thead>";

            $message .= "<tbody>
    
      
       <tr>
       <td colspan='4' style='padding:15px;'>
       <p style='font-size:20px;'>Usted $nombre ha sido asignado/a para par ciego!</p>
       <hr />
       <p style='font-size:15px;'>Ingrese a la paginá, para revision de la nueva tesis asignada</p>
       <p style='font-size:15px;'>link: http://localhost/tesistitulacion/app/view/login.php</p>
  
       </td>
       </tr>
      
              </tbody>";

            $message .= "</table>";

            $message .= "</td></tr>";
            $message .= "</table>";

            $message .= "</body></html>";
            $mail->Body = $message;

            $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }
}
