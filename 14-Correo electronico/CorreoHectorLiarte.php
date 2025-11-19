<?php 
// Destinatarios.  
$para = 'estudiantesDAW@igformacion.com,estudiantesDAM@igformacion.com'; 
 
// Asunto del mensaje 
$asunto = 'Nueva actividad.'; 
 
// Mensaje HTML 
$contenidoHTML = ' 
<html> 
<body> 
  <h1>Nueva actividad</h1> 
  <p>En el fichero adjunto está la nueva actividad</p> 
  <p>Un saludo,</p> 
  <p>Javier Miras</p>  
</body> 
</html> 
'; 

// Repetimos la dirección de los estudiantes para mandarla en formato "limpio"  
// y añadimos uno nuevo.  
$cabecera = 'To: Estudiantes DAW <estudiantesDAW@igformacion.com>,' . 
            'Estudiantes DAM <estudiantesDAM@igformacion.com>,' . 
            'FP IG <formacionprofesional@igforamcion.com>' . "\r\n"; 
 
// Remitente del mensaje. 
$cabecera .= 'From: Javier Miras <ajmiras@igformacion.com>' . "\r\n"; 
 
// Direcciones que reciben copia del mensaje. 
$cabecera .= 'Cc: administracion@igformacion.com' . "\r\n"; 
 
// Direcciones ocultas que reciben copia del mensaje. 
$cabecera .= 'Bcc: jefeestudios@igformacion.com' . "\r\n"; 
 
// Prioridad del mensaje. Desde 1, prioridad más alta, hasta 4, prioridad más baja. 
$cabecera .= 'X-Priority:1' . "\r\n"; 
 
// Límite que indica cada una de las partes que componen el mensaje. 
$limiteMIME = '==Limite_Multiparte_x'. md5(time()) . 'x'; 
 
// Encabezados para enviar un mensaje en formato HTML y con un fichero adjunto. 
$cabecera .= 'MIME-Version: 1.0' . "\r\n"; 
$cabecera .= 'Content-Type: multipart/mixed; boundary="' . $limiteMIME . '"' . "\r\n";  
 
// Parte del mensaje HTML 
$mensaje  = '--' . $limiteMIME . "\r\n"; 
$mensaje .= 'Content-Type: text/html; charset="UTF-8"' . "\r\n"; 
$mensaje .= 'Content-Transfer-Encoding: 8bit' . "\r\n\n"; 
$mensaje .= $htmlContent . "\r\n"; 
 
// Fichero a adjuntar. 
$fichero = 'actividad.pdf'; 
$fp      = @fopen($fichero,"rb"); 
$datos   = @fread($fp, filesize($fichero)); 
@fclose($fp); 
$datos   = chunk_split(base64_encode($datos)); 
 
// Parte del mensaje donde se adjunta el fichero 
$mensaje .= '--' . $limiteMIME. "\r\n"; 
$mensaje .= 'Content-Type: application/octet-stream;' . 
            ' name=' . basename($fichero) . "\r\n"; 
$mensaje .= 'Content-Description: ' . basename($fichero) . "\r\n"; 
$mensaje .= 'Content-Disposition: attachment;' . "\r\n"; 
$mensaje .= 'filename="' . basename($file) . '";' . 
            ' size=' . filesize($file). ';' . "\r\n"; 
$mensaje .= 'Content-Transfer-Encoding: base64;' . "\r\n"; 
$mensaje .= $datos . "\r\n"; 

//------------------------------------------------
//Mi código:

$fichero1 = 'actividad.pdf';
$fichero2 = 'anexo.doc';

// Lectura del fichero 1
$fp1     = @fopen($fichero1,"rb"); 
$datos1  = @fread($fp1, filesize($fichero1)); 
@fclose($fp1); 
$datos1  = chunk_split(base64_encode($datos1));

// Parte del mensaje donde se adjunta el fichero 1
$mensaje .= '--' . $limiteMIME. "\r\n"; 
$mensaje .= 'Content-Type: application/octet-stream;' . 
            ' name="' . basename($fichero1) . '"' . "\r\n"; 
$mensaje .= 'Content-Description: ' . basename($fichero1) . "\r\n"; 
$mensaje .= 'Content-Disposition: attachment;' . "\r\n"; 
$mensaje .= 'filename="' . basename($fichero1) . '";' . 
            ' size=' . filesize($fichero1). ';' . "\r\n"; 
$mensaje .= 'Content-Transfer-Encoding: base64' . "\r\n\n"; 
$mensaje .= $datos1 . "\r\n"; 


// Lectura del fichero 2
$fp2     = @fopen($fichero2,"rb"); 
$datos2  = @fread($fp2, filesize($fichero2)); 
@fclose($fp2); 
$datos2  = chunk_split(base64_encode($datos2)); // Codificación Base64

// Parte del mensaje donde se adjunta el fichero 2
$mensaje .= '--' . $limiteMIME. "\r\n"; 
$mensaje .= 'Content-Type: application/octet-stream;' . 
            ' name="' . basename($fichero2) . '"' . "\r\n"; 
$mensaje .= 'Content-Description: ' . basename($fichero2) . "\r\n"; 
$mensaje .= 'Content-Disposition: attachment;' . "\r\n"; 
$mensaje .= 'filename="' . basename($fichero2) . '";' . 
            ' size=' . filesize($fichero2). ';' . "\r\n"; 
$mensaje .= 'Content-Transfer-Encoding: base64' . "\r\n\n"; 
$mensaje .= $datos2 . "\r\n";



//------------------------------------------------


 
// Fin del mensaje 
$mensaje .= '--' . $limiteMIME .'--'; 
 
// Enviamos el mensaje. 
if (mail($para, $asunto, $mensaje, $cabecera) == true) 
    echo 'Mensaje enviado correctamente.'; 
else 
    echo 'Error al enviar el mensaje.'; 
?>