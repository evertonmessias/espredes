<?php
extract($_POST);

$eu = 'sec-ext@ic.unicamp.br';
$assunto = '[Mensagem do Site ESPREDES]';

$enviar = mail($eu, $assunto, $msg, "Mensagem de: $nome ; E-mail: $mail");

if($enviar){echo "OK, Mensagem Enviada !";}
else{echo "Erro, Mensagem NÃO Enviada !";}

?>