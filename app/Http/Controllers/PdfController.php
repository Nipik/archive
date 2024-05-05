<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        $content = $request->input('content');
        $dompdf = new Dompdf();
        $dompdf->loadHtml($content);
        $dompdf->render();
        return $dompdf->output();
    }
}

