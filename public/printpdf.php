<?php
require '../vendor/autoload.php';


use Spipu\Html2Pdf\Html2Pdf;


$Html2pdf = new Html2Pdf();
$Html2pdf->writeHTML('<h1>hola mundo desde html2pdf</h1>');
$Html2pdf->output();