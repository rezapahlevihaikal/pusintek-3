<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Bast;

class ExportController extends Controller
{
    public function cetak_surat($id)
    {
        $no = 1;
        $bast = Bast::find($id);
        $pdf = PDF::loadview('BAST_CLOUD', compact('bast','no'));
        $pdf->setPaper('legal', 'potrait');
    	return $pdf->stream();
    }
}
