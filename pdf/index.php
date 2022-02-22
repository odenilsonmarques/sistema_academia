<?php

use Dompdf\Dompdf;

require __DIR__.'/vendor/autoload.php';
// require_once("dompdf/autoload.php");


$dompdf = new Dompdf();

$dompdf->loadHtml('<b>hello world</b>');

$dompdf->render();

header('Content-type: appcation/pdf');
echo $dompdf->output();