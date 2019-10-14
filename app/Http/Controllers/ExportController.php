<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Bast;
use Yajra\DataTables\Datatables;
use App\SistemOperasi;
use App\AlokasiHostname;

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

    
    public function jsonOs(){
        $sistemoperasi = SistemOperasi::all();
        return Datatables::of($sistemoperasi)
        ->addIndexColumn()
        ->addColumn('action', function($sistemoperasi){
            return 
                   '<a href="/sistemoperasi/'. $sistemoperasi->id .'/edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                   '<a onclick="deleteData('. $sistemoperasi->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        })
        ->rawColumns(['action'])->make(true);
    }

    public function jsonHostname(){
        $alokasihostname = AlokasiHostname::all();

        return Datatables::of($alokasihostname)
        ->addIndexColumn()
        ->addColumn('action', function($alokasihostname){
            return 
                   '<a href="/alokasihostname/'. $alokasihostname->id .'/edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                   '<a onclick="deleteData('. $alokasihostname->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        })
        ->rawColumns(['action'])->make(true);
    }

    public function jsonBast(){
        $bast = Bast::all();

        return Datatables::of($bast)
        ->addIndexColumn()
        ->addColumn('pdf', function($bast){
            return '<a href="/export/cetak_surat/'.$bast->id.'" target="_blank">
                        <i class="far fa-file-pdf fa-lg"></i> PDF
                    </a>';
        })
        ->addColumn('action', function($bast){
            return 
                   '<a href="/bastdocument/'. $bast->id .'/edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                   '<a onclick="deleteData('. $bast->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        })
        ->rawColumns(['action','pdf'])->make(true);
    }

}
