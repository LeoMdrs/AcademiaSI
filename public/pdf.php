<?php

use Dompdf\Dompdf;

require_once 'pdf/dompdf/autoload.inc.php';

$dompdf = new DOMPDF();

$dompdf->load_html('

    <h1>Leo - PDF</h1>
');

$dompdf->render();

$dompdf->stream(

    "relatorio.pdf",
    array(
        "Attachment" => false
    )
);