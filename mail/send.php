<?php
date_default_timezone_set('America/Sao_Paulo');
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$date = date("d/m/Y h:i");
$ip = getenv("REMOTE_ADDR");
$navegador = $_SERVER['HTTP_USER_AGENT']; 
$nomeremetente = $_POST["name"]; 
$emailremetente = $_POST["email"]; 
$email = 'contato@sdti.net.br'; // Inserir o endereço de email a qual você quer que chegue seuemail@seusite.com.br
$telefone = $_POST["phone"];
$mensagem = $_POST["message"]; 





                $MailRecipiente = $email;     
                $MailAssunto    = "Contato do site SDTI"; 
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=UTF-8\r\n"; 
                $headers .= "From: $email\r\n"; 
                $headers .= "Return-Path: $email\r\n"; 
                 
                 $msg = ' 
				 		 <i>Enviado por:</i> <br/><br/>
                         <b>Nome:</b> '.$nomeremetente.'<br/> 
                         <b>Email:</b> '.$emailremetente.'<br/> 
                         <b>Telefone:</b> '.$telefone.'<br/>
                         <b>Mensagem:</b> '.$mensagem.'<br/><br/> 
						 <b>IP do Visitante:</b> '.$ip.'<br/> 
						 <b>Navegador do Visitante:</b> '.$navegador.'<br/> 
						 <b>Data e Hora:</b> '.$date.'<br/> 
                         '; 
             
                  mail($MailRecipiente,$MailAssunto,$msg,$headers);
				  
				  
				  // AQUI SE COLOCA A COPIA CASO QUEIRA QUE O FORMULARIO ENVIE (DUPLIQUE QUANTAS VEZES QUISER)
				  
				  mail('joelcio_ms@hotmail.com',$MailAssunto,$msg,$headers);


//AUTO RESPOSTA 
                $headers_ = "MIME-Version: 1.0\r\n"; 
                $headers_ .= "Content-type: text/html; charset=UTF-8\r\n"; 
                $headers_ .= "From:  $email\r\n"; 
                $site = "www.sdti.net.br"; 
                $titulo = "Digital informatica - Recebemos sua mensagem."; 
                $mensagem = " 
                <br/> 
                <!--  Mensagem da Auto Resposta!  -->
                Ola<br/>
                <p>Agradeçemos sua visita e a oportunidade de recebermos o sua mensagem. Em até 48 horas entraremos em contato!</p>
                <br/> 

                Obrigado,<br/> 
                <!--  Finalização -->
                Observação - Não é necessário responder esta mensagem.
                <br/> 
                <b>Data e Hora:</b> '.$date.'<br/>"
                ; 

                mail($emailremetente,$titulo,$mensagem,$headers_); 
                return true;
#echo "<script>alert('email enviado com sucesso!'); location.href='index.html#contact'; </script>"; // Página que será redirecionada

?>
