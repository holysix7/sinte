<?php
require_once APPPATH.'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if (!function_exists('generate_pdf')) {
    function generate_pdf($html, $pdf_title = 'document', $orientation = 'portrait') {
        // Set options for Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $options->set('isHtml5ParserEnabled', TRUE);
        $options->set('defaultFont', 'Arial');

        // Initialize Dompdf with options
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Stream the PDF to the browser
        $dompdf->stream($pdf_title, array("Attachment" => 0));
    }
}
?>
