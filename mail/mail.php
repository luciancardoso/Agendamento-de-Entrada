<?php



require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//$id_recinto = $_SESSION['id_recinto'];


function send($assunto, $mensagem){
    //$id_recinto = $_SESSION['id_recinto'];
    //echo $id_recinto;
    //echo strcmp($id_recinto, "PG-1");

    if(strcmp($_SESSION['id_recinto'], "PG - Solimões") == 0){
        // echo 'Solimões';
         try {
             $mail = new PHPMailer(true);
    
             $mail->SetLanguage('br');
             $mail->isSMTP();
             $mail->SMTPAuth = true;
             $mail->SMTPDebug = 0;
             $mail->SMTPSecure = 'tls';
             $mail->Host = 'tls://smtp.gmail.com';
             $mail->Username = 'seuemail@gmail.com';
             $mail->Password = '123456';
             $mail->Port = 587;
             $mail->setFrom('seuemail@gmail.com', 'Agendamento Eletrônico');
             $mail->addReplyTo('seuemail@gmail.com', 'Sistema Aduana');
             $mail->addAddress('testedeemail@teste.com');
             $mail->isHTML(true);
             $mail->CharSet = 'UTF-8';
             $mail->Subject = $assunto; //$assunto
             //Leia o corpo de uma mensagem HTML de um arquivo externo, converta imagens referenciadas em incorporadas,
             //converter HTML em um corpo alternativo de texto simples básico
             //$mail->msgHTML(file_get_contents('./mail/index.html'), __DIR__);  //você também pode usar $mail->Body = "</p>This is a <b>body</b> message in html</p>"
             $mail->Body = $mensagem;
             //$mail->AltBody = 'OI Gente tudo bem ?';
             $envia = $mail->send();
    
         } catch (Exception $e) {
             echo "Falha ao enviar<br>";
             echo $mail->ErrorInfo;
         }

    } 
    else 
    {

        // echo 'Rio Negro';
         try {
             $mail = new PHPMailer(true);
    
             $mail->SetLanguage('br');
             $mail->isSMTP();
             $mail->SMTPAuth = true;
             $mail->SMTPDebug = 0;
             $mail->SMTPSecure = 'tls';
             $mail->Host = 'tls://smtp.gmail.com';
             $mail->Username = 'seuemail@gmail.com';
             $mail->Password = '123456';
             $mail->Port = 587;
             $mail->setFrom('seuemail@gmail.com', 'Agendamento Eletrônico');
             $mail->addReplyTo('seuemail@gmail.com', 'Sistema Aduana');
             $mail->addAddress('testedeemail@teste.com');
             $mail->isHTML(true);
             $mail->CharSet = 'UTF-8';
             $mail->Subject = $assunto; //$assunto
             //Leia o corpo de uma mensagem HTML de um arquivo externo, converta imagens referenciadas em incorporadas,
             //converter HTML em um corpo alternativo de texto simples básico
             //$mail->msgHTML(file_get_contents('./mail/index.html'), __DIR__);  //você também pode usar $mail->Body = "</p>This is a <b>body</b> message in html</p>"
             $mail->Body = $mensagem;
             //$mail->AltBody = 'OI Gente tudo bem ?';
             $envia = $mail->send();
    
         } catch (Exception $e) {
             echo "Falha ao enviar<br>";
             echo $mail->ErrorInfo;
         }
    }

    //unset($_SESSION['id_recinto']);
    
}

?>