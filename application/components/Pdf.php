<?php
//Class For Creating PDF files.
namespace application\components;

require_once('/xampp/xampp1/htdocs/SafeRideStore/dompdf/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

abstract class Pdf
{
    /**
     * Function for Creation PDF file.
     * @param  $htmName File with html Data.
     * @param $pdfName PDF name for creation.
     */
    public static function createPdf($htmlName, $pdfName)
    {

        //Font in PDF file.
        $pdf = new Dompdf([
            'defaultFont' => 'DejaVu Serif'
        ]);
        // $pdf->setO('defaultFont', 'Courier');
        //Getting content of html file.
        $html = file_get_contents($htmlName);

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'landscape');
        $pdf->loadHtml($html);

        // Render the HTML as PDF.
        $pdf->render();

        // Output the generated PDF to Browser
        ob_end_clean();
        $pdf->stream($pdfName);
        exit;
    }
}
