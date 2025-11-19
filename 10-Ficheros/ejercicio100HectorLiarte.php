<?php

$file_path = 'PDFs/manual_ejemplo.pdf';
$file_name = basename($file_path);

header('Content-Type: application/pdf');
header('Content-Length: ' . filesize($file_path));
header("Content-Disposition: attachment; filename=$file_name");
readfile($file_path);
exit;
?>