<?php
// use Dompdf\Dompdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator
{
  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {

    $options = new Options();
    
    $options->set('isRemoteEnabled', TRUE);
    $options->set('tempDir','D:\laragon\tmp');
    $options->set('chroot','D:\laragon\www\pdikm');
    $options->set('debugKeepTemp', TRUE);
    
    $dompdf = new DOMPDF($options);
    $dompdf->loadHtmlFile($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}